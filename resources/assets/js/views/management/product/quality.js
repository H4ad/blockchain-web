/**
 * Script para realizar a transação de qualidade
 */

$(document).ready(function(){
	$('#submitQuality').click(function(){
	   sendQualityTransaction();
	});
});

/**
 * Realiza a transação de qualidade
 */
function sendQualityTransaction()
{
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});

	let student = $('#qualityForm').find('input[name="student"]').val();
	let seller = $('#qualityForm').find('input[name="seller"]').val();
	let product_expired = $('#qualityForm').find('input[name="product_expired"]').val();
	let stock_expired = $('#qualityForm').find('input[name="stock_expired"]').val();
	let product = $('#qualityForm').find('input[name="product"]').val();

	const data = {
		comprador: 'resource:org.transacoes.cantina.Aluno#' + student,
		vendedor: 'resource:org.transacoes.cantina.Orgao#' + seller,
		produtoVencido: 'resource:org.transacoes.cantina.Produto#' + product_expired,
		estoqueVencido: 'resource:org.transacoes.cantina.Estoque#' + stock_expired
	};

	let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');

	if(isEmptyOrSpaces(product))
	{
		data['$class'] = 'org.transacoes.cantina.QualidadeSemVenda';
		baseUrlApi += '/QualidadeSemVenda';
	} else {
		data['$class'] = 'org.transacoes.cantina.QualidadeComVenda';
		data['produto'] = 'resource:org.transacoes.cantina.Produto#' + product;
		baseUrlApi += '/QualidadeComVenda';
	}

	axios({
    	method: 'post',
    	url: baseUrlApi,
    	headers: {
    		'Content-type' : 'application/json',
    		'Accept': 'application/json'
    	},
    	data: JSON.stringify(data)
    }).then(success => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Qualidade realizada com sucesso!" },
			{ type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } }
		);

		$(':input','#qualityForm')
		  .not(':button, :submit, :reset, :hidden')
		  .val('')
		  .prop('checked', false)
		  .prop('selected', false);

    }).catch(error => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Ocorreu um erro, não foi possível realizar a qualidade!" },
			{ type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } }
		);
    });
}

/**
 * Fecha a modal de progresso
 */
function closeModal()
{
    setTimeout(function() {
		$('#progressModal').modal('hide');
    }, 500);
}

/**
 * Verifica se existe espaços em branco
 */
function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}