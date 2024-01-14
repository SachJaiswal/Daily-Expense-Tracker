<?php include 'connection.php'; ?>
<a href="navigation.html"> HOME </a>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Daily Expense Tracker</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css"> 
</head>
<body>


<table  border="1px" cellpadding="10px" cellspacing="0px">
    <tr>
        <th> DATE </th>
        <th> ITEM </th>
        <th> AMOUNT</th>
        <th colspan="2">Action </th>
    </tr>
    <?php
    $query ="SELECT * FROM expenses";
    $data=mysqli_query($con,$query);
    $result=mysqli_num_rows($data);
    if($result){
        while($row=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td> <?php echo $row["date"];?>  </td>
                <td> <?php echo $row["item"];?>  </td>
                <td> <?php echo $row["amount"];?>  </td>
                <td><a href="update_expense.php?id=<?php echo $row["id"];?>">Edit</a>   </td>

                <td><a onclick="return confirm ('Are you sure you want to delete ? ')" href="delete_data.php?id=<?php echo $row["id"];?>">Delete</a>   </td>

            </tr>    
            <?php
        }
    }
    else{
    ?>
    <tr>
     <td>NO Record Found</td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>