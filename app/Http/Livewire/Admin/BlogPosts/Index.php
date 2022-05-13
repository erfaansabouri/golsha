<?php

namespace App\Http\Livewire\Admin\BlogPosts;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $pageInfo = [
        'title' => 'بلاگ',
    ];

    public $search = '';
    public function render()
    {
        $blogPosts = BlogPost::query();
        if(!empty($this->search))
        {
            $blogPosts = $blogPosts->where('title', 'like', '%'. $this->search .'%')
                ->orWhere('id', '=', $this->search);
        }
        $blogPosts = $blogPosts->orderBy('id', 'desc')->paginate(25);
        return view('livewire.admin.blog-posts.index', [
            'blog_posts' => $blogPosts,
        ])->with('pageInfo', $this->pageInfo);
    }
}
