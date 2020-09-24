<?php

namespace App\Http\Controllers\Bookstore;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateBookController extends BaseController
{
    public function store(CreateBookRequest $request)
    {
        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->photo = $request->file('photo')->store('images');
        $book->user_id = auth()->user()->id;

        if(!$book->save()){
            return $this->errorResponse('Unable to create a book', Response::HTTP_BAD_REQUEST);
        }

        return $this->successResponse('Book successfully created', new BookResource($book), Response::HTTP_CREATED);

    }
}
