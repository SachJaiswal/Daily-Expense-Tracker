<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "style.css">  
    <link rel = "icon" type = "image/x-icon" href = "images/expenses.png">
</head>
<body>
<h1 align="center">Daily Expense Tracker</h1> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>SEARCH THE EXPENSE FORM DATE TO DATE</h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> 
                                      <button type="submit" >Filter</button><br><br>
                                      <label>Back To Home</label> 
                                      <button > <a href="navigation.html">HOME </a> </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ITEMS</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM expenses WHERE date BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['item']; ?></td>
                                                <td><?= $row['amount']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                            <?php
                         $totalsexp=0;
                         
                         if(isset($_GET['from_date']) && isset($_GET['to_date']))
                         {
                             $from_date = $_GET['from_date'];
                             $to_date = $_GET['to_date'];

                            $ret=mysqli_query($con,"SELECT date,SUM(amount) as totaldaily FROM `expenses`  where (date BETWEEN '$from_date' and '$to_date')  group by date");
                            $cnt=1;
                           while ($row=mysqli_fetch_array($ret)) {
 
                           ?>
                          <tr>
                           <td><?php echo $cnt;?></td>
                         <td><?php  echo $row['date'];?></td>
                         <td><?php  echo $ttlsl=$row['totaldaily'];?></td>
                         </tr>
                         <?php
                $totalsexp+=$ttlsl; 
                $cnt=$cnt+1;
                }}?>

 <tr>
  <th colspan="2" style="text-align:center">Grand Total</th>     
  <td><b><?php echo $totalsexp;?></b></td>
 </tr>     

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>