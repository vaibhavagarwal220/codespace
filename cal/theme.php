<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel='stylesheet' href='lib/cupertino/jquery-ui.min.css' />
<link href='fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listMonth'
			},
			<?php $date = date("Y-m-d");?>
			
			defaultDate: '<?php echo $date ; ?>',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: 
			[
			<?php
			include 'events.txt'
			?>
			]
		});
		
	});

</script>
<style>
	

	#calendar {
		max-width: 40% ;
		
		position: absolute;
		margin: 0 auto;
	}
	#cal{
		margin: 50px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;

	}

</style>
</head>
<body>
<div id="cal">
	<div id='calendar'></div>
</div>
</body>
</html>
