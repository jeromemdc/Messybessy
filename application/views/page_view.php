<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Chain Selects with CodeIgniter and jQuery</title>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    
      $('#car_make').on("change", function(event) {
        var data = this.value;
        var base_url = '<?=base_url()?>';
        
        $.get( base_url + 'chainselect/models/'+data, function(resp) {
          	$('#car_model').html(resp);
        });
      });
    
    });
  </script>
  
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	
	#body{
		margin: 0 15px 0 15px;
	}
	
	#footer{
		text-align: center;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	

	<div id="body">
  
    <h3>Select your car make</h3>
    
    <select name="car_make" id="car_make">
      <option selected value="0">Select a make</option>
      <option value="bmw">BMW</option>
      <option value="tesla">Tesla</option>
      <option value="honda">Honda</option>
      <option value="lexus">Lexus</option>
    </select>
    
    <h3>Select your car model</h3>
    
    <select name="car_model" id="car_model">
      <option selected value="0">Select a model</option>
    </select>
    
	</div>
  <div id="footer">
  </div>
</div>

</body>
</html>