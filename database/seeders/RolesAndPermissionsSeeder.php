<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cans = [
            'view' => [
                'name' => 'ดู',
                'method' => ['index','show'],
            ],
            'create' => [
                'name' => 'สร้าง',
                'method' => ['create','store'],
            ],
            'update' => [
                'name' => 'แก้ไข',
                'method' => ['edit','update'],
            ],
            'delete' => [
                'name' => 'ลบ',
                'method' => ['destroy'],
            ]
        ];

        $roles = ['developer' => 'ผู้พัฒนาระบบ', 'super-admin' => 'ผู้ดูแลระบบ', 'admin' => 'เจ้าหน้าที่','user' => 'ผู้ใช้งาน'];
        foreach ($roles as $key => $value) {
            Role::create(['name' => $key, 'description' => $value]);
        }


        // สำหรับเพิ่ม Permission ที่เป็น CRUD
        $permissions_crud = [
            'role' => 'บทบาทหน้าที่',
            'user' => 'ผู้ใช้งาน',
        ];

        // สำหรับเพิ่ม Permission ที่มีหน้าเดียว
        $permissions = [
            // '4m-change' => '4mChange',
        ];


        foreach ($permissions_crud as $key => $value) {
            foreach ($cans as $k => $can) {
                Permission::create(['name' => $k . '-' . $key, 'main' => $key, 'method' => json_encode($can['method']), 'crud' => 1, 'description' => $can['name'] . $value]);
            }
        }

        foreach ($permissions as $key => $value) {
            Permission::create(['name' => $key, 'main' => $key, 'description' => $value]);
        }

        $developer = Role::findByName('developer');
        $superadmin = Role::findByName('super-admin');

        $developer->givePermissionTo(Permission::all());
        $superadmin->givePermissionTo(Permission::all());
    }
}
