<html>
<head>
<title></title>


<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<style>
    body{
      background-color: #e1e6e4;
    }


  </style>
</head>
<body>


<div class="container">

    <?php include 'navabar.php'  ?>

    <?php

    include 'config.php';
    
    $ids=$_GET['idtransfer'];
    $showquery="SELECT * FROM `banksystem` WHERE ID='$ids' ";
    $showdata=mysqli_query($con,$showquery);
    if (!$showdata) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $arrdata=mysqli_fetch_array($showdata);

    ?> 
  
    <div class="mx-auto" style="width: 25rem;">
        <form method="POST" id="myForm" class="validator" novalidate>

            <!-- From account section -->
            <div class="container border">
                <div class="h4 pt-2">From Account</div>
                <div class="mb-3">
                    <label for="name-input" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name-input" name="fromname" placeholder="John" required>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">This field is mandatory</div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="fromemail" placeholder="john@example.com" required>
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
<?php
    include 'footer.php'
?>
</div>



<?php

include 'config.php';

if(isset($_POST['submit']))
{
    
  
    $Sender_name=$_POST['fromname'];
    $Sender_email=$_POST['fromemail'];
    $Sender=$_POST['amount'];
    $Receiver_name=$_POST['toname'];
    $Receiver_email=$_POST['toemail'];
     
  

    $ids=$_GET['idtransfer'];
    $senderquery="SELECT * FROM `banksystem` WHERE ID=$ids ";
    $senderdata=mysqli_query($con,$senderquery);
  
    if (!$senderdata) {
     printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $arrdata=mysqli_fetch_array($senderdata);

    //receiverquery
    $receiverquery="SELECT * FROM `banksystem` WHERE Email='$Receiver_email' ";
    $receiver_data=mysqli_query($con,$receiverquery);
   
    if (!$receiver_data) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
    $receiver_arr=mysqli_fetch_array($receiver_data);
    $id_receiver=$receiver_arr['ID'];


    if($arrdata['Amount'] >= $Sender)
    {
        $decrease_sender=$arrdata['Amount'] - $Sender;
        $increase_receiver=$receiver_arr['Amount'] + $Sender;
        $query="UPDATE `banksystem` SET `ID`=$ids,`Amount`= $decrease_sender  where `ID`=$ids ";
        $rec_query="UPDATE`banksystem` SET `ID`=$id_receiver,`Amount`= $increase_receiver where  `ID`=$id_receiver ";
        $res= mysqli_query($con,$query);
        $rec_res= mysqli_query($con,$rec_query);
        
        echo $rec_res;
        echo $res;
       if($res && $rec_res)
      {
       ?>
       <script> alert("Done!,Transaction Successful!"); </script> 
    
      <?php
      }
      else
      {
      ?>
        <script> swal("Error!", "Error Occured!", "error"); </script> 

      <?php
      
      }
    }
  

    else
    {
    ?>
    <script> swal("Insufficient Balance", "Transaction Not  Successful!", "warning"); </script> 
    <?php

    }
 
}
?>





</body>
</html>