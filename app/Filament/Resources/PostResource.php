<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RalphJSmit\Filament\SEO\SEO;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Grid::make()
                ->schema([
                    // Left Column (8 columns wide)
                    Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\Section::make('Basic Information')
                                ->schema([
                                    Forms\Components\TextInput::make('title')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                            $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                        ),

                                    Forms\Components\TextInput::make('slug')
                                        ->required()
                                        ->maxLength(255)
                                        ->unique(ignoreRecord: true),
                                ]),

                            Forms\Components\Section::make('Content')
                                ->schema([
                                    Forms\Components\RichEditor::make('content')
                                        ->required()
                                        ->fileAttachmentsDisk('public')
                                        ->fileAttachmentsVisibility('public')
                                        ->fileAttachmentsDirectory('posts')
                                        ->columnSpanFull(),

                                    Forms\Components\Textarea::make('excerpt')
                                        ->rows(3)
                                        ->required()
                                        ->columnSpanFull(),
                                ]),

                            Forms\Components\Section::make('SEO Meta')
                                ->schema([
                                    SEO::make(),
                                ])
                                ->collapsible()
                                ->persistCollapsed(),
                        ])
                        ->columnSpan(['lg' => 8]),

                    // Right Column (4 columns wide)
                    Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\Section::make('Publishing')
                                ->schema([
                                    Forms\Components\Hidden::make('user_id')
                                        ->default(auth()->id())
                                        ->dehydrated(true),

                                    Forms\Components\TextInput::make('author.name')
                                        ->label('Author')
                                        ->default(auth()->user()->name)
                                        ->disabled()
                                        ->dehydrated(false),

                                    Forms\Components\Select::make('categories')
                                        ->relationship('categories', 'name')
                                        ->multiple()
                                        ->preload()
                                        ->searchable(),
                                ]),

                            Forms\Components\Section::make('Settings')
                                ->schema([
                                    Forms\Components\Toggle::make('is_published')
                                        ->label('Published')
                                        ->default(false),

                                    Forms\Components\Toggle::make('is_featured')
                                        ->label('Featured')
                                        ->default(false),

                                    Forms\Components\TextInput::make('sort_order')
                                        ->numeric()
                                        ->default(0),
                                ]),

                            Forms\Components\Section::make('Media')
                                ->schema([
                                    SpatieMediaLibraryFileUpload::make('thumbnail')
                                        ->collection('thumbnail')
                                        ->image()
                                        ->imageEditor()
                                        ->downloadable(),
                                ])
                                ->collapsible(),
                        ])
                        ->columnSpan(['lg' => 4]),
                ])
                ->columns(12),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail')
                    ->width(40)
                    ->height(40),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('categories.name')
                    ->badge()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('author')
                    ->relationship('author', 'name'),
                
                Tables\Filters\SelectFilter::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple(),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
