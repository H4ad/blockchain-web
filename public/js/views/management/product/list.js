/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 63);
/******/ })
/************************************************************************/
/******/ ({

/***/ 63:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(64);


/***/ }),

/***/ 64:
/***/ (function(module, exports) {

/**
 * Script que lista os produtos
 */

$(document).ready(function () {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });

	initTable();
	loadProducts();

	$('#btnUpdateProduct').click(function () {
		updateProductClick();
	});
});

/**
 * Carrega todos os produtos relacionados a este usuário
 */
function loadProducts() {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });

	var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
	var owner = document.head.querySelector('meta[name="participant_id"]').getAttribute('content');

	axios({
		method: 'get',
		url: baseUrlApi + '/queries/selectProductsByOwner?proprietario=resource%3Aorg.transacoes.cantina.Participante%23' + owner,
		headers: {
			'Accept': 'application/json'
		}
	}).then(function (response) {
		closeModal();

		$('#table').bootstrapTable('load', response.data);
	}).catch(function (error) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Ocorreu um erro, não foi possível obter os produtos!" }, { type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } });
	});
}

/**
 * Deleta um certo produto
 * @param  string productId
 */
function deleteProduct(productId) {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });
	var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');

	axios({
		method: 'delete',
		url: baseUrlApi + '/Produto/' + productId,
		headers: {
			'Accept': 'application/json'
		}
	}).then(function (response) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Produto deletado com sucesso!" }, { type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } });

		$table.bootstrapTable('remove', {
			field: 'ProdutoId',
			values: [productId]
		});
	}).catch(function (error) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Ocorreu um erro, não foi possível deletar o produto!" }, { type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } });
	});
}

/**
 * Um intermediário entre a atualização do produto
 */
function updateProductClick() {
	$('#updateProductModal').modal('hide');

	setTimeout(function () {
		updateProduct();
	}, 500);
}

/**
 * Atualiza um produto
 */
function updateProduct() {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });

	var type = $('#updateProductForm').find('input[name="type"]').val();
	var description = $('#updateProductForm').find('input[name="description"]').val();
	var value = $('#updateProductForm').find('input[name="value"]').val();
	var status = $('#updateProductForm option:selected').text();
	var productId = $('#productId').val();
	var productOwner = $('#productOwner').val();

	var data = {
		ProdutoId: productId,
		tipo: type,
		descricao: description,
		valor: value,
		status: status,
		proprietario: productOwner
	};

	var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
	axios({
		method: 'put',
		url: baseUrlApi + '/Produto/' + productId,
		headers: {
			'Content-type': 'application/json',
			'Accept': 'application/json'
		},
		data: JSON.stringify(data)
	}).then(function (success) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Produto atualizado com sucesso!" }, { type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } });

		setTimeout(function () {
			loadProducts();
		}, 500);
	}).catch(function (error) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Ocorreu um erro, não foi possível atualizar o produto!" }, { type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } });
	});
}

/**
 * Fecha a modal
 */
function closeModal() {
	setTimeout(function () {
		$('#progressModal').modal('hide');
	}, 500);
}

var $table = $('#table');
var selections = [];

function initTable() {
	$table.bootstrapTable({
		height: getHeight(),
		columns: [[{
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
		}], [{
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
		}]]
	});

	// sometimes footer render error.
	setTimeout(function () {
		$table.bootstrapTable('resetView');
	}, 200);

	$table.on('expand-row.bs.table', function (e, index, row, $detail) {
		if (index % 2 == 1) {
			$detail.html('Loading from ajax request...');
			$.get('LICENSE', function (res) {
				$detail.html(res.replace(/\n/g, '<br>'));
			});
		}
	});

	$(window).resize(function () {
		$table.bootstrapTable('resetView', {
			height: getHeight()
		});
	});
}

function responseHandler(res) {
	$.each(res.rows, function (i, row) {
		row.state = $.inArray(row.id, selections) !== -1;
	});
	return res;
}

function operateFormatter(value, row, index) {
	return ['<a class="edit" href="javascript:void(0)" title="Editar">', '<i class="fas fa-pencil-alt"></i> ', '</a>  ', '<a class="remove" href="javascript:void(0)" title="Remover">', '<i class="fas fa-times"></i>', '</a>'].join('');
}

window.operateEvents = {
	'click .edit': function clickEdit(e, value, row, index) {
		$('#updateProductForm').find('input[name="type"]').val(row.tipo);
		$('#updateProductForm').find('input[name="description"]').val(row.descricao);
		$('#updateProductForm').find('input[name="value"]').val(row.valor);
		$('#updateProductForm').find('input[name="status"]').val(row.status);
		$('#productId').val(row.ProdutoId);
		$('#productOwner').val(row.proprietario);
		$('#updateProductModal').modal('show');
	},
	'click .remove': function clickRemove(e, value, _ref, index) {
		var ProdutoId = _ref.ProdutoId;

		deleteProduct(ProdutoId);
	}
};

function getHeight() {
	return $(window).height() - $('h1').outerHeight(true);
}

/***/ })

/******/ });