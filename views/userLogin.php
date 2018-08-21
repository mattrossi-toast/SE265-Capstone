
<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link rel="stylesheet" href="../styles/style.css">
    </head>
    
	<body>
    <h1> Step By Step </h1>
    <div class="container">
        <div style="col-lg-4">
			<form action="index.php" method="post">
				<label> Email </label>
				<input type="text" name="customerEmail" value="" > </input>
				<label> Password </label>
				<input type="password" name="customerPW" value="" > </input>
				<input type="submit" name="action" value="Customer Login"> </input>
			</form>
        </div>
    <div class="col-lg-12">
<form action="index.php" method="Post">
<label style="display:block"> Email </label>
<input type="text" name="customerEmailReg" value="" > </input>
<label style="display:block"> Confirm Email </label>
<input type="text" name="customerEmailRegConf" value="" > </input>
<label style="display:block"> Password </label>
<input type="password" name="customerPwReg" value="" > </input>
<label style="display:block"> Confirm Password </label>
<input type="password" name="customerPwRegConf" value="" > </input>
<input type="submit" name="action" value="Register Customer"> </input>
</form>
    </div>
    </div>
</body>
</html>