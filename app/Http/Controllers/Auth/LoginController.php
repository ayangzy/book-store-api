<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return $this->errorResponse('The provided credentials are incorrect.', Response::HTTP_UNAUTHORIZED);
    }

    $token = $user->createToken($request->device_name);
    $user->token = $token->plainTextToken;
    return $this->successResponse('Logged in successfully', new LoginResource($user), Response::HTTP_OK);

    }
}
