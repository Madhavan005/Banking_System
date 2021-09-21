<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/navbar.css"> -->

<style>
  body{
    background-color: #e1e6e4;
  }
  .nav-link .active{
    border-bottom: 6px solid #004d7a;
  }
  .py-4 {
    padding-top: 12rem!important;
    padding-bottom: 13rem!important;
}
</style>
</head>
<body>
<div class="container">
    <?php
    include 'navabar.php'
    ?>

    <div class="container ">

        <div class="jumbotron  mx-auto py-4" style="width: 70rem;">
            <h1 class="display-4 text-center">Welcome to SPARK BANK</h1>
            <hr class="my-4 mx-auto" style="width: 60rem;">
            <p class="text-center">Banks that don’t just change the business model, they change the world</p>
        </div>
    </div>


    <br>
    <br>
    <!-- Contact Section -->
    <section class="container border pt-5 bg-white" style="width: 50rem;" id="contact" >
        <div class="container headings text-center">
            <h1 class="center" style="font-weight: bold;text-align: center;">CONTACT US</h1>
            <p>We're Here To Help And Answer Any Questions You Might Have.We Look Forward To Hearing From You</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-10 offset-lg-2 offet-md-2-col col-1">
                    <form action="/action_page.php">
                        <div class="form-group">

                        <input type="text" class="form-control" placeholder="Enter name" id="username" required autocomplete="off">
                        </div><br>

                        <div class="form-group">

                        <input type="email" class="form-control" placeholder="Enter email" id="email" required autocomplete="off">
                        </div><br>

                        <div class="form-group">

                        <input type="number" class="form-control" placeholder="Enter mobile number" id="mobile" required autocomplete="off">
                        </div><br>
                        <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="4" id="comment" placeholder="Your Comments"></textarea>
                        </div><br>
                        <div class="formbutton" style="display: flex;justify-content: center;">
                        <button type="submit" class="btn btn-secondary" >Submit</button></div><br>
                    </form>
                </div>
            </div>
        </div>
    </section>
<br>
<?php
    include 'footer.php'
?>
</body>
</html>