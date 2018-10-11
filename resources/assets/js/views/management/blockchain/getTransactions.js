/**
 * Script para listar as transações do usuário
 */

$(document).ready(function() {
	$('#progressModal').modal('show');

	axios({
		method: 'get',
		url: 'http://localhost:3000/api/system/historian',
		headers: {
	  		'Accept': 'application/json'
	  	}
  	})
	.then(response => {
	    $('#tableListProduct').bootstrapTable('load', response.data);

	    setTimeout(function() {
			$('#progressModal').modal('hide');
	    }, 1000);
	})
	.catch(error => {
		setTimeout(function() {
			$('#progressModal').modal('hide');
	    }, 1000);
	});
});