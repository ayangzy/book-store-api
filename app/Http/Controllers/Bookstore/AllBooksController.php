<?php

namespace App\Http\Controllers\Bookstore;

use App\Http\Controllers\BaseController;
use App\Http\Resources\ViewBooksResource;
use App\Models\Book;
use Symfony\Component\HttpFoundation\Response;

class AllBooksController extends BaseController
{
    public function index()
    {
        $books = Book::latest()->orderBy('created_at', 'Desc')->paginate(10);
        if(!$books){
            return $this->errorResponse('Unable to view books', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return $this->successResponse('Books succcessfully retrieved', ViewBooksResource::collection($books));
    }
}
