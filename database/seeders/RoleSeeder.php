<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    private array $roles = [
        Role::ADMIN => "Admin can do anything over the application.",
        Role::CUSTOMER => "Customers can have specific actions",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role => $description) {
            DB::table('roles')->insert(
                [
                    'name' => $role,
                    'description' => $description,
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }
    }
}
