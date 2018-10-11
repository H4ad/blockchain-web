/**
 * Script que lista os produtos
 */

product = {
	getProducts: function()
	{
		axios({
			method: 'get',
			url: 'http://localhost:3000/api/Produto',
			headers: {
		  		'Accept': 'application/json'
		  	}
	  	})
		.then(response => {
		    return response.data;
		})
		.catch(error => {
			$.notify(
				{ icon: "add_alert", message: "Ocorreu um erro, não foi possível obter os produtos!" },
				{ type: 'danger', timer: 3000, placement: { from: 'top', align: 'right' } }
			);
		});
	}
}