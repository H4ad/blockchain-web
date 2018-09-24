<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'exchange_product',
                'display_name' => 'Trocar produto',
                'description' => 'Permite um usuário realizar a troca de um produto.'
            ],
            [
                'name' => 'sell_product',
                'display_name' => 'Vender produto',
                'description' => 'Permite um usuário vender um produto.'
            ],
            [
                'name' => 'to_reverse_product',
                'display_name' => 'Estornar produto',
                'description' => 'Permite um usuário estornar um produto.'
            ],
            [
                'name' => 'quality',
                'display_name' => 'Qualidade',
                'description' => 'Permite um usuário fazer qualidade.'
            ],
            [
                'name' => 'add_product',
                'display_name' => 'Adicionar produto',
                'description' => 'Permite um usuário adicionar um produto.'
            ],
            [
                'name' => 'edit_product',
                'display_name' => 'Editar produto',
                'description' => 'Permite um usuário editar um produto.'
            ],
            [
                'name' => 'remove_product',
                'display_name' => 'Remover produto',
                'description' => 'Permite um usuário remover um produto.'
            ],
            [
                'name' => 'see_transactions',
                'display_name' => 'Ver transações',
                'description' => 'Permite um usuário ver suas transações.'
            ],
            [
                'name' => 'buy_product',
                'display_name' => 'Comprar produto',
                'description' => 'Permite um usuário comprar um produto.'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
