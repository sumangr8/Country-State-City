<?php  
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="popper.min.js"></script>
</head>
<body>
<div class="container">
	<div class="col-xl-6">
		<form id="insert_form">
			<div class="form-group">
				<label>Country : </label>
				<select name="country" id="country" class="form-control">
					<?php
					$qry=mysqli_query($con,"select * from country");
					while($row=mysqli_fetch_array($qry))
					{
						extract($row);
					?>
					<option value="<?php echo $id; ?>"><?php echo $country_name; ?></option>
					<?php
					}
					?>
				</select>
			</div>

			<!-- for state -->
			<div class="form-group">
				<label>State : </label>
				<select name="state" id="state" class="form-control">
					<option>Select Any</option>
				</select>
			</div>

			<!-- for city -->
			<div class="form-group">
				<label>City : </label>
				<select name="city" id="city" class="form-control">
					<option>Any Select</option>
				</select>
			</div>

			<input type="submit" name="submit" value="submit" id="insert" class="btn btn-info">
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// for fetch state
		// $("#country").change(function(){
		// 	var country_id=$(this).val();
		// 	$.ajax({
		// 		url : 'state.php',
		// 		type : 'post',
		// 		data : {country_id : country_id},
		// 		success:function(data)
		// 		{
		// 			$("#state").html(data);
		// 			// console.log(data);
		// 		}
		// 	});
		// });


		$(document).on("change","#country",function(){
			var country_id=$(this).val();
			$.ajax({
				url : 'state.php',
				type : 'post',
				data : {country_id : country_id},
				success:function(data)
				{
					$("#state").html(data);
					// console.log(data);
				}
			});
		});


		// for city
		$("#state").change(function(){
			var state_id=$(this).val();
			$.ajax({
				url : 'city.php',
				type: 'post',
				data: {state_id : state_id},
				success:function(data)
				{
					$("#city").html(data);
				}
			});
		});


		//for submit
		$("#insert_form").on("submit",function(e){
			e.preventDefault();
			var country=$("#country").val();
			var state=$("#state").val();
			var city=$("#city").val();
			
		});
	});
</script>
</body>
</html>