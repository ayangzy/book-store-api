<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class LogOutController extends BaseController
{
    public function logOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->successResponse('You have been successfully logged out!');
    }
}
