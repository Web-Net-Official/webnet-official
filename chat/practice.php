<center>
<img src="globe.png" width="192" height="192">
</center>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=yes">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script>
function getcity(id) {
			xhr = new XMLHttpRequest();
			xhr.open('GET' , 'test.php?idd='+id, true);
			xhr.send();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status==200){
					document.getElementById("city_display").innerHTML = xhr.responseText;
					}
			
				}


}

function getEmail(emailid){

			email  = new XMLHttpRequest();
			email.open('GET' , 'test2.php?email='+emailid, true);
			email.send();
			email.onreadystatechange = function(){
				if (email.readyState == 4 && email.status == 200)
				{
					
					document.getElementById('emailDiv').innerHTML = email.responseText;
					}
				
				}
	
	
	}
	
	
	function password (pass){
	var a =	document.getElementById('pass1').value;
	//	document.write(a);
		var b = document.getElementById('pass2').value;
		if (a == b ){
			document.getElementById('cnfrmpass').innerHTML = "<font color='#00CC00'>Matched</font>";
			}
			else {
				
				document.getElementById('cnfrmpass').innerHTML = "<font color='red'>Miss matched</font>";
				}
		}

</script>

<?php
include_once('config.php');
$result = mysqli_query($conn , 'select * from country');
if(!$result){
	echo 'query failed';}
?>


<?php if( isset($_GET['logout_successfully'])){ ?><?php echo $_GET['logout_successfully']; ?>
<?php } ?>
<body background="https://www.beautycolorcode.com/dad3bc.png">
<center>
<table><tr>
<td colspan="2"><center><h1>Registeration</h1></td></tr><tr>
<form method="post" action="insert.php">
<td>Name : </td><td><input type="text" name="name" /></td></tr><tr>
<td>Email : </td><td><input type="email" name="email" onBlur="getEmail(this.value)" /></td><td><div id="emailDiv"></div></td>
</tr><tr>



<td>country : </td><td><select name="country">
<?php while($row = mysqli_fetch_assoc($result)){?>
<option value="<?php echo $row['country_id']; ?>"> <?php echo $row['country_name']; ?>
</option>

<?php } ?>
</select></td><td><div id="city_display"></div>
</td></tr><tr>

<td>Password : </td><td><input type="password" name="pass1" id="pass1"/></td></tr><tr><br />
<td>Confirm Password : </td><td><input type="password" name="pass2" id="pass2" onblur="password()" /></td><td>
<div id="cnfrmpass"></div></td></tr><tr>
<td colspan="2"><center><input type="submit" name="sbt" value="Register" /></td></table></form> <br /><br />
<?php if( isset($_GET['registeration_successfull'])){ ?><?php echo $_GET['registeration_successfull']; ?>
<?php } ?>



<form method="post" action="process.php">
<table><tr>
<td colspan="2"><center> <h1>Login</h1></td>
</tr>

<tr>
<td>
Email : </td><td><input type="text" name="email"  /></td></tr><tr>
<td> Password : </td><td><input type="password" name="password" /></td></tr>
<tr><td colspan="2"><center> <input type="submit" name="loginbtn" value="Login"  /></td></tr></table>
<?php if( isset($_GET['login_error'])){ ?><?php echo $_GET['login_error']; ?>
<?php } ?>
</form> 
</center>