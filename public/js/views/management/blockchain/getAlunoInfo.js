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
/******/ 	return __webpack_require__(__webpack_require__.s = 55);
/******/ })
/************************************************************************/
/******/ ({

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(56);


/***/ }),

/***/ 56:
/***/ (function(module, exports) {

/**
 * Script para popular o chart de Vendas diárias.
 */

$(document).ready(function () {

	/**
  * Exibe a modal para o usuário.
  */
	$('#btnGetIdentity').click(function () {
		$('#exampleModalLong').modal({ backdrop: 'static', keyboard: false, show: true });

		var participant_id = document.head.querySelector('meta[name="participant_id"]').getAttribute('content');

		if (isEmptyOrSpaces(participant_id) || participant_id == undefined) getBlockchainUser();else saveBlockchainUser(participant_id);
	});
});

/**
 * Verifica se existe espaços em branco
 */
function isEmptyOrSpaces(str) {
	return str === null || str.match(/^ *$/) !== null;
}

/**
 * Caso não haja um usuário com o mesmo id, ele pede para o Laravel retornar um válido e então tenta registrar na Blockchain
 */
function getBlockchainUser() {
	var getUrl = window.location.origin + '/blockchain';

	axios({
		method: 'get',
		url: getUrl,
		headers: {
			'Accept': 'application/json'
		}
	}).then(function (response) {
		$('#progressIdentifierText').text('Esperando resposta da Blockchain...');
		saveBlockchain(response);
	}).catch(function (error) {
		showErrorMessage();
	});
}

/**
 * Registra na blockchain informações de um usuário e depois tenta salvar as informações no Laravel
 */
function saveBlockchain(response) {
	var data = {
		$class: response.data.$class,
		tipo: response.data.tipo,
		descricao: response.data.descricao,
		carteira: response.data.carteira,
		ParticipanteId: UUID.generate()
	};

	axios({
		method: 'post',
		url: response.data.url,
		headers: {
			'Content-type': 'application/json',
			'Accept': 'application/json'
		},
		data: JSON.stringify(data)
	}).then(function (dataBlock) {
		$('#progressIdentifierText').text('Esperando resposta da Blockchain...');
		saveBlockchainUser(dataBlock.data.ParticipanteId);
	}).catch(function (error) {
		showErrorMessage();
	});
}

/**
 * Salva as informações do usuário da Blockchain pelo id dele no Laravel
 */
function saveBlockchainUser(id) {
	var getUrl = window.location.origin + '/blockchain/' + id;
	axios({
		method: 'post',
		url: getUrl,
		headers: {
			'X-Requested-With': 'XMLHttpRequest',
			'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		}
	}).then(function () {
		$('#progressIdentifierText').text('Finalizando, estamos armazenando sua identificação...');
		showSuccessfulMessage();
	}).catch(function (error) {
		showErrorMessage();
	});
}

function showSuccessfulMessage() {
	$.notify({
		icon: "add_alert",
		message: "Identificação armazenada com sucesso!."
	}, {
		type: 'success',
		timer: 3000,
		placement: {
			from: 'top',
			align: 'right'
		}
	});

	$('#progressIdentifierText').text('Finalizado, agora você pode realizar as ações normalmente!');
	setTimeout(function () {
		$('#exampleModalLong').modal('hide');
	}, 500);
}

function showErrorMessage() {
	$.notify({
		icon: "add_alert",
		message: "Não foi possível realizar a ação, tente novamente!."

	}, {
		type: 'danger',
		timer: 3000,
		placement: {
			from: 'top',
			align: 'right'
		}
	});

	$('#progressIdentifierText').text('Um erro ocorreu, tente novamente!');
	setTimeout(function () {
		$('#exampleModalLong').modal('hide');
	}, 500);
}

/***/ })

/******/ });