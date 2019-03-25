<?php 
session_start();
require('config/db.php');

if(isset($_GET['id'])){
	
	$id=$_GET['id'];
	$sql="select * from user where user_id='$id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$_SESSION['sender_username']=$row['username'];
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">User Profile</h2>

<div class="card">
  <br><br>
  <form method="post" action="server.php">
  <h3>Username: <?php echo($row['username']);?></h3>
  <input type="hidden" name="username" value="<?php echo($row['username']);?>">
  <h3>FirstName: <?php echo($row['firstname']);?></h3>
  <h3>LastName: <?php echo($row['lastname']);?></h3>
  <h3>Email: <?php echo($row['email']);?></h3>
  <h3>Current Credit: <?php echo($row['current_credit']);?></h3>
  <button type="submit" value="transfer_credit">Transfer Credit</button>
  <p>Go to <a href="index.php">Home</a> Page</p>
  </form>
  
  
</div>

</body>
</html>