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
        
        $.get( base_url + 'chaincheckbox/models/'+data, function(resp) {
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
      <option value="1">FastFood</option>
      <option value="2">Restaurant</option>
      <option value="3">Hotels</option>
      <option value="4">Bakeshop</option>
      <option value="5">Caterers</option>
      <option value="6">Commissaries</option>
      <option value="7">Specialty Store</option>
      <option value="8">Manufacturing</option>
    </select>
    
    <h3>Select your car model</h3>
    
    <!-- <select name="car_model" id="car_model">
      <option selected value="0">Select a model</option>
    </select> -->

    <div id="car_model"><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="1">Filipino</label><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="2">Chinese</label><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="3">Japanese</label><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="4">American</label><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="5">Korean</label><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="6">European</label><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="7">Asean</label><label class="checkbox-inline"><input type="checkbox" name="classification[]" value="8">Asian and Western</label></div>
    
	</div>
  <div id="footer">
  </div>
</div>

</body>
</html>