<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $user = User::create([
            'nom' => 'khouma', 
            'prenom' => 'Moustapha', 
            'adresse' => 'rufisque', 
            'role' => 'admin', 
            'genre' => 'M.', 
            'lieuNaissance' => 'Dakar', 
            'dateNaissance' => '2021-03-01', 
            'email' => 'admin@gmail.com',
            'tel' => '770987654',
            'password' => bcrypt('password')
        ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
