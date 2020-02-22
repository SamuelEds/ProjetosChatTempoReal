function ver(){
	var url = 'ver.php';
	jQuery.get(url, function(data){
		$('#mensagens').empty().append(data);
	});
}


