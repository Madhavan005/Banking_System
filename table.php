<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Tables using LI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="tablestyle.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Job Id</div>
      <div class="col col-2">Customer Name</div>
      <div class="col col-3">Amount Due</div>
      <div class="col col-4">Payment Status</div>
      <div class="col col-5">Operation</div>
    </li>

    <?php
  include "config.php";
  $selectquery = " select * from banksystem";
  $query = mysqli_query($con,$selectquery);
  $numofrows = mysqli_num_rows($query);


  
  while($res = mysqli_fetch_array($query))
  {
    ?>

      <li class="table-row">
        <div class="col col-01 test" data-label="Job Id" ><?php  echo $res['ID']; ?></div>
        <div class="col col-02 test" data-label="Customer Name"><?php echo $res['Name']; ?></div>
        <div class="col col-03 test" data-label="Email"><?php echo $res['Email']; ?></div>
        <div class="col col-04 test" data-label="Amount"><?php echo $res['Amount']; ?></div>
        <div class="col col-05 test" data-label="">
          <a href="transfer.php?idtransfer=<?php  echo $res['ID']; ?>" class="text-white btn btn-secondary " style="text-decoration: none" >Transfer Money</a>
        </div>
      </li>
      <?php
  }
  ?>
  </ul>
</div>
<!-- partial -->
  
</body>
</html>
