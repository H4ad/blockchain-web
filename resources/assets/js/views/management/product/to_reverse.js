/**
 * Script para realizar o estorno de algum produto
 */

$(document).ready(function(){
	$('#submitToReverse').click(function(){
	   toReverse();
	});
});

/**
 * Estorna um produto
 */
function toReverse()
{
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});

	let student = $('#toReverseForm').find('input[name="student"]').val();
	let reversed_product = $('#toReverseForm').find('input[name="reversed_product"]').val();
	let seller = $('#toReverseForm').find('input[name="seller"]').val();

	const data = {
		$class: 'org.transacoes.cantina.Estorno',
		comprador: 'resource:org.transacoes.cantina.Aluno#' + student,
		vendedor: 'resource:org.transacoes.cantina.Orgao#' + seller,
		produtoEstornado: 'resource:org.transacoes.cantina.Produto#' + reversed_product
	};
	let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
	axios({
    	method: 'post',
    	url: baseUrlApi + '/Estorno',
    	headers: {
    		'Content-type' : 'application/json',
    		'Accept': 'application/json'
    	},
    	data: JSON.stringify(data)
    }).then(success => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Produto estornado com sucesso!" },
			{ type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } }
		);

		$(':input','#toReverseForm')
		  .not(':button, :submit, :reset, :hidden')
		  .val('')
		  .prop('checked', false)
		  .prop('selected', false);

    }).catch(error => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Ocorreu um erro, não foi possível estornar o produto!" },
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