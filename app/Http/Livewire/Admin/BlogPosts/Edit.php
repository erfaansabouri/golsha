<?php

namespace App\Http\Livewire\Admin\BlogPosts;

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
    public $oldImage;
    public $image;
	public $tags;
	public $is_popular = false;
	public $is_news = false;


    public function mount($record)
    {
        $this->record 		= $record;
        $this->title 		= $this->record->title;
        $this->body 		= $this->record->body;
        $this->oldImage 	= $this->record->imagePath;
		$this->tags 		= $record->tags;
		$this->is_popular 	= (boolean)$record->is_popular;
		$this->is_news 		= (boolean)$record->is_news;
    }
    public function render()
    {
        return view('livewire.admin.blog-posts.edit')->with('pageInfo', $this->pageInfo);
    }

    public function update()
    {
        $this->record->title 	= $this->title;
        $this->record->body 	= $this->body;
        $this->record->tags 	= $this->tags;
        $this->record->is_popular = (boolean)$this->is_popular;
        $this->record->is_news 	= (boolean)$this->is_news;
        if($this->image)
        {
            $fileName = Str::random(16). '.' . $this->image->getClientOriginalExtension();
            $imageName = $this->image->storeAs('images', $fileName, 'parswebserver');
            $this->record->image_name = $imageName;
        }
        $this->record->save();

        session()->flash('message', 'پست با موفقیت ویرایش شد.');
        redirect()->route('admin.blog-posts.index');
    }
}
