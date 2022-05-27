<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
	{
		$ads = Setting::query()->where('type', Setting::TYPES['image'])->take(3)->get();
		$blogPosts = BlogPost::query();
		if(!empty($request->tag))
		{
			$blogPosts = $blogPosts->where('tags', 'like', '%'. $request->tag .'%');
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
