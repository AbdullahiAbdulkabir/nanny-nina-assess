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
        return User::with('role')->cursor();
    }
}
