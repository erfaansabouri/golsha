<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BehtarinCategory;
use App\Models\BehtarinCategoryProduct;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $currentFilterName = null;
        $products = Product::query();

        if(!empty($request->category_id))
        {
            $currentFilterName = Category::query()->findOrFail($request->category_id)->title;
            $products = $products->whereHas('categories', function ($q) use ($request){
                $q->where('categories.id', $request->category_id);
            });
        }

        if(!empty($request->behtarin_category_id))
        {
            $currentFilterName = BehtarinCategory::query()->findOrFail($request->behtarin_category_id)->title;
            $ids = BehtarinCategoryProduct::query()
                ->where('behtarin_category_id', $request->behtarin_category_id)
                ->pluck('product_id');
            $products = $products->whereIn('id', $ids);
        }

        if(!empty($request->search))
        {
            $currentFilterName = $request->search;
            $products = $products->where('title', 'like', '%'. $request->search .'%');
        }

        $productGroups = $products->orderByDesc('updated_at')->take(100)->get()->chunk(4);

        return view('front-pages.products.index', compact('currentFilterName','productGroups'));
    }

    public function show($id)
    {
        $product = Product::query()->findOrFail($id);
        return view('front-pages.products.show', compact('product'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);
        $user = Auth::user();
        Comment::query()
            ->create([
                'user_id' => $user->id,
                'title' => $request->title,
                'body' => $request->body,
                'commentable_type' => Product::class,
                'commentable_id' => $id,
            ]);
        return redirect()->route('products.show', $id)->with('success', 'نظر شما ثبت شد و پس از تایید مدیریت نمایش داده خواهد شد.');
    }

    public function save($id)
    {
        DB::table('user_saved_products')
            ->insert([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
            ]);
        return redirect()->route('user.profile.saved-products');
    }
}
