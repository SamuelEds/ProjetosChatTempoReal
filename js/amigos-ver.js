function ver(){
	var url = 'ver-amigos.php';
	jQuery.get(url, function(data){
		$('#mensagens').empty().append(data);
	});
}


