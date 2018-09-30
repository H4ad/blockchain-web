<?php

namespace App;

use App\BlockchainUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retorna as notificações que devem ser exibidas no menu.
     *
     * @return array
     */
    public function getMenuNotifications()
    {
        return $this->unreadNotifications()->where('type', 'menu')->get();
    }

    /**
     * Define a relação entre User e BlockchainUser como um-para-um.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function participant()
    {
        return $this->hasOne(BlockchainUser::class);
    }

    /**
     * Retorna o tipo do usuário válido para a Blockchain.
     *
     * @return string
     */
    public function getTypeByRole()
    {
        if($this->hasRole('student'))
            return 'Aluno';

        return 'Orgaos';
    }

    /**
     * Retorna a classe do usuário válido para a Blockchain.
     *
     * @return string
     */
    public function getClassByRole()
    {
        if($this->hasRole('student'))
            return 'org.transacoes.cantina.Aluno';

        return 'org.transacoes.cantina.Orgao';
    }
}
