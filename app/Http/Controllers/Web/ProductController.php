<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorySlug = $request->get('category');
        $minAmount = $request->get('minamount');
        $maxAmount = $request->get('maxamount');

        $categories = Category::all();
        $products = Product::query();

        $products->whereHas('category', function ($query) use ($categorySlug) {
            if ($categorySlug) {
                $query->where('slug', $categorySlug);
            }
        });

        if ($minAmount) {
            $products->where('price', '>=', $minAmount);
        }

        if ($maxAmount) {
            $products->where('price', '<=', $maxAmount);
        }


        $products = $products->paginate(10);


        return response()->view('products', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::query()->where("slug", $slug)->first();

        return response()->view('product-detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}