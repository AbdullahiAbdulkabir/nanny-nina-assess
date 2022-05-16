<?php
declare(strict_types=1);

namespace App\Services;


use App\Models\User;

/**
 * Class UserService
 * @package App\Services
 * @author Abdullahi Abdulkabir <abdullahiabdulkabir1@gmail.com>
 */
class UserService
{
    public function listUsers()
    {
        $name = request()->get('name');
        $phone = request()->get('phone');
        $address = request()->get('address');

        return User::with('role')->when($name, function ($query, $name) {
            $query->where('name', 'LIKE', '%' . strtolower($name) . '%');
        })->when($phone, function ($query, $phone) {
            $query->where('phone', 'LIKE', '%' . $phone . '%');
        })->when($address, function ($query, $address) {
            $query->where('address', 'LIKE', '%' . strtolower($address) . '%');
        })->cursor();
    }
}
