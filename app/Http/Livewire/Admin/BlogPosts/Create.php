<?php

namespace App\Http\Livewire\Admin\BlogPosts;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\CategoryPost;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ایجاد پست بلاگ',
    ];
    public $record;
    /* Form inputs */
    public $title;
    public $body;
    public $small_body;
    public $image;
    public $tags;
	public $is_popular;
	public $is_news;
	public $is_editor_selected;
	public $top_order;

	public $categories;
	public $category_ids = [];

	public function mount()
	{
		$this->categories = BlogCategory::all();
	}

    public function render()
    {
        return view('livewire.admin.blog-posts.create')->with('pageInfo', $this->pageInfo);
    }

    public function update()
    {
        $blogPost = new BlogPost();
        $blogPost->admin_id = auth()->user()->id;
        $blogPost->title = $this->title;
        $blogPost->body = $this->body;
        $blogPost->small_body = $this->small_body;
		$blogPost->tags = $this->tags;
		$blogPost->is_popular = (boolean)$this->is_popular;
		$blogPost->is_news = (boolean)$this->is_news;
		$blogPost->is_editor_selected = (boolean)$this->is_editor_selected;
		$blogPost->top_order = (integer)$this->top_order;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $blogPost->image_name = $imageName;
        }
        $blogPost->save();

		foreach ($this->category_ids as $category_id)
		{
			CategoryPost::query()
						   ->create([
										'blog_post_id' => $blogPost->id,
										'blog_category_id' => $category_id
									]);
		}

        session()->flash('message', 'پست با موفقیت ایجاد شد.');
        redirect()->route('admin.blog-posts.index');
    }
}
