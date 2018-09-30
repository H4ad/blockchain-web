<?php namespace App\Http\Controllers;

use Auth;
use App\BlockchainUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagementController extends Controller
{
	/**
	 * Retorna a view com a página de início.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function management()
    {
		return view('management.home');
    }

	/**
	 * Retorna a view com as transações realizadas.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function transactions()
    {
    	return view('management.transactions');
    }

    /**
	 * Retorna a view com as informações do perfil
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function profile()
    {
    	return view('management.profile');
    }

    /**
     * Verifica e exibe as informações do usuário que estão registrados na Blockchain
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function blockchain(Request $request)
    {
    	if($request->header('accept') == 'application/json')
    		return $this->getUserInformationsToBlockchain();

    	return view('management.blockchain');
    }

    /**
     * Retorna informações para serem registradas na blockchain
     *
     * @param  SaveBlockchainUserRequest $request [description]
     * @return [type]                             [description]
     */
    public function save_blockchain($participant_id)
    {
    	$user = Auth::user();

        if($participant_id != sprintf("%06s", $user->id))
            return response()->json([
                'message' => 'Não foi possível realizar a ação, identificação não combina!'
            ], 400);

        BlockchainUser::firstOrCreate([
            'participant_class' => $user->getClassByRole(),
            'participant_type' => $user->getTypeByRole(),
            'participant_id' => $participant_id,
            'user_id' => $user->id,
            'description' => ''
        ]);

        return response()->json(null, 204);;
    }

    /**
     * Retorna um json com as informações necessárias para cadastrar um usuário na Blockchain
     *
     * @return json
     */
    protected function getUserInformationsToBlockchain()
    {
    	$user = Auth::user();

    	$baseData = [
    		'$class' => $user->getClassByRole(),
    		'tipo' => $user->getTypeByRole(),
    		'ParticipanteId' => sprintf("%06s", $user->id),
    		'carteira' => 0
    	];

    	$url = config('app.api_url');

		if($user->hasRole('student')){
			$baseData += ['nome' => $user->name, 'sobrenome' => ''];
			$url .= '/Aluno';
		}

		if($user->hasRole('canteen')){
			$baseData += ['descricao' => 'Não há informações'];
			$url .= '/Orgao';
		}

		$baseData += ['url' => $url];

    	return response()->json($baseData, 200);
    }


    /**
     * Realiza uma requisição para uma API
     *
     * @param  string $method Tipo de requisição
     * @param  string $url    Url da requisição
     * @param  string $data   Informações do body para a requsição
     * @return string
     */
    protected function curlInit($url, $data)
    {
    	$curl = curl_init();

    	curl_setopt_array($curl, array(
    		CURLOPT_URL => $url,
 			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"content-type: application/json"
	 		),
		));

    	return $curl;
    }
}
