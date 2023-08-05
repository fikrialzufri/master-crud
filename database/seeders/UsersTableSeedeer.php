<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Str;

class UsersTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // list Role
        $listRole = [
            'superadmin',
            'admin',
            'supir',
            'operator',
            'sales',
        ];

        foreach ($listRole as $key => $value) {
            $nama = $value;

            $role[$key] = Role::whereSlug(Str::slug($nama))->first();

            if (!$role[$key]) {
                $role[$key] = new Role();
                $role[$key]->name = $nama;
                $role[$key]->save();
            }
        }

        $roleSuperadmin = Role::where('slug', 'superadmin')->first();
        $roleAdminn = Role::where('slug', 'admin')->first();

        // list User
        $listUser = [
            [
                'name' => 'Superadmin',
                'username' => 'superadmin',
                'email' => 'superadmin@mail.com',
                'password' => bcrypt('secret'),
                'role_id' => $roleSuperadmin->id,
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('secret'),
                'role_id' => $roleAdminn->id,
            ],
        ];

        foreach ($listUser as $key => $value) {
            $name = $value['name'];
            $email = $value['email'];
            $password = $value['password'];
            $role_id = $value['role_id'];

            $user[$key] = User::whereEmail($email)->first();

            if (!$user[$key]) {
                $user[$key] = new User();
                $user[$key]->username =  $value['username'];
                $user[$key]->name =  $value['name'];
                $user[$key]->email = $value['email'];
                $user[$key]->password = $password;
                $user[$key]->save();
                $user[$key]->role()->attach($role_id);
            }
        }
        // ------------ Task
        $listTask = [
            [
                'nama' => 'User',
                'description' => 'Manajemen User',
            ],
            [
                'nama' => 'Roles',
                'description' => 'Manajemen Hak Akses',
            ],
            // provinsi
            [
                'nama' => 'Provinsi',
                'description' => 'Manajemen Provinsi',
            ],
            [
                'nama' => 'Kota',
                'description' => 'Manajemen Kota',
            ],
            [
                'nama' => 'Cabang',
                'description' => 'Manajemen Cabang',
            ],
            [
                'nama' => 'Jabatan',
                'description' => 'Manajemen Jabatan',
            ],
            [
                'nama' => 'Kendaraan',
                'description' => 'Manajemen Kendaraan'
            ],
            [
                'nama' => 'Karyawan',
                'description' => 'Manajemen Karyawan'
            ],
            [
                'nama' => 'Konversi',
                'description' => 'Manajemen Konversi'
            ],
            [
                'nama' => 'Harga',
                'description' => 'Manajemen Harga'
            ],
            [
                'nama' => 'Pelanggan',
                'description' => 'Manajemen Pelanggan'
            ],
            [
                'nama' => 'Pengiriman Barang',
                'description' => 'Manajemen Pengiriman Barang'
            ],
            [
                'nama' => 'Terima Barang',
                'description' => 'Manajemen Terima Barang'
            ],
            [
                'nama' => 'Surat Jalan',
                'description' => 'Manajemen Surat Jalan'
            ],

            [
                'nama' => 'Setor Uang',
                'description' => 'Manajemen Setor Uang'
            ]

        ];

        foreach ($listTask as $key => $value) {
            $nama = $value['nama'];
            $description = $value['description'];

            $task[$key] = Task::whereSlug(Str::slug($nama))->first();

            if (!$task[$key]) {
                $task[$key] = new Task();
                $task[$key]->name = $nama;
                $task[$key]->description = $description;
                $task[$key]->save();
            }
        }

        $tasks = Task::all();

        foreach ($tasks as $task) {
            $name = $task->name;
            $data = array(

                [
                    'name'    => 'View ' . $name,
                    'task_id' => $task->id
                ],
                [
                    'name'    => 'Create ' . $name,
                    'task_id' => $task->id
                ],
                [
                    'name'    => 'Edit ' . $name,
                    'task_id' => $task->id
                ],
                [
                    'name'    => 'Delete ' . $name,
                    'task_id' => $task->id
                ],
            );

            foreach ($data as $induk) {
                $Permission = Permission::Create($induk);
            }
        }
    }
}
