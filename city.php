<?php
include("db.php");
$state_id=$_POST["state_id"];
$qry=mysqli_query($con,"select * from city where state_id='$state_id'");
while($row=mysqli_fetch_array($qry))
{
	extract($row);
?>
<option value="<?php echo $id ?>"><?php echo $city_name; ?></option>
<?php
}

?>