<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity=
    "sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">

	<title>Basic Banking System</title>

</head>

<body style="background-color: #E699FF;">
<?php
include 'navbar.php';
?>
 
   <div class="container-fluid" style="background-color: #FFFFFF;">

   	   <div class="row intro py-1">
   	   	 <div class="col-sm-12 col-md">
   	   	 	<div class="heading text-center my-5">
   	   	 		 
   	   	 		<h1>
   	   	 		<img src="bank1.jfif" width="200px" height="200px">
   	   	 		BANK OF CHENNAI
   	   	 		<img src="bank1.jfif" width="200px" height="200px">
   	   	 	    </h1>
   	   	 	</div>
   	   	 </div>
   	   	</div>
   	   </div>

   	   <br>
       <h3 class ="action"><span style="font-family: Trebuchet MS";text-align="center">Choose an action</h3></span>
   	   <div class="column activity text-center">
   	   	 <div class="col-md act">
   	   	   <br>
   	   	   <br>
           <a href="money_transfer.php"><button><h5><span style="font-family: Trebuchet MS">View all Customers</span></h5></button></a>
         </div>
         <div class="col-md act">
           <br> 
           <a href="transaction_history.php"><button><h5><span style="font-family: Trebuchet MS">Transaction History</span></h5></button></a>
           <br>
   	     </div>
   	   </div>
   </div>
   <br>
   <footer class="text-right mt-5 py-2">
   	 <p><h6 align="center">Done by <b>Jayashri<b><br>for The Sparks Foundation Project</h6></p>
   </footer>


     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>



