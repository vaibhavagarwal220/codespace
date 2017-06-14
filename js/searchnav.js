$(document).ready(function(){
	$('#sample-input').keyup(function(){
		var sterm=$('#sample-input').val();
		$.post('search.php',{
		sterm:sterm			
		},function(data){
			$('#out1').html(data);
		});		

		$.post('sq.php',{
		sterm:sterm			
		},function(dataq){
			$('#out2').html(dataq);
		});
});
});
