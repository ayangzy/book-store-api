<?php

namespace App\Http\Controllers\Ratings;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use App\Http\Resources\RatingResource;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RatingController extends BaseController
{
    public function store(Book $book, RatingRequest $request)
    {

        $ratings = Rating::firstOrCreate([
            'book_id' => $book->id,
            'user_id' => auth()->user()->id,
            'rating' => $request->rating,
        ]);

        if(!$ratings){
            return $this->errorResponse('Unable to add ratings', Response::HTTP_BAD_GATEWAY);
        }

        return $this->successResponse('Successfully add ratings', new RatingResource($ratings), Response::HTTP_CREATED);
    }
}
