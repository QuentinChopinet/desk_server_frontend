<!DOCTYPE html>
<html>
<head>
<title>Welcome to nginx!</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<body>
<h1>Welcome to Tankin Server!</h1>
<p>From this page, you will be able to control the lighting of my room.</p>

<form action="pinon.php">
  <input type="submit" value="ON"/>
</form>

<form action="pinoff.php" method="POST">
  <input type="submit" value="OFF"/>
</form>

<a href="pinon.php">ON</a>

<a href="pinoff.php">OFF</a>

<p>For further information please contact me at quentin.chopinet@gmail.com </p>

</body>
</html>
