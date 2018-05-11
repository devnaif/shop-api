<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Reviews;
use App\Http\Resources\Reviews\ReviewsResource;
use App\Http\Requests\ReviewsRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewsResource::collection($product->reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewsRequest $request, Product $product)
    {
        $review = new Reviews($request->all());
        $product->reviews()->save($review);
        return response([
            'data' => new ReviewsResource($review)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Reviews $reviews)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Reviews $reviews)
    {

        $product->reviews()->update($request->all());
        return response([
            "Ok"
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product, Reviews $reviews)
    {

        $product->reviews()->delete($request->all());
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
