/**
 * Script para popular o chart de Vendas diárias.
 */

$(document).ready(function() {

	/**
	 * Exibe a modal para o usuário.
	 */
	$('#btnGetIdentity').click(function (){
		$('#exampleModalLong').modal({backdrop: 'static', keyboard: false, show: true});

		let participant_type = document.head.querySelector('meta[name="participant_type"]').getAttribute('content');;
		let participant_id = document.head.querySelector('meta[name="participant_id"]').getAttribute('content');

		if(participant_type != 'Aluno')
			participant_type = 'Orgao';

		axios({
			method: 'get',
			url: 'http://localhost:3000/api/' + participant_type + '/' +  participant_id,
			headers: {
		  		'Accept': 'application/json'
		  	}
	  	})
		.then(response => {
			$('#progressIdentifierText').text('Finalizando, estamos armazenando sua identificação...');
		    saveBlockchainUser(response.data.ParticipanteId);
		})
		.catch(error => {
			getBlockchainUser();
		});
	});
});

/**
 * Caso não haja um usuário com o mesmo id, ele pede para o Laravel retornar um válido e então tenta registrar na Blockchain
 */
function getBlockchainUser()
{
	var getUrl = window.location.origin + '/blockchain';

	axios({
	  method: 'get',
	  url: getUrl,
	  headers: {
	  	'Accept': 'application/json'
	  }
	})
	.then(response => {
		$('#progressIdentifierText').text('Esperando resposta da Blockchain...');
	    saveBlockchain(response);
	})
	.catch(error => {
		showErrorMessage();
	});
}

/**
 * Registra na blockchain informações de um usuário e depois tenta salvar as informações no Laravel
 */
function saveBlockchain(response)
{
	var data = {
		$class: response.data.$class,
		tipo: response.data.tipo,
		descricao: response.data.descricao,
		carteira: response.data.carteira,
		ParticipanteId: response.data.ParticipanteId,
	};

	axios({
    	method: 'post',
    	url: response.data.url,
    	headers: {
    		'Content-type' : 'application/json',
    		'Accept': 'application/json'
    	},
    	data: JSON.stringify(data)
    }).then(dataBlock => {
		$('#progressIdentifierText').text('Esperando resposta da Blockchain...');
    	saveBlockchainUser(dataBlock.data.ParticipanteId);
    }).catch(error => {
    	showErrorMessage();
    });
}

/**
 * Salva as informações do usuário da Blockchain pelo id dele no Laravel
 */
function saveBlockchainUser(id)
{
	var getUrl = window.location.origin + '/blockchain/' + id;
	axios({
    	method: 'post',
    	url: getUrl,
    	headers: {
    		'X-Requested-With': 'XMLHttpRequest',
    		'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    	},
    }).then(function (){
		$('#progressIdentifierText').text('Finalizando, estamos armazenando sua identificação...');
    	showSuccessfulMessage();
    }).catch(error => {
    	showErrorMessage();
    });
}

function showSuccessfulMessage()
{
	$.notify({
	  icon: "add_alert",
	  message: "Identificação armazenada com sucesso!."
	},{
	  type: 'success',
	  timer: 3000,
	  placement: {
	      from: 'top',
	      align: 'right'
	  }
	});

	$('#progressIdentifierText').text('Finalizado, agora você pode realizar as ações normalmente!');
	setTimeout(function () {
		$('#exampleModalLong').modal('hide');
	}, 500);
}

function showErrorMessage()
{
	$.notify({
	  icon: "add_alert",
	  message: "Não foi possível realizar a ação, tente novamente!."

	},{
	  type: 'danger',
	  timer: 3000,
	  placement: {
	      from: 'top',
	      align: 'right'
	  }
	});

	$('#progressIdentifierText').text('Um erro ocorreu, tente novamente!');
	setTimeout(function () {
		$('#exampleModalLong').modal('hide');
	}, 500);
}