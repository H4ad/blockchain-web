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
/******/ 	return __webpack_require__(__webpack_require__.s = 65);
/******/ })
/************************************************************************/
/******/ ({

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(66);


/***/ }),

/***/ 66:
/***/ (function(module, exports) {

/**
 * Script para realizar o estorno de algum produto
 */

$(document).ready(function () {
	$('#submitToReverse').click(function () {
		toReverse();
	});
});

/**
 * Estorna um produto
 */
function toReverse() {
	$('#progressModal').modal({ backdrop: 'static', keyboard: true, show: true });

	var student = $('#toReverseForm').find('input[name="student"]').val();
	var reversed_product = $('#toReverseForm').find('input[name="reversed_product"]').val();
	var seller = $('#toReverseForm').find('input[name="seller"]').val();

	var data = {
		$class: 'org.transacoes.cantina.Estorno',
		comprador: 'resource:org.transacoes.cantina.Aluno#' + student,
		vendedor: 'resource:org.transacoes.cantina.Orgao#' + seller,
		produtoEstornado: 'resource:org.transacoes.cantina.Produto#' + reversed_product
	};
	var baseUrlApi = document.head.querySelector('meta[name="api_blockchain"]').getAttribute('content');;
	axios({
		method: 'post',
		url: baseUrlApi + '/Estorno',
		headers: {
			'Content-type': 'application/json',
			'Accept': 'application/json'
		},
		data: JSON.stringify(data)
	}).then(function (success) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Produto estornado com sucesso!" }, { type: 'success', timer: 3000, placement: { from: 'top', align: 'right' } });

		$(':input', '#toReverseForm').not(':button, :submit, :reset, :hidden').val('').prop('checked', false).prop('selected', false);
	}).catch(function (error) {
		closeModal();

		$.notify({ icon: "add_alert", message: "Ocorreu um erro, não foi possível estornar o produto!" }, { type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } });
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

/***/ })

/******/ });