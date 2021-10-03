<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Bank</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Google Fonts
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cantarell&display=swap" rel="stylesheet"> -->
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <?php
            include 'navabar.php'
        ?>
    </header>

    <div class="container">

        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <div class="jumbotron">
                <h1 class="display-4 text-center">Welcome to SPARK BANK</h1>
                <hr class="my-4 mx-auto">
                <p class="text-center">Banks that don’t just change the business model, they change the world</p>
            </div>
        </div>


        <br>
        <br>

        <!-- Contact Section -->
        <section class="container contact col-md-12 text-center text-md-left p-2 border pt-5 bg-white" id="contact" >
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

                            <!-- <div class="form-group">
                            <input type="number" class="form-control" placeholder="Enter mobile number" id="mobile" required autocomplete="off">
                            </div><br> -->

                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" rows="4" id="comment" placeholder="Your Comments"></textarea>
                            </div><br>
                            
                            <div class="formbutton" style="display: flex;justify-content: center;">
                                <button type="submit" class="btn btn-secondary" >Submit</button>
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <br>

        <?php
include 'footer.php'
?>

    </div>
 
</body>
</html>


<!-- 

epiz_29869938_BankDB	epiz_29869938	(Your vPanel Password)	sql201.epizy.com
 -->