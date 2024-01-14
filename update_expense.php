<?php include 'connection.php';
$id=$_GET['id'];
$select="SELECT * FROM expenses WHERE id='$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div>
<form action="" method="POST">

 <label for="date">Enter the Date :</label>
  <input value="<?php  echo $row['date']?>"type="date" id="date" name="date"><br> <br>

<label for="item">Enter the Item :</label>
  <input value="<?php  echo $row['item']?>"  type="text"  name="item" placeholder="ITEMS" ><br> <br>


 

<label for="amount">Enter the Amount:</label>
  <input value="<?php  echo $row['amount']?>" type="number"  name="amount" placeholder="AMOUNT" ><br> <br>

 <input type="submit"  name="update_btn" value="Update" >
<button> <a href="view_expenses.php">BACK </a> </button>
</form>
</div>
<?php

if(isset($_POST['update_btn'])){
   $date=$_POST['date'];
   $item=$_POST['item'];  
   $amount=$_POST['amount'];
   
    $update="UPDATE expenses SET date='$date',item='$item',amount='$amount' WHERE id='$id'";
    $data=mysqli_query($con,$update);
if($data){
?>
<script type="text/javascript">
alert("Data Updated Sucessfully");
window.open("http://localhost/MP/view_expenses.php","_self");
</script>
<?php
}
else{
?>
<script type="text/javascript">
alert("Please try Again !! ");
</script>
<?php

}
    
}
?>
</body>
</html>
