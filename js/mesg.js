
setInterval(function()
{
var un=$('#un').val();
$.post('getmsg.php',{un:un},function(data){
	$("#messages").html(data).show();
});
},1000);


$('#sendbtn').click(function()
{
var un=$('#un').val();
var con=$('#msgc').val();
$('#msgc').val('');
$.post('sendmsg.php',{un:un,con:con},function(data){
	$.post('getmsg.php',{un:un},function(data){
	$("#messages").html(data).show();
	var wtf    = $('#messages');
    var height = wtf[0].scrollHeight;
    wtf.scrollTop(height);
	});
	$("#msgfb").hide().html(data).show();
		
});
});

$(document).keypress(function(e) {
    if(e.which == 13) 
    {
        var un=$('#un').val();
		var con=$('#msgc').val();
				$('#msgc').val('');

		$.post('sendmsg.php',{un:un,con:con},function(data)
		{
			$.post('getmsg.php',{un:un},function(data)
			{
				$("#messages").html(data).show();
				var wtf    = $('#messages');
    			var height = wtf[0].scrollHeight;
    			wtf.scrollTop(height);
			});
			$("#msgfb").hide().html(data).show();
		});
	}
});


