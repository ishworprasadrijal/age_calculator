<html>
<head>
	<title>Nepali Calendar</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

  	<script type="text/javascript" src="nepali.datepicker.v2.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="nepali.datepicker.v2.2.min.css" />

</head>
<body>
	<div class="container">
		<h3>Age Calculator [Enter Birth Date in BS ] </h3>
		<input type="text" id="dob" class="nepali-calendar form-control" value="2075-12-18"/>
		<div class="age"></div>
	</div>

</body>
</html>
<script>
	$(document).ready(function(){
		convert_to_english($('.nepali-calendar').val());
	})
	$('.nepali-calendar').nepaliDatePicker({ format: 'yyyy-mm-dd',changeMonth: true ,onChange: function(){
        convert_to_english($('.nepali-calendar').val());
    }});
	$(document).on('change','#dob',function(){
		convert_to_english($('.nepali-calendar').val());
	});
	function convert_to_english(nepali){
		console.log(nepali);
		$.ajax({
			url : 'server.php',
			type:'POST',
			dataType:'json',
			data:{nepali:nepali},
			success:function(response){
				console.log(response);
				$(document).find('.age').html("<div class='alert alert-success'> Eng Date : "+response.date+" & Age Y: "+ response.age.y+" M:"+response.age.m+" D:"+ response.age.d+"</div>");
			}
		})		
	}
</script>