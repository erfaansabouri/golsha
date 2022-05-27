<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
	{
		$ads = Setting::query()->where('type', Setting::TYPES['image'])->take(3)->get();
		$blogPosts = BlogPost::query()->orderByDesc('id');
		if(!empty($request->tag))
		{
			$blogPosts = $blogPosts->where('tags', 'like', '%'. $request->tag .'%');
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
		
		$tags = BlogPost::query()
			->whereNotNull('tags')
			->get()
			->pluck('tags');
		$footerDescription = 'footer description';
		return view('blog-pages.index', compact('blogPosts', 'ads', 'tags', 'footerDescription'));
	}
	
	public function show($id)
	{
		$ads = Setting::query()->where('type', Setting::TYPES['image'])->take(3)->get();
		$blogPost = BlogPost::query()->findOrFail($id);
		$tags = BlogPost::query()
						->whereNotNull('tags')
						->get()
						->pluck('tags');
		$footerDescription = 'footer description';
		return view('blog-pages.show', compact('ads', 'blogPost', 'tags', 'footerDescription'));
		
	}
}
