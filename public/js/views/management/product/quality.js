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
/******/ 	return __webpack_require__(__webpack_require__.s = 67);
/******/ })
/************************************************************************/
/******/ ({

/***/ 67:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(68);


/***/ }),

/***/ 68:
/***/ (function(module, exports) {

/**
 * Script para realizar a transação de qualidade
 */

$(document).ready(function () {
	$('#submitQuality').click(function () {
		sendQualityTransaction();
	});
});

/**
 * Realiza a transação de qualidade
 */
function sendQualityTransaction() {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });

	var student = $('#qualityForm').find('input[name="student"]').val();
	var seller = $('#qualityForm').find('input[name="seller"]').val();
	var product_expired = $('#qualityForm').find('input[name="product_expired"]').val();
	var stock_expired = $('#qualityForm').find('input[name="stock_expired"]').val();
	var product = $('#qualityForm').find('input[name="product"]').val();

	var data = {
		comprador: 'resource:org.transacoes.cantina.Aluno#' + student,
		vendedor: 'resource:org.transacoes.cantina.Orgao#' + seller,
		produtoVencido: 'resource:org.transacoes.cantina.Produto#' + product_expired,
		estoqueVencido: 'resource:org.transacoes.cantina.Estoque#' + stock_expired
	};

	var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');

	if (isEmptyOrSpaces(product)) {
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
			'Content-type': 'application/json',
			'Accept': 'application/json'
		},
		data: JSON.stringify(data)
	}).then(function (success) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Qualidade realizada com sucesso!" }, { type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } });

		$(':input', '#qualityForm').not(':button, :submit, :reset, :hidden').val('').prop('checked', false).prop('selected', false);
	}).catch(function (error) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Ocorreu um erro, não foi possível realizar a qualidade!" }, { type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } });
	});
}

/**
 * Fecha a modal de progresso
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