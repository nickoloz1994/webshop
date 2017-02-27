<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Sign in</title>
</head>
<body>

<?php ?>

<div class="container" style="margin-top: 15%;">

      <form action="login.php" method="post">
        <h2 style="text-align: center;">Please sign in</h2>
        <input type="email" name="usrmail" class="form-control" placeholder="Email address" required autofocus style="width: 40%; margin: auto;"><br>
        <input type="password" name="usrpass" class="form-control" placeholder="Password" required style="width: 40%; margin: auto;"><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 40%; margin-left: auto; margin-right: auto;">Sign in</button>
      </form>

    </div>

</body>
</html>