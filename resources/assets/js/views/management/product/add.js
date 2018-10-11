/**
 * Script para realizar a adição de um produto
 */

$(document).ready(function(){
	$('#submitAddProduct').click(function(){
	   add();
	});
});

function add()
{
	$('#progressModal').modal('show');

	let type = $('#addProductForm').find('input[name="type"]').val();
	let description = $('#addProductForm').find('input[name="description"]').val();
	let value = $('#addProductForm').find('input[name="value"]').val();
	let status = $('#selectStatus option:selected').text();
	let owner = $('#addProductForm').find('input[name="owner"]').val();
	let productId = UUID.generate();

	let data = {
		$class: 'org.transacoes.cantina.Produto',
		ProdutoId: productId,
		tipo: type,
		descricao: description,
		valor: value,
		status: status,
		proprietario: owner
	};

	let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');;
	axios({
    	method: 'post',
    	url: baseUrlApi + '/Produto',
    	headers: {
    		'Content-type' : 'application/json',
    		'Accept': 'application/json'
    	},
    	data: JSON.stringify(data)
    }).then(success => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Produto adicionado com sucesso!" },
			{ type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } }
		);

		$(':input','#addProductForm')
		  .not(':button, :submit, :reset, :hidden')
		  .val('')
		  .prop('checked', false)
		  .prop('selected', false);

    }).catch(error => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Ocorreu um erro, não foi possível adicionar o produto!" },
			{ type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } }
		);
    });
}

function closeModal()
{
    setTimeout(function() {
		$('#progressModal').modal('hide');
    }, 500);
}