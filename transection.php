<?php

require('config/db.php');
    
$query='SELECT * FROM transfer ORDER BY transfer_id';
$result=mysqli_query($conn,$query);

$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($posts);
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
    <br><br><br><br>


<div class="container">
  <h1>Transection Details</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>Transfer Id</th>
        <th>Sender Username</th>
        <th>Receiver Username</th>
		<th>Credit Amount</th>
		<th>Tansfered_at</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($rows as $row):?> 
	  <tr>
        <td><?php echo $row['transfer_id'];?></td>
        <td><?php echo $row['sender_username'];?></td>
		<td><?php echo $row['receiver_username'];?></td>
		<td><?php echo $row['credit_amount'];?></td>
		<td><?php echo $row['transfered_at'];?></td>
		
      </tr>
      
      <?php endforeach;?>
    </tbody>
  </table>
</div>      
<?php include('inc/footer.php'); ?>