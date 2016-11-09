$(document).ready(function(){
	$('#term').keyup(function(){
		var sterm=$('#term').val();
		$.post('search.php',{
		sterm:sterm			
		},function(data){
			$('#data1').html(data);
		});		

		$.post('sq.php',{
		sterm:sterm			
		},function(dataq){
			$('#data2').html(dataq);
		});
});
});
