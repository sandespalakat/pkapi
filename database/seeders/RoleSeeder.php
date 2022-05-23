<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(
            [
                [

                    'name' => "Administrator",
                ],
                [
                    'name' => "Administrator Staff",
                ],
                [
                    'name' => "Other Staff",
                ],
                [
                    'name' => "Master Client",
                ],
                [
                    'name' => "Client Employee",
                ],
            ]

        );
    }
}
