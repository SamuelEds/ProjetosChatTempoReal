$(document).ready(function(){
	$('a[daya-confirm]').click(function(ev){
		var href = $(this.attr('href');

if(!$('#confirm-delete').lenght){
$('body').append('<div class='modal fade' id="confirm-delete" tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'>Excluir item<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>Tem certeza que deseja excluir a conta ? (não podemos ajudar em caso de arrependimento!!)</div><div class='modal-footer'><button type='button' class='btn btn-sucess' data-dismiss='modal'>Close</button><a type='button' class='btn btn-danger' id='dataConfirmOK'>Apagar</a></div></div></div></div>');
			}
			$('#dataConfirmOK').att('href', href)
			$('#confirm-delete').modal({shown:true})
		return false;
	});

});

