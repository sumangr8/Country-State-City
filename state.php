<?php
include("db.php");
$output="";
$country_id=$_POST["country_id"];
$qry=mysqli_query($con,"select * from state where country_id='$country_id'");
while($row=mysqli_fetch_array($qry))
{
	extract($row);
?>
<option value="<?php echo $id ?>"><?php echo $state_name; ?></option>
<?php
}
?>