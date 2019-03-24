<?php

require('config/db.php');
    
$query='SELECT * FROM user ORDER BY user_id';
$result=mysqli_query($conn,$query);

$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($posts);
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
    <br><br><br><br>


<div class="container">
  <h1>User Details</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>User Id</th>
        <th>Username</th>
        <th>FirstName</th>
		<th>LastName</th>
		<th>Email</th>
		<th>Current Credit</th>
		<th>operation</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($rows as $row):?> 
	  <tr>
        <td><?php echo $row['user_id'];?></td>
        <td><?php echo $row['username'];?></td>
		<td><?php echo $row['firstname'];?></td>
		<td><?php echo $row['lastname'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['current_credit'];?></td>
		<td><a href="transfer.php">Transfer credit</a></td>
      </tr>
      
      <?php endforeach;?>
    </tbody>
  </table>
</div>      
<?php include('inc/footer.php'); ?>
