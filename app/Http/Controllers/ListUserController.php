<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListUserController extends Controller
{
    public function __invoke(UserService $userService): AnonymousResourceCollection
    {
        return UserResource::collection($userService->listUsers());
    }
}
