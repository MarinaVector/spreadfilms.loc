<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Models\Pivots\CompanyRole;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('roles')->insert([
       //     ['name' => 'admin', 'default' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        //    ['name' => 'member', 'default' => 0, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]


      $admin = new CompanyRole();
        $admin->name = 'admin';
        $admin->save();
        $member = new CompanyRole();
        $member->name = 'member';
        $member->save();


    }
}
