
setInterval(function()
{

$.post('getimg.php',{},function(data){
	$("#newim").html(data).show();
});
},3000);

