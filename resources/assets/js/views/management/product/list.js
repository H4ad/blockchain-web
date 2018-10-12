/**
 * Script que lista os produtos
 */

 $(document).ready(function(){
 	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});

 	initTable();
 	loadProducts();

 	$('#btnUpdateProduct').click(function(){
	   updateProductClick();
	});
 });

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
 		url: baseUrlApi + '/queries/selectProductsByOwner?proprietario=resource%3Aorg.transacoes.cantina.Participante%23' + owner,
 		headers: {
 			'Accept': 'application/json'
 		}
 	})
 	.then(response => {
 		closeModal();

 		$('#table').bootstrapTable('load', response.data);
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
 * Deleta um certo produto
 * @param  string productId
 */
function deleteProduct(productId)
{
 	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});
	let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');

	axios({
 		method: 'delete',
 		url: baseUrlApi + '/Produto/' + productId,
 		headers: {
 			'Accept': 'application/json'
 		}
 	})
 	.then(response => {
 		closeModal();

 		$.notify(
 			{ icon: "add_alert", message: "Produto deletado com sucesso!" },
 			{ type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } }
		);

 		$table.bootstrapTable('remove', {
			field: 'ProdutoId',
			values: [productId]
		});
 	})
 	.catch(error => {
 		closeModal();

 		$.notify(
 			{ icon: "add_alert", message: "Ocorreu um erro, não foi possível deletar o produto!" },
 			{ type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } }
		);
 	});
}

/**
 * Um intermediário entre a atualização do produto
 */
function updateProductClick()
{
	$('#updateProductModal').modal('hide');

	setTimeout(function () {
		updateProduct();
	}, 500);
}


/**
 * Atualiza um produto
 */
function updateProduct()
{
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true});

	let type = $('#updateProductForm').find('input[name="type"]').val();
	let description = $('#updateProductForm').find('input[name="description"]').val();
	let value = $('#updateProductForm').find('input[name="value"]').val();
	let status = $('#updateProductForm option:selected').text();
	let productId = $('#productId').val();
	let productOwner = $('#productOwner').val();

	let data = {
		ProdutoId: productId,
		tipo: type,
		descricao: description,
		valor: value,
		status: status,
		proprietario: productOwner
	};

	let baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
	axios({
    	method: 'put',
    	url: baseUrlApi + '/Produto/' + productId,
    	headers: {
    		'Content-type' : 'application/json',
    		'Accept': 'application/json'
    	},
    	data: JSON.stringify(data)
    }).then(success => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Produto atualizado com sucesso!" },
			{ type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } }
		);

    	setTimeout(function() {
    		loadProducts();
    	}, 500);
    }).catch(error => {
    	closeModal();

    	$.notify(
			{ icon: "add_alert", message: "Ocorreu um erro, não foi possível atualizar o produto!" },
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
 	}, 500);
 }

 const $table = $('#table');
 let selections = [];

function initTable() {
 	$table.bootstrapTable({
 		height: getHeight(),
 		columns: [
	 		[
		 		{
		 			title: 'Identificador',
		 			field: 'ProdutoId',
		 			rowspan: 2,
		 			align: 'center',
		 			valign: 'middle',
		 			sortable: true
		 		}, {
		 			title: 'Detalhes',
		 			colspan: 5,
		 			align: 'center'
		 		}
	 		],
	 		[
		 		{
		 			field: 'tipo',
		 			title: 'Tipo',
		 			sortable: true,
		 			align: 'center'
		 		}, {
		 			field: 'valor',
		 			title: 'Preço',
		 			sortable: true,
		 			align: 'center'
		 		}, {
		 			field: 'status',
		 			title: 'Status',
		 			sortable: true,
		 			align: 'center'
		 		}, {
		 			field: 'descricao',
		 			title: 'Descrição',
		 			sortable: true,
		 			align: 'center'
		 		}, {
		 			field: 'operate',
		 			title: 'Operações',
		 			align: 'center',
		 			events: operateEvents,
		 			formatter: operateFormatter
		 		}
	 		]
 		]
});

	// sometimes footer render error.
	setTimeout(() => {
		$table.bootstrapTable('resetView');
	}, 200);

	$table.on('expand-row.bs.table', (e, index, row, $detail) => {
		if (index % 2 == 1) {
			$detail.html('Loading from ajax request...');
			$.get('LICENSE', res => {
				$detail.html(res.replace(/\n/g, '<br>'));
			});
		}
	});

	$(window).resize(() => {
		$table.bootstrapTable('resetView', {
			height: getHeight()
		});
	});
}

function responseHandler(res) {
	$.each(res.rows, (i, row) => {
		row.state = $.inArray(row.id, selections) !== -1;
	});
	return res;
}

function operateFormatter(value, row, index) {
	return [
	'<a class="edit" href="javascript:void(0)" title="Editar">',
	'<i class="fas fa-pencil-alt"></i> ',
	'</a>  ',
	'<a class="remove" href="javascript:void(0)" title="Remover">',
	'<i class="fas fa-times"></i>',
	'</a>'
	].join('');
}

window.operateEvents = {
	'click .edit': function (e, value, row, index) {
		$('#updateProductForm').find('input[name="type"]').val(row.tipo);
		$('#updateProductForm').find('input[name="description"]').val(row.descricao);
		$('#updateProductForm').find('input[name="value"]').val(row.valor);
		$('#updateProductForm').find('input[name="status"]').val(row.status);
		$('#productId').val(row.ProdutoId);
		$('#productOwner').val(row.proprietario);
		$('#updateProductModal').modal('show');
	},
	'click .remove': function(e, value, {ProdutoId}, index) {
		deleteProduct(ProdutoId);
	}
};

function getHeight() {
	return $(window).height() - $('h1').outerHeight(true);
}