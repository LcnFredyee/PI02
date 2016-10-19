// LIGHTBOX
$(document).ready(function(){
	$('.lightbox').click(function(){
		$('.background, .box').animate({'opacity':'.60'}, 500, 'linear');
		$('.box').animate({'opacity':'1.00'}, 500, 'linear');
		$('.background, .box').css('display', 'block');					
	});
	
	$('.close').click(function(){
		$('.background, .box').animate({'opacity':'0'}, 500, 'linear', function(){
			$('.background, .box').css('display', 'none');
		});
	});
	
	$('.background').click(function(){
		$('.background, .box').animate({'opacity':'0'}, 500, 'linear', function(){
			$('.background, .box').css('display', 'none');
		});
	});
});		
// habilitar o input ap�s o select ser selecionado , no lightbox do assunto.

$('#slcCodArea').click(function(){
	if($('#slcCodArea').val() <= 0){
		$('#txtAssuntoDesc').prop( "disabled", true );		
	}else{
		$('#txtAssuntoDesc').prop( "disabled", false);
	}
});