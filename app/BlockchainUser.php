<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Model responsável por guardar informações do usuário registrado na Blockchain.
 */
class BlockchainUser extends Model
{
	/**
	 * Substitui a primary key padrão
	 *
	 * @var string
	 */
	protected $primaryKey = 'participant_id';

	/**
	 * Sobrescreve o tipo da chave primária.
	 *
	 * @var string
	 */
	protected $keyType = 'string';

	/**
	 * Desativa a opção de auto-incremento
	 *
	 * @var boolean
	 */
    public $incrementing = false;

    /*
     * Atributos que são permitidos a atribuição em massa (fill).
     *
     * @var array
     */
    protected $fillable = [
        'participant_class', 'participant_type', 'user_id', 'participant_id', 'description'
    ];

    /**
     * Atributos que são guardados contra atribuição em massa (fill).
     *
     * @var array
     */
    protected $guarded = [
    	'wallet'
    ];

    /**
     * Define a relação entre User e BlockchainUser como um-para-um.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
