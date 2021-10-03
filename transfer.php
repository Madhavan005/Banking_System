<html>
<head>
<title></title>


    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- jQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- SweetAlert2 cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>


<div class="container">

    <?php include 'navabar.php';  ?>

    <?php

    include 'config.php';
    
    $ids=$_GET['idtransfer'];
    $showquery="SELECT * FROM `banksystem` WHERE ID='$ids' ";
    $showdata=mysqli_query($con, $showquery);
    if (!$showdata) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $arrdata=mysqli_fetch_array($showdata);

    ?> 
  
    <div class="mx-auto" style="width: 25rem;">
        <form method="POST" id="myForm" class="was-validated"  >

            <!-- From account section -->
            <div class="container border">
                <div class="h4 pt-2">From Account</div>
                <div class="mb-3">
                    <label for="name-input" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name-input" name="fromname" placeholder="John"  required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">This field is mandatory</div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="fromemail" placeholder="john@example.com"  required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Enter vaild email</div>
                </div>
            </div>

            <br>

            <!-- To account section -->
            <div class="container border">
                <div class="h4 pt-2">To Account</div>
                <div class="mb-3">
                    <label for="name-input" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name-input" name="toname" placeholder="John" 
                    value = "<?php echo $arrdata['Name']; ?>" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">This field is mandatory</div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="toemail" placeholder="john@example.com" 
                    value="<?php echo $arrdata['Email']; ?>" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Enter vaild email</div>
                </div>

                <div class="input-group mb-3">
                    <!-- <label for="amountinput" class="form-label">Amount</label> -->
                    <span class="input-group-text">₹</span>
                    <input type="number" min="0.01" step="0.01" max="1000000000" class="form-control" id="amountinput" name="amount" aria-label="Amount" required>
                    <span class="input-group-text">.00</span>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Enter valid amount</div>
                </div>

            </div>

            <div class="button">
            <button type="submit" name="submit"  class="btn btn-primary mt-3">Send</button>
            <!-- <button onclick="myFunction() class="btn btn-primary mt-3">Send</button> -->
            </div>
        </form>
        
    </div>

<br>
<br>
</div>



<?php

include 'config.php';

if( isset($_POST['submit']) )
{
    // echo $_SERVER['REQUEST_METHOD'];

    $from_name = $_POST["fromname"];
    $from_email = $_POST["fromemail"]; 
    $amount = (float)$_POST["amount"];
    $to_name = $_POST["toname"];
    $to_email = $_POST["toemail"];


    
    // echo "<h3>Form details</h3>";
    // echo "From = ".$from_name;
    // echo "<br> From email = ".$from_email;
    // echo "<br> To = ".$to_name;
    // echo "<br> To email = ".$to_email;
    // echo "<br> Amount = ".$amount;


    $sql_from_query = "SELECT * FROM `banksystem` WHERE Email='$from_email'";
    $sql_to_query = "SELECT * FROM `banksystem` WHERE Email='$to_email'";
    
    $from_result = $con->query($sql_from_query);
    $to_result = $con->query($sql_to_query);

    // echo "<h3>SQL fetch</h3>";

    // echo "<br> res ".is_null($from_data);    
    // echo "<br> from= ".$from_data['Name'];
    // echo "<br> to= ".$to_data['Name'];


    if ( $from_result->num_rows > 0 && $to_result->num_rows > 0 ) {
        
        $from_data = $from_result->fetch_assoc();
        $to_data = $to_result->fetch_assoc();

        $from_id = (int)$from_data['ID'];
        $to_id = (int)$to_data['ID'];

        if ($from_data['Amount'] > $amount){
            
            $from_amt = $from_data['Amount'] - $amount;
            $to_amt = $to_data['Amount'] + $amount;
            $update_from = "UPDATE `banksystem` SET Amount=$from_amt WHERE id=$from_id";
            $update_to = "UPDATE `banksystem` SET Amount=$to_amt WHERE id=$to_id";   
        }
        else{

            ?>

                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Insufficient Balance in Account!',
                    })
                </script>

            <?php
        }
    
    
    }
    else{
        ?>

            <script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data not Found!',
                })
            </script>
        <?php
    }


}


    // $update_q = "UPDATE test_data SET amount=$sum WHERE id=$id";
    if (mysqli_query($con, $update_from) && mysqli_query($con, $update_to) ) {
        $DateTime = date("Y-m-d H:i:s");

        $fname = $from_data['Name'];
        $tname = $to_data['Name'];

        $insert_from_q = "INSERT INTO `transactionhistory`(`Date`, `Name`, `Debit`, `Credit`, `Balance`) VALUES ('$DateTime','$fname' , 0 , '$amount' , $from_amt)"; 
        $insert_to_q = "INSERT INTO `transactionhistory`(`Date`, `Name`, `Debit`, `Credit`, `Balance`) VALUES ('$DateTime', '$tname', $amount, 0 , $to_amt)"; 
        
        if (mysqli_query($con, $insert_from_q) && mysqli_query($con, $insert_to_q)){
            $sort_query = "SELECT * FROM `transactionhistory` ORDER BY UNIX_TIMESTAMP(Date) DESC";
            ?>
                <script>
                    document.getElementById("myForm").reset();

                    Swal.fire(
                    'Transaction success',
                    '',
                    'success'
                    )
                    
                </script>
            <?php
        }


        

        }
    else {
        echo "Error updating record: " . mysqli_error($con);
      }    

?>


<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


</body>


</html>
