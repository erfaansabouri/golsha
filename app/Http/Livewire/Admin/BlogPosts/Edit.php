<?php

namespace App\Http\Livewire\Admin\BlogPosts;

use App\Models\BlogCategory;
use App\Models\CategoryPost;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    protected $pageInfo = [
        'title' => 'ویرایش پست بلاگ',
    ];
    public $record;
    /* Form inputs */
    public $title;
    public $body;
    public $small_body;
    public $oldImage;
    public $image;
	public $tags;
	public $is_popular = false;
	public $is_news = false;
	public $is_editor_selected = false;
	public $top_order = 0;

	public $categories;
	public $category_ids = [];
	public $old_category_ids = [];



	public function mount($record)
    {
        $this->record 		= $record;
        $this->title 		= $this->record->title;
        $this->body 		= $this->record->body;
        $this->small_body   = $this->record->small_body;
        $this->oldImage 	= $this->record->imagePath;
		$this->tags 		= $record->tags;
		$this->is_popular 	= (boolean)$record->is_popular;
		$this->is_news 		= (boolean)$record->is_news;
		$this->is_editor_selected 		= (boolean)$record->is_editor_selected;
		$this->top_order 		= (integer)$record->top_order;
		$this->categories = BlogCategory::all();
		$this->old_category_ids = CategoryPost::query()
												 ->where('blog_post_id', $record->id)
												 ->get()
												 ->pluck('blog_category_id')
												 ->toArray();
    }
    public function render()
    {
        return view('livewire.admin.blog-posts.edit')->with('pageInfo', $this->pageInfo);
    }

    public function update()
    {
        $this->record->title 	= $this->title;
        $this->record->body 	= $this->body;
        $this->record->small_body 	= $this->small_body;
        $this->record->tags 	= $this->tags;
        $this->record->is_popular = (boolean)$this->is_popular;
        $this->record->is_news 	= (boolean)$this->is_news;
        $this->record->is_editor_selected 	= (boolean)$this->is_editor_selected;
        $this->record->top_order 	= (integer)$this->top_order;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $this->record->image_name = $imageName;
        }
        $this->record->save();


		CategoryPost::query()->where('blog_post_id', $this->record->id)->delete();
		foreach ($this->category_ids as $category_id)
		{
			CategoryPost::query()
						->create([
									 'blog_post_id' => $this->record->id,
									 'blog_category_id' => $category_id
								 ]);
		}

        session()->flash('message', 'پست با موفقیت ویرایش شد.');
        redirect()->route('admin.blog-posts.index');
    }
}
