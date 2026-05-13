/*$('document').ready(function(){
				$('#prom').hide();
			$('porc').hide();
			$('#conv').hide();
				$('#porc').hide();
			$('#foraneo').hide();
			$('#locali').hide();
			$('#beca').on('change', function(){
				var valor = $(this).val();
		if(valor == '1'){
					$('#prom').hide();
					$('#porc').hide();
					$('#conv').hide();
					$('#foraneo').hide();
				
					$('#locali').hide();          
		}
		if(valor == '2'){
					$('#prom').show();
					$('#conv').hide();
					$('#porc').hide();
					$('#foraneo').hide();
				
					$('#locali').hide();
				}
				else if(valor == '3'){
					$('#prom').hide();
					$('#conv').show();
					$('#porc').hide();
					$('#foraneo').hide();
			
					$('#locali').hide();
				}
				else if(valor == '4'){
					$('#prom').hide();
					$('#conv').hide();
					$('#porc').hide();
					$('#foraneo').show();
				
					$('#locali').show();
				}if(valor == '5'){
					$('#prom').hide();
					$('#conv').hide();
					$('#porc').hide();
					$('#foraneo').hide();
	
					$('#locali').hide();
				}
				$('#prom').on('change', function(){
	    
					if($(this).val() == '1'){
					  $('#porc').hide();
					}
					else{
					  $('#porc').show();
					  $('#porc').prop('disabled', true);
					} 
				  });
			});
		});/*/

$(function () {
	$('#beca').on('change', function () {
		var beca = $(this).val();
		switch (beca) {
			case "1":
				$("#prom").hide();
				$("#porc").hide();
				$("#conv").hide();
				$('#otraDep').hide();
				$("#foraneo").hide();
				$("#locali").hide();
				$("#porc2").hide();
				break;

			case "2":
				$("#prom").show();
				$("#porc").show();
				$("#conv").hide();
				$('#otraDep').hide();
				$("#foraneo").hide();
				$("#locali").hide();
				$("#porc2").hide();
				break;

			case "3":
				$("#prom").hide();
				$("#porc").hide();
				$("#conv").show();
				$('#otraDep').show();
				$("#foraneo").hide();
				$("#locali").hide();
				$("#porc2").show();
				break;

			case "4":
				$("#prom").hide();
				$("#porc").hide();
				$("#conv").hide();
				$('#otraDep').hide();
				$("#foraneo").show();
				$("#locali").show();
				$("#porc2").show();
				break;

			case "5":
				$("#prom").hide();
				$("#porc").hide();
				$("#conv").hide();
				$('#otraDep').hide();
				$("#foraneo").hide();
				$("#locali").hide();
				break;

			case "6":
				$("#prom").hide();
				$("#porc").hide();
				$("#conv").hide();
				$('#otraDep').hide();
				$("#foraneo").hide();
				$("#locali").hide();
				break;

		}
	}).change();
});








/*$(function(){
	$('#convenios').change(function(){
		if($('this').val()=="1"){
			$('#depGob').prop('disabled', fasle);
			$('#depGob').show();
		}else{
			$('#depGob').prop('disabled', true);
			$('#depGob').hide();
		}
	});
});*/