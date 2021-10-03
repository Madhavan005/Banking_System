<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tablestyle.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

      
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>

<div class="container">

   
<?php
        include 'navabar.php'
    ?>
   <table class="table">
     <thead>
     	<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Amount</th>
			<th>Operation</th>
     	</tr>
     </thead>

     <tbody>
        
        <?php
            include "config.php";
            $selectquery = " select * from banksystem";
            $query = mysqli_query($con,$selectquery);
            $numofrows = mysqli_num_rows($query);
            
            while($res = mysqli_fetch_array($query))
            {
                ?>
                    <tr>
                        <td data-label="ID"><?php  echo $res['ID']; ?></td>
                        <td data-label="Name"><?php  echo $res['Name']; ?></td>
                        <td data-label="Email"><?php  echo $res['Email']; ?></td>
                        <td data-label="Amount"><?php  echo $res['Amount']; ?></td>
                        <td data-label=" ">
                        <a href="transfer.php?idtransfer=<?php  echo $res['ID']; ?>" class="text-white btn btn-secondary " style="text-decoration: none" >Transfer Money</a>
                        </td>
                    </tr>
                <?php
            }
        ?>

     </tbody>
   </table>

</div>
</body>
</html>