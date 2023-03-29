<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            'index user', 'create user', 'delete user', 'edit user',
            'index area', 'create area', 'delete area', 'edit area', 'import area', 'export area',
            'index property type', 'create property type', 'delete property type', 'edit property type', 'import property type', 'export property type',
            'index property', 'create property', 'delete property', 'edit property', 'import property', 'export property',
            'index property flooring', 'create property flooring', 'delete property flooring', 'edit property flooring', 'import property flooring', 'export property flooring',
            'index property summary', 'create property summary', 'delete property summary', 'edit property summary', 'import property summary', 'export property summary',
            'index property general', 'create property general', 'delete property general', 'edit property general', 'import property general', 'export property general',
            'index property image', 'create property image', 'delete property image', 'edit property image', 'import property image', 'export property image',
            'index sub area', 'create sub area', 'delete sub area', 'edit sub area',
            'index keyword', 'create keyword', 'delete keyword', 'edit keyword',
            'index link', 'create link', 'delete link', 'edit link',
            'index general', 'create general', 'delete general', 'edit general', 'import general', 'export general',
            'index flooring', 'create flooring', 'delete flooring', 'edit flooring', 'import flooring', 'export flooring',
            'index summary', 'create summary', 'delete summary', 'edit summary', 'import summary', 'export summary',
            'index blog', 'create blog', 'delete blog', 'edit blog',
            'index country', 'create country', 'delete country', 'edit country', 'import country', 'export country',
            'index floor', 'create floor', 'delete floor', 'edit floor', 'import floor', 'export floor',
            'index furniture', 'create furniture', 'delete furniture', 'edit furniture', 'import furniture', 'export furniture',
            'index contact', 'delete contact',
            'index search',
            'index role model', 'create role model', 'delete role model'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
