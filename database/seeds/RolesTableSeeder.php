<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Permissões adicionadas ao usuário quando ele é criado.
     *
     * @var array
     */
    protected $permissions_student = [
        'see_transactions', 'buy_product'
    ];

    /**
     * Permissões adicionadas à cantina quando ela é criada.
     *
     * @var array
     */
    protected $permissions_canteen = [
        'exchange_product', 'sell_product', 'to_reverse_product', 'quality', 'add_product', 'edit_product', 'remove_product', 'see_transactions'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'canteen',
                'display_name' => 'Cantina',
                'description' => 'Usuário que pode acessar e manipular a organização Cantina'
            ],
            [
                'name' => 'student',
                'display_name' => 'Aluno',
                'description' => 'Usuário que é um aluno'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }

        $student = Role::where('name', 'student')->first();
        $canteen = Role::where('name', 'canteen')->first();

        foreach(Permission::whereIn('name', $this->permissions_student)->get() as $permission)
            $student->attachPermission($permission);

        foreach(Permission::whereIn('name', $this->permissions_canteen)->get() as $permission)
            $canteen->attachPermission($permission);
    }
}
