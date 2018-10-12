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
/******/ 	return __webpack_require__(__webpack_require__.s = 69);
/******/ })
/************************************************************************/
/******/ ({

/***/ 69:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(70);


/***/ }),

/***/ 70:
/***/ (function(module, exports) {

/**
 * Script que lista os produtos
 */

$(document).ready(function () {
	loadProducts();

	$('#submitBuy').click(function () {
		buyProduct();
	});
});

var products = {};

/**
* Carrega todos os produtos relacionados a este usuário
*/
function loadProducts() {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });

	var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
	var owner = document.head.querySelector('meta[name="participant_id"]').getAttribute('content');

	axios({
		method: 'get',
		url: baseUrlApi + '/Produto',
		headers: {
			'Accept': 'application/json'
		}
	}).then(function (response) {
		closeModal();

		products = response.data;
		$.each(products, function (i, product) {
			$('#inputProductsOnBuyProduct').append('<option value="' + product.ProdutoId + '"> ' + product.tipo + ' </option>');
		});

		if (response.data.length == 0) $('#submitBuy').prop('disable', true);
	}).catch(function (error) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Ocorreu um erro, não foi possível obter os produtos!" }, { type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } });
	});
}

/**
 * Realiza a transação de compra de um produto
 */
function buyProduct() {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });

	var product_id = $('#inputProductsOnBuyProduct option:selected').val();
	var quantity = $('#addProductForm').find('input[name="quantity"]').val();
	var buyer = document.head.querySelector('meta[name="participant_id"]').getAttribute('content');
	var seller = '';

	$.each(products, function (i, product) {
		if (product_id == product.ProdutoId) {
			seller = product.proprietario;
		}
	});

	if (isEmptyOrSpaces(seller)) {
		$.notify({ icon: "add_alert", message: "Erro, não é possivel comprar um produto que não possui proprietário!" }, { type: "danger", timer: 3000, placement: { from: 'top', align: 'right' } });
		closeModal();
	} else if (isEmptyOrSpaces(product_id)) {
		$.notify({ icon: "add_alert", message: "Erro, não é possivel comprar um produto que não possui identificação!" }, { type: "danger", timer: 3000, placement: { from: 'top', align: 'right' } });
		closeModal();
	} else {

		var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');

		var data = {
			$class: "org.transacoes.cantina.Venda",
			comprador: 'resource:org.transacoes.cantina.Aluno#' + buyer,
			vendedor: 'resource:org.transacoes.cantina.Orgao#' + seller,
			comida: 'resource:org.transacoes.cantina.Produto#' + product_id
		};

		axios({
			method: 'post',
			url: baseUrlApi + '/Venda',
			headers: {
				'Content-type': 'application/json',
				'Accept': 'application/json'
			},
			data: JSON.stringify(data)
		}).then(function (success) {
			closeModal();

			$.notify({ icon: "add_alert", message: "Compra realizada com sucesso!" }, { type: "success", timer: 3000, placement: { from: 'top', align: 'right' } });

			$(':input', '#buyForm').not(':button, :submit, :reset, :hidden').val('').prop('checked', false).prop('selected', false);
		}).catch(function (error) {
			closeModal();

			$.notify({ icon: "add_alert", message: "Erro, não foi possível realizar a compra!" }, { type: "danger", timer: 3000, placement: { from: 'top', align: 'right' } });
		});
	}
}
/**
 * Fecha a modal
 */
function closeModal() {
	setTimeout(function () {
		$('#progressModal').modal('hide');
	}, 500);
}

/**
 * Verifica se existe espaços em branco
 */
function isEmptyOrSpaces(str) {
	return str === null || str.match(/^ *$/) !== null;
}

/***/ })

/******/ });