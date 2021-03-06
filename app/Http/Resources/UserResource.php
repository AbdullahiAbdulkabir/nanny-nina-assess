<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->{'id'},
            'name' => $this->{'name'},
            'email' => $this->{'email'},
            'phone' => $this->{'phone'},
            'address' => $this->{'address'},
//            'role_name' => $this->whenLoaded('role'),
            'role' => RoleResource::make($this->role),
        ];
    }
}
