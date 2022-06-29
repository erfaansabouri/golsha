<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
	protected $pageInfo = [
		'title' => 'وبلاگ گلشاتب',
	];

	private function footerTags()
	{
		$tags = [];
		$blogPosts = BlogPost::query()->whereNotNull('tags')->get();
		foreach ($blogPosts as $blogPost)
		{
			$exploded = explode('،',$blogPost->tags);
			foreach ($exploded as $tag)
			{
				$tags[] = $tag;
			}
		}

		return collect($tags)->take(20)->all();
	}

	private function ads()
	{
		$ads = Setting::query()->where('type', Setting::TYPES['image'])->take(3)->get();
		return $ads;
	}

	private function description()
	{
		return 'test';
	}

    public function index(Request $request)
	{
		$ads = $this->ads();
		$blogPosts = BlogPost::query()->orderByDesc('id');

		if(!empty($request->tag))
		{
			$blogPosts = $blogPosts->where('tags', 'like', '%'. $request->tag .'%');
		}
		if(!empty($request->search))
		{
			$blogPosts = $blogPosts->where('tags', 'like', '%'. $request->search .'%')
				->orWhere('title', 'like', '%'.$request->search.'%');
		}
		if(!empty($request->category_id))
		{
			$ids = DB::table('category_post')
				->where('blog_category_id', $request->category_id)
				->get()
				->pluck('blog_post_id');
			$blogPosts = $blogPosts->whereIn('id', $ids);
		}

		$blogPosts = $blogPosts->paginate(10);
		$tags = $this->footerTags();
		$footerDescription = $this->description();
		return view('blog-pages.index', compact('blogPosts', 'ads', 'tags', 'footerDescription'))->with('pageInfo', $this->pageInfo);
	}

	public function show($id)
	{
		$ads = $this->ads();
		$blogPost = BlogPost::query()->findOrFail($id);
		$tags = $this->footerTags();
		$footerDescription = $this->description();
		return view('blog-pages.show', compact('ads', 'blogPost', 'tags', 'footerDescription'));
	}
}
