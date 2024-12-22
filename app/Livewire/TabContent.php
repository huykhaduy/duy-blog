<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class TabContent extends Component
{
    use WithPagination;
    const ALL_CATEGORY_ID = 0;
    public $activeCategoryId = self::ALL_CATEGORY_ID;
    public $categories = [];
    protected $paginationTheme = 'tailwind';

    public function setActiveCategoryId($category)
    {
        if ($category === "") {
            $this->activeCategoryId = self::ALL_CATEGORY_ID;
        } else {
            $this->activeCategoryId = $category;
        }
        $this->resetPage();
    }

    public function loadCategories()
    {
        $this->categories = collect([new Category(['id' => self::ALL_CATEGORY_ID, 'name' => 'Tất cả'])])->concat(Category::all());
    }

    public function boot()
    {
        $this->loadCategories();
    }

    public function render()
    {
        // dd($this->categories);
        $posts = $this->activeCategoryId === self::ALL_CATEGORY_ID
            ? Post::published()->latest()->paginate(12)
            : Post::published()
                ->ofCategory($this->activeCategoryId)
                ->latest()
                ->paginate(12);

        return view('livewire.tab-content', [
            'posts' => $posts,
            'categories' => $this->categories,
            'activeCategoryId' => $this->activeCategoryId
        ]);
    }
}
