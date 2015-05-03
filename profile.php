<?php
include('session.php');
?>
<html>
<head>
    <title>Your Home Page</title>
</head>
<body>
Welcome : <i><?php echo $login_session; ?></i>
<a href="logout.php">Log Out</a>
</body>
</html>