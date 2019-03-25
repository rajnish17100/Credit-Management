<?php
session_start();
require('config/db.php');


$errors=array();

	
	$sender_username=$_SESSION['sender_username'];
	$sql="select * from user where username='$sender_username'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);


if(isset($_POST['transfer'])){
	
// receive all input values from the form	
 //$sender_user_id = mysqli_real_escape_string($conn, $_POST['sender_user_id']);
 
 $sender_username = mysqli_real_escape_string($conn, $_POST['sender_username']);
 $sender_current_credit = (int)$_POST['sender_current_credit']; 
 $receiver_username = mysqli_real_escape_string($conn, $_POST['receiver_username']);
 $transfer_credit = (int)$_POST['transfer_credit'];
  //echo("<script>alert($transfer_credit);</script>");
  
 // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  //if (empty($sender_username)) { array_push($errors, "Sender Username is required"); }
  
  if (empty($receiver_username)) { array_push($errors, "Receiver Username  is required"); }
  if (empty($transfer_credit)) { array_push($errors, "Transfer Credit  is required"); }
  
  if ($sender_username == $receiver_username) {
	array_push($errors, "Please choose correct receiver username");
  }
  
  if ($sender_current_credit < $transfer_credit) {
	array_push($errors, "Insufficient credit  available");
  }
  
  //update sender credit
  if (count($errors) == 0){
	  $sql="select * from user where username='$sender_username'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
	  
	
     // array_push($errors,$transfer_credit+500000);
	   //array_push($errors,$row['current_credit']-50);
	 
      $current_credit=$row['current_credit'] - $transfer_credit ;	  
     //array_push($errors,$current_credit-50);
	 
      $sql="update user set current_credit='$current_credit' where username='$sender_username'";
      $result=mysqli_query($conn,$sql);
	  
	}
  
  //update receiver credit
  if (count($errors) == 0){
	  $sql="select * from user where username='$receiver_username'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);	
      $current_credit= (int)$row['current_credit'] + $transfer_credit;	  
     
	 
      $sql="update user set current_credit='$current_credit' where username='$receiver_username'";
      $result=mysqli_query($conn,$sql);
    
	
	$sql="insert into transfer(sender_username,receiver_username,credit_amount) values('$sender_username','$receiver_username','$transfer_credit')";
	$result=mysqli_query($conn,$sql);
	
	session_destroy();
  	unset($_SESSION['sender_username']);
	header("location:index.php"); 	  
  } 
  
    
  
}

   
?>


<!DOCTYPE html>
<html>
<head>
  <title>Credit Management</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Credit Transfer</h2>
  </div>
	
  <form method="post" action="server.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group" >
  	  <label>Sender username</label>
	   <input type="text" name="sender_username" value="<?php echo($_SESSION['sender_username']);?>">
	</div>
	
	<div class="input-group">
  	  <label>Sender Current Credit</label>
	   <input type="number" name="sender_current_credit" value="<?php echo($row['current_credit']);?>">
	</div>
	
	
	<div class="input-group">
	<label>Receiver username</label>
		 <select type="text" name="receiver_username" >
			  <option value="ravi17101">ravi17101</option>
			  <option value="rajnish17100">rajnish17100</option>
			  <option value="gautam">gautam</option>
			  <option value="shivendra17101">shivendra17101</option>
			  <option value="shivam17100">shivam17100</option>
			  <option value="sheelendra17101">sheelendra17101</option>
			  <option value="rohit17100">rohit17100</option>
			  <option value="akella17100">akella17100</option>
			  <option value="amardeep17100">amardeep17100</option>
			  <option value="bhuneshwar17100">bhuneshwar17100</option>
					
		 </select>
  	</div>
	
  	<div class="input-group">
  	  <label>Transfer Credit</label>
  	  <input type="number" name="transfer_credit" min='0' max='50000'>
  	</div>
  	
  	<div class="input-group">
	 
  	  <button type="submit" class="btn" name="transfer">Transfer</button>
  	</div>
  	<p>Go To<a href="index.php">Home</a>Page</p>
  </form>
</body>
</html>