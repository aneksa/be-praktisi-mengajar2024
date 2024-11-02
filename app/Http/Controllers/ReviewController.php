<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = $request->post();

        $review = Review::create([
            'product_id' => data_get($data, 'product_id'),
            'rating' => $data['rating'],
            'comments' => data_get($data, 'comments')
        ]);
        // $review = new Review();
        // $review->product_id = data_get($data, 'product_id');
        // $review->rating = $data['rating'];
        // $review->comments = data_get($data, 'comments');
        // $review->save();

        return response()->json($review);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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