<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E-Learning : Add Assignment</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>

<div id="top">
	<div id="inner_top">
			<img src="images/logo_dktes.gif"/>
	</div>
</div>

<div id="line">
</div>

<?php include ('includes\faculty_main_menu.php'); ?>

<div id="mid">
	<img src="images/Ichalkarnji.jpg"/>
</div>

<div id="text">
	<b>Add Assignment</b>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="a_add.php" method="post">
	<table>
		<tr>
			<td>Branch: </td>
			<td>
			<select name="branch">
				<?php
					include "dbconnection.php";
					$query = "SELECT * FROM department";
					$result =  $con->query($query) or die();
					while($row = $result->fetch_array())
					{
						echo '<option>'.$row['branch'] .'</option>';
					}
				?>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>Class: </td>
			<td>
			<select name="class">
				<option>
					FE
				</option>
				<option>
					SE
				</option>
				<option>
					TE
				</option>
				<option>
					BE
				</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>Subject: </td>
			<td><input type="text" name="subject" size="50" /></td>
		</tr>
		<tr>
			<td>Assignment: </td>
			<td><textarea name="assignment" rows="4" cols="38"></textarea></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" name="submit" value="Add">
			</td>
		</tr>
	</table>
	</form>
</div>

<?php
	include "dbconnection.php";
	if($_POST)
	{
		if((!empty($_POST['class'])) && (!empty($_POST['branch'])) && (!empty($_POST['subject'])) && (!empty($_POST['assignment'])))
		{
			$query = "INSERT INTO assignment VALUES ('$_POST[branch]', '$_POST[class]', '$_POST[subject]', '$_POST[assignment]')";
			$con->query($query) or die();
			echo '<html><head><script type="text/javascript">alert("Record saved successfully.");</script></head></html>';
		}
	}
	$con->close();
?>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>
