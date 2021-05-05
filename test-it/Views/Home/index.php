<?php
    //set session
    if (!isset($_SESSION)) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- extra head elements here -->
        <title>Home</title>
        <link href="/Public/css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <div class="home-content" action="/">
            <img class="mb-4" src="/Public/images/user-pp.png" alt="" width="72" height="72">

            <!-- show logged in user and last access date -->
            <h1 class="h3 mb-3 font-weight-normal">Welcome back <?php echo $_SESSION['userName']?></h1> 
            <h1 class="h5 font-weight-light">Last access : <?php echo $_SESSION['lastLogin']?></h1>

            <!-- Sign out and get back to main page -->
            <button class="btn btn-lg btn-primary btn-block mt-5" onclick="window.location='/index/logout'">Sign out</button>

            <p class="mt-5 mb-3 text-muted">&copy; Curtis Moxebo</p>
        </div>
    </body>
</html>