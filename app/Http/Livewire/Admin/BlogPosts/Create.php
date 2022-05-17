<?php

namespace App\Http\Livewire\Admin\BlogPosts;

use App\Models\BlogPost;
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
    public $image;
    public $tags;
	public $is_popular;
	public $is_news;


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
		$blogPost->tags = $this->tags;
		$blogPost->is_popular = (boolean)$this->is_popular;
		$blogPost->is_news = (boolean)$this->is_news;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $blogPost->image_name = $imageName;
        }
        $blogPost->save();

        session()->flash('message', 'پست با موفقیت ایجاد شد.');
        redirect()->route('admin.blog-posts.index');
    }
}
