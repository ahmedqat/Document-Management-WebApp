<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
//use App\Models\Role;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User'
        //     'email' => 'test@example.com'
        // ]);


        Department::create([
            'name' => 'Library'
        ]);
        Department::create([
            'name' => 'IT Department'
        ]);
        Department::create([
            'name' => 'Admin Department'
        ]);
        Department::create([
            'name' => 'Finance Department'
        ]);
        Department::create([
            'name' => 'Research and Innovation'
        ]);
        Department::create([
            'name' => 'Human Resource Department'
        ]);
        Department::create([
            'name' => 'Procurement and Asset Management Department'
        ]);
        Department::create([
            'name' => 'Office of Academic Affairs (Academic Affairs)'
        ]);
        Department::create([
            'name' => 'Office of Academic Affairs (Quality Assurance)'
        ]);


        //1
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        //2
        $librarianRole = Role::create(['name' => 'Librarian'  ]);
        //3
        $itEdtitorRole = Role::create(['name' => 'IT Editor' ]);
        //4
        $adminRole = Role::create(['name' => 'Admin Editor'  ]);
        //5
        $financeRole = Role::create(['name' => 'Finance'  ]);
        //6
        $researchRole = Role::create(['name' => 'Research' ]);
        //7
        $hrRole = Role::create(['name' => 'HR'  ]);
        //8
        $pamoRole = Role::create(['name' => 'PAMO' ]);
        //9
        $oAA = Role::create(['name' => 'OAA'  ]);
        //10
        $qa = Role::create(['name' => 'QA' ]);
    }
}
