<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\User;
//use App\Models\Role;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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


        $defaultRole = Role::create(['name' => 'Default'  ]);
        $superAdminRole = Role::create(['name' => 'Super Admin']);

        $superAdmin = User::create([
            'username' => 'su',
            'name' => 'Master',
            'email' => 'su@xmu.edu.my',
            'password' => bcrypt('350916'),
        ]);

        $superAdmin->syncRoles($superAdminRole);


        // $library = Department::create([
        //     'name' => 'Library'
        // ]);
        // $modLib = Permission::create(['name' => "modify_{$library->id}"]);
        // $IT = Department::create([
        //     'name' => 'IT Department'
        // ]);
        // $modIT = Permission::create(['name' => "modify_{$IT->id}"]);
        // $admin = Department::create([
        //     'name' => 'Admin Department'
        // ]);
        // $modAdmin = Permission::create(['name' => "modify_{$admin->id}"]);
        // $finance = Department::create([
        //     'name' => 'Finance Department'
        // ]);
        // $modFinance = Permission::create(['name' => "modify_{$finance->id}"]);
        // $research = Department::create([
        //     'name' => 'Research and Innovation'
        // ]);
        // $modResearch = Permission::create(['name' => "modify_{$research->id}"]);
        // $humanResources = Department::create([
        //     'name' => 'Human Resource Department'
        // ]);
        // $modHR = Permission::create(['name' => "modify_{$humanResources->id}"]);
        // $pamo = Department::create([
        //     'name' => 'Procurement and Asset Management Department'
        // ]);
        // $modPamo = Permission::create(['name' => "modify_{$pamo->id}"]);
        // $oAAdep = Department::create([
        //     'name' => 'Office of Academic Affairs (Academic Affairs)'
        // ]);
        // $modOaa = Permission::create(['name' => "modify_{$oAAdep->id}"]);
        // $qualityAssurance = Department::create([
        //     'name' => 'Office of Academic Affairs (Quality Assurance)'
        // ]);
        // $modQa = Permission::create(['name' => "modify_{$qualityAssurance->id}"]);





        // //1
        // $superAdminRole = Role::create(['name' => 'Super Admin']);
        // //2
        // $librarianRole = Role::create(['name' => 'Librarian'  ]);
        // $librarianRole->givePermissionTo($modLib);
        // //3
        // $itEdtitorRole = Role::create(['name' => 'IT Editor' ]);
        // $itEdtitorRole->givePermissionTo($modIT);
        // //4
        // $adminRole = Role::create(['name' => 'Admin Editor'  ]);
        // $adminRole->givePermissionTo($modAdmin);
        // //5
        // $financeRole = Role::create(['name' => 'Finance'  ]);
        // $financeRole->givePermissionTo($modFinance);
        // //6
        // $researchRole = Role::create(['name' => 'Research' ]);
        // $researchRole->givePermissionTo($modResearch);
        // //7
        // $hrRole = Role::create(['name' => 'HR'  ]);
        // $hrRole->givePermissionTo($modHR);
        // //8
        // $pamoRole = Role::create(['name' => 'PAMO' ]);
        // $pamoRole->givePermissionTo($modPamo);
        // //9
        // $oAA = Role::create(['name' => 'OAA'  ]);
        // $oAA->givePermissionTo($modOaa);
        // //10
        // $qa = Role::create(['name' => 'QA' ]);
        // $qa->givePermissionTo($modQa);
    }
}
