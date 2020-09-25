<?php

namespace App\Http\Controllers\Bookstore;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateBookController extends BaseController
{
    public function update(Book $book, Request $request)
    {
        // check if currently authenticated user is the owner of the book
        $user = auth()->user()->id;
        if($user !== $book->user_id){
            return $this->errorResponse('Sorry! you can only update your own book',Response::HTTP_FORBIDDEN);
        }

        $book->update($request->all());
         return $this->successResponse('Record successfully updated', new BookResource($book) );
    }
}
