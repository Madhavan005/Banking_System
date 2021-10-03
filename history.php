<!DOCTYPE html>
<html>
<head>
    <title>Transaction history</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/historystyle.css"/>
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
			<th>Date & Time</th>
			<th>Name</th>
			<th>Debit</th>
			<th>Credit</th>
			<th>Balance</th>
     	</tr>
     </thead>

     <tbody>
        
        <?php
            include "config.php";
            $selectquery = "SELECT * FROM `transactionhistory` ORDER BY UNIX_TIMESTAMP(Date) DESC";
            $query = mysqli_query($con,$selectquery);
            $numofrows = mysqli_num_rows($query);
            
            while($res = mysqli_fetch_array($query))
            {
                ?>
                    <tr>
                        <td data-label="Date"><?php  echo $res['Date']; ?></td>
                        <td data-label="Name"><?php  echo $res['Name']; ?></td>
                        <td data-label="Debit" class="text-success" ><?php if($res['Debit'] == 0){echo "-"; } else{echo $res['Debit'];}?></td>
                        <td data-label="Credit" class="text-danger" ><?php if($res['Credit'] == 0){echo "-"; } else{echo $res['Credit'];}?></td>
                        <td data-label="Balance"><?php  echo $res['Balance']; ?></td>
                    </tr>
                <?php
            }
        ?>

     </tbody>
   </table>


</div>
</body>
</html>