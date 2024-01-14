<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>  
<head>  
    <title>Daily Expense Tracker</title>  
    <link rel = "stylesheet" type = "text/css" href = "style.css">  
<link rel = "icon" type = "image/x-icon" href = "images/expenses.png"> 
</head>  
<body>  
<div id ="body1">
 
    <h1 align="center">Group No - 15 Micro-Project</h1>
  
    <div id = "frm">  
        <h1 align="center">Add Expense</h1>  
       <div>
<form name="myForm" action="" method="POST" onsubmit="return validateForm()">

 <label for="date">Enter the Date :</label>
  <input type="date" id="date" name="date" required /><br> <br>

<label for="item">Enter the Item :</label>
  <input type="text"  name="item" placeholder="ITEMS" required /><br> <br>


<label for="amount">Enter the Amount:</label>
  <input type="number"  name="amount" placeholder="AMOUNT" required  /><br> <br>

 <input type="submit"  name="save_btn"  value="Submit" >
<button> <a href="view_expenses.php" >VIEW </a> </button>
<button > <a href="navigation.html" >HOME </a> </button>
</form>
</div>

<?php

if(isset($_POST['save_btn'])){
   $date=$_POST['date'];
   $item=$_POST['item'];  
   $amount=$_POST['amount'];

    $query="INSERT INTO expenses(date,item,amount) VALUES('$date','$item','$amount')";
    $data=mysqli_query($con,$query);

  if($data){
    ?>
    <script type="text/javascript">
    alert("Data Saved Sucessfully");
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
   
       
    </div>  
  </div>
</div>
   
</body>     
</html>