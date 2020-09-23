<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Http\Resources\ProfileResource;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends BaseController
{
    public function show()
    {
        $user = auth()->user();
        if(!$user){
            return $this->errorResponse('An error occured while trying to view your profile, try again', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->successResponse('Profile successfully retrieved', new ProfileResource($user) );
    }
}
