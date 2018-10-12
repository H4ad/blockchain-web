/**
 * Script para realizar troca
 */

$(document).ready(function(){
	$('#submitExchange').click(function(){
	   sendExchangeTransaction();
	});
});

/**
 * Executa transação de troca
 */
function sendExchangeTransaction()
{
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});

	let buyer = $('#exchangeForm').find('input[name="student"]').val();
	let seller = $('#exchangeForm').find('input[name="seller"]').val();
	let product_received = $('#exchangeForm').find('input[name="product_received"]').val();
	let product_gived = $('#exchangeForm').find('input[name="product_gived"]').val();

	let data = {
		comprador: 'resource:org.transacoes.cantina.Aluno#' + buyer,
	    vendedor: 'resource:org.transacoes.cantina.Orgao#' + seller,
	    produtoRecebido: 'resource:org.transacoes.cantina.Produto#' + product_received,
	    produtoEntregue: 'resource:org.transacoes.cantina.Produto#' + product_gived,
	};

	let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
	axios({
    	method: 'post',
    	url: baseUrlApi + '/Troca',
    	headers: {
    		'Content-type' : 'application/json',
    		'Accept': 'application/json'
    	},
    	data: JSON.stringify(data)
    }).then(success => {
		closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Troca realizada com sucesso!" },
			{ type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } }
		);
    }).catch(error => {
		closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Ocorreu um erro, não foi possível realizar a troca!" },
			{ type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } }
		);
    });
}

/**
 * Fecha a modal
 */
function closeModal()
{
     setTimeout(function() {
		$('#progressModal').modal('hide');
    }, 1000);
}
