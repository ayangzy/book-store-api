<?php

namespace App\Http\Controllers\Bookstore;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteBookController extends BaseController
{
    public function destroy(Book $book)
    {
        $user = auth()->user()->id;
        if($user !== $book->user_id){
            return $this->errorResponse('Sorry! you can only delete a book you created', Response::HTTP_FORBIDDEN);
        }

        $book->delete();
        return $this->successResponse('Book successfully deleted', null);
    }
}
