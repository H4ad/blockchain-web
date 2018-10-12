/**
 * Script que lista os produtos
 */

 $(document).ready(function(){
 	loadProducts();

 	$('#submitBuy').click(function(){
	   buyProduct();
	});
 });

let products = {};

 /**
 * Carrega todos os produtos relacionados a este usuário
 */
function loadProducts()
{
 	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});

	let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
 	let owner = document.head.querySelector('meta[name="participant_id"]').getAttribute('content');

 	axios({
 		method: 'get',
 		url: baseUrlApi + '/Produto',
 		headers: {
 			'Accept': 'application/json'
 		}
 	})
 	.then(response => {
 		closeModal();

 		products = response.data;
 		$.each(products, (i, product) => {
		    $('#inputProductsOnBuyProduct').append(`<option value="${product.ProdutoId}"> ${product.tipo} </option>`);
		});

		if(response.data.length == 0)
			$('#submitBuy').prop('disable', true);
 	})
 	.catch(error => {
 		closeModal();

 		$.notify(
 			{ icon: "add_alert", message: "Ocorreu um erro, não foi possível obter os produtos!" },
 			{ type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } }
		);
 	});
}

/**
 * Realiza a transação de compra de um produto
 */
function buyProduct()
{
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});

	let product_id = $('#inputProductsOnBuyProduct option:selected').val();
	let quantity = $('#addProductForm').find('input[name="quantity"]').val();
	let buyer = document.head.querySelector('meta[name="participant_id"]').getAttribute('content');
	let seller = '';

	$.each(products, (i, product) => {
		if(product_id == product.ProdutoId){
			seller = product.proprietario;
		}
	});

	if(isEmptyOrSpaces(seller))
	{
		$.notify(
			{ icon: "add_alert", message: "Erro, não é possivel comprar um produto que não possui proprietário!" },
			{ type: "danger", timer: 3000, placement: { from: 'top', align: 'right' } }
		);
		closeModal();
	}else if (isEmptyOrSpaces(product_id)){
		$.notify(
			{ icon: "add_alert", message: "Erro, não é possivel comprar um produto que não possui identificação!" },
			{ type: "danger", timer: 3000, placement: { from: 'top', align: 'right' } }
		);
		closeModal();
	}else{

		let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');

		const data = {
			$class: "org.transacoes.cantina.Venda",
			comprador: `resource:org.transacoes.cantina.Aluno#${buyer}`,
			vendedor: `resource:org.transacoes.cantina.Orgao#${seller}`,
			comida: `resource:org.transacoes.cantina.Produto#${product_id}`,
		};

		axios({
	    	method: 'post',
	    	url: baseUrlApi + '/Venda',
	    	headers: {
	    		'Content-type' : 'application/json',
	    		'Accept': 'application/json'
	    	},
	    	data: JSON.stringify(data)
	    }).then(success => {
	    	closeModal();

			$.notify(
				{ icon: "add_alert", message: "Compra realizada com sucesso!" },
				{ type: "success", timer: 3000, placement: { from: 'top', align: 'right' } }
			);

			$(':input','#buyForm')
			  .not(':button, :submit, :reset, :hidden')
			  .val('')
			  .prop('checked', false)
			  .prop('selected', false);

	    }).catch(error => {
	    	closeModal();

	    	$.notify(
				{ icon: "add_alert", message: "Erro, não foi possível realizar a compra!" },
				{ type: "danger", timer: 3000, placement: { from: 'top', align: 'right' } }
			);
	    });
	}
}
/**
 * Fecha a modal
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