<?php

namespace App\Http\Controllers\Bookstore;

use App\Http\Controllers\BaseController;
use App\Http\Resources\ViewBooksResource;
use App\Models\Book;
use Symfony\Component\HttpFoundation\Response;

class GetBookController extends BaseController
{
    public function show(Book $book)
    {
        $bookdata = new ViewBooksResource($book);

        if(!$bookdata){
            return $this->errorResponse('Unable to view Book', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->successResponse('Book successfully retrieved', $bookdata);
    }
}
