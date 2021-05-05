<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- extra head elements here -->
        <title>Login Form</title>
        <link href="/Public/css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <!-- Login form with user field, password field and login button -->
        <form method="POST" class="form-signin" action="/">
            <img class="mb-4" src="/Public/images/avatar.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">LogIn Form</h1>

            <!-- User name field -->
            <label for="userName" class="sr-only">user Name</label>
            <input type="text" name="userName" id ="userName" class="form-control mt-3 <?php echo $this->userName_feedback?'error-field':'' ?>" placeholder="User Name" value="<?php echo $this->userName; ?>">
            <p class="error-message"><?php echo $this->userName_feedback; ?></p>

            <!-- Password field -->
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control mt-3 <?php echo $this->password_feedback?'error-field':'' ?>" placeholder="Password" value="">
            <p class="error-message"><?php echo $this->password_feedback; ?></p>

            <!-- Remember me (for later) -->
            <div class="checkbox my-3">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>

            <!-- submition by POST -->
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <p class="mt-5 mb-3 text-muted">&copy; Curtis Moxebo</p>
        </form>
    </body>
</html>