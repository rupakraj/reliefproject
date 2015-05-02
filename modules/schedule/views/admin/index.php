<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo "Schedule" ?></h1>
	</section>

	<!-- Main content -->
	<section class="content">
    <link href='<?php echo base_url()?>assets/css/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo base_url()?>assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='<?php echo base_url()?>assets/lib/moment.min.js'></script>
    <script src='<?php echo base_url()?>assets/lib/jquery.min.js'></script>
    <script src='<?php echo base_url()?>assets/js/fullcalendar.min.js'></script>
    <script>
    
    $(document).ready(function() { 
        var d = new Date();          
        var month = d.getMonth()+1;
        var date = d.getDate();
        var totalDate = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (date<10 ? '0' : '') + date;
    	$('#calendar').fullCalendar({
    		defaultDate: totalDate.toString(),
    		editable: false,
    		eventLimit: true, // allow "more" link when too many events
    		events: [
    			{
    				title: 'All Day Event',
    				start: '2015-05-01'
    			},
    			{
    				title: 'Long Event',
    				start: '2015-05-07',
    				end: '2015-05-10'
    			},
    			{
    				id: 999,
    				title: 'Repeating Event',
    				start: '2015-05-09T16:00:00'
    			},
    			{
    				id: 999,
    				title: 'Repeating Event',
    				start: '2015-05-16T16:00:00'
    			},
    			{
    				title: 'Conference',
    				start: '2015-05-11',
    				end: '2015-05-13'
    			},
    			{
    				title: 'Meeting',
    				start: '2015-05-12T10:30:00',
    				end: '2015-05-12T12:30:00'
    			},
    			{
    				title: 'Lunch',
    				start: '2015-05-12T12:00:00'
    			},
    			{
    				title: 'Meeting',
    				start: '2015-05-12T14:30:00'
    			},
    			{
    				title: 'Happy Hour',
    				start: '2015-05-12T17:30:00'
    			},
    			{
    				title: 'Dinner',
    				start: '2015-05-12T20:00:00'
    			},
    			{
    				title: 'Birthday Party',
    				start: '2015-05-13T07:00:00'
    			},
    			{
    				title: 'Click for Google',
    				url: 'http://google.com/',
    				start: '2015-05-28',
                    color: 'red',
                    textColor: 'white',
                    allDay: false
    			}
    		]
    	});
    	
    });
    
    </script>
    <style>
    
    body {
    	margin: 40px 10px;
    	padding: 0;
    	font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    	font-size: 14px;
    }
    
    #calendar {
    	max-width: 900px;
    	margin: 0 auto;
    }
    
    </style>
    
	<div id="calendar"></div>

	</section><!-- /.content -->
</aside><!-- /.right-side -->