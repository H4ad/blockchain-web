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
/******/ 	return __webpack_require__(__webpack_require__.s = 59);
/******/ })
/************************************************************************/
/******/ ({

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(60);


/***/ }),

/***/ 60:
/***/ (function(module, exports) {

/**
 * Script para realizar troca
 */

$(document).ready(function () {
	$('#submitExchange').click(function () {
		sendExchangeTransaction();
	});
});

function sendExchangeTransaction() {
	$('#progressModal').modal('show');

	var buyer = $('#exchangeForm').find('input[name="student"]').val();
	var seller = $('#exchangeForm').find('input[name="seller"]').val();
	var product_received = $('#exchangeForm').find('input[name="product_received"]').val();
	var product_gived = $('#exchangeForm').find('input[name="product_gived"]').val();

	var data = {
		comprador: 'resource:org.transacoes.cantina.Aluno#' + buyer,
		vendedor: 'resource:org.transacoes.cantina.Orgao#' + seller,
		produtoRecebido: 'resource:org.transacoes.cantina.Produto#' + product_received,
		produtoEntregue: 'resource:org.transacoes.cantina.Produto#' + product_gived
	};

	var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');
	axios({
		method: 'post',
		url: baseUrlApi + '/Troca',
		headers: {
			'Content-type': 'application/json',
			'Accept': 'application/json'
		},
		data: JSON.stringify(data)
	}).then(function (success) {
		$.notify({ icon: "add_alert", message: "Troca realizada com sucesso!" }, { type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } });
	}).catch(function (error) {
		$.notify({ icon: "add_alert", message: "Ocorreu um erro, não foi possível realizar a troca!" }, { type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } });
	});

	setTimeout(function () {
		$('#progressModal').modal('hide');
	}, 1000);
}

/***/ })

/******/ });