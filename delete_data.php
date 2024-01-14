<?php include 'connection.php';
$id=$_GET['id'];
$select="DELETE FROM expenses WHERE id='$id'";
$data=mysqli_query($con,$select);
if($data){
    ?>
    <script type="text/javascript">
    alert("Data Deleted Sucessfully");
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
?>
