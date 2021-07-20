<?php
include 'config.php';     

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers_details where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers_details where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);
 
    if (($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo ' alert("Negative values cannot be transferred")';
        echo '</script>';
    }

    else if($amount > $sql1['Balance']) 
    {
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")'; 
        echo '</script>';
    }
     
    else if($amount == 0)
    {
         echo "<script type='text/javascript'>";
         echo "alert('Zero value cannot be transferred')";
         echo "</script>";
    }

    else 
    {
            // deducting amount from sender's account    
            $newbalance = $sql1['Balance'] - $amount;
            $sql = "UPDATE customers_details set balance=$newbalance where id=$from";
            mysqli_query($con,$sql);

            // adding amount to payee's account
            $newbalance = $sql2['Balance'] + $amount;
            $sql = "UPDATE customers_details set balance=$newbalance where id=$to";
            mysqli_query($con,$sql);
                
            $sender = $sql1['Name'];
            $receiver = $sql2['Name'];
            $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
            $query=mysqli_query($con,$sql);

            if($query)
            {
                 echo "<script> alert('Transaction Successful');
                                 window.location='transaction_history.php';
                       </script>";  
            }

            $newbalance= 0;
            $amount =0;
        }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #FF33FF;
		}
	    button:hover{
			background-color:#800060;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body style="background-color: #E699FF">
 
<?php
  include 'navbar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4" style="color:#730099">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers_details where id=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">E_mailid</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['ID'] ?></td>
                    <td class="py-2"><?php echo $rows['Name'] ?></td>
                    <td class="py-2"><?php echo $rows['E_mailid'] ?></td>
                    <td class="py-2"><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label>Transfer To:</label>
        <select name = "to" class="form-control" required>
            <option value = "" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid = $_GET['id'];
                $sql = "SELECT * FROM customers_details where id!=$sid";
                $result=mysqli_query($con,$sql);
                if(!$result)                          # If none selected
                {
                    echo "Error ".$sql."<br>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
    <footer class="text-center mt-5 py-2">
        <p>Done by<b>Jayashri for The Sparks Foundation Project</b></p>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>