
<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link rel="stylesheet" type='text/css' href="styles/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	<nav class="signUp row">
	<span class='col-sm-2'> </span>
	<h1 class="col-sm-3 "> Step By Step </h1>
	<span class='col-sm-2'> </span>
	<div class="yo col-sm-4" >
	<form action="index.php" method="post">
				<label> Email </label>
				<input type="text" name="Email" value="" > </input>
				<label> Password </label>
				<input type="password" name="PW" value="" > </input>
				
				<input type="submit" name="action" value="Login"> </input>
			</form>
			<a style="margin-left:300px;" data-toggle="modal" data-target="#myModal">Forgot Password?</a>
	</div>
	</nav>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reset your Password</h4>
        </div>
        <div class="modal-body">
			<label> Your Email: </label>
			<input type="text" name="EmailReset" value=""> </input>
          <p>We'll send you an email with a link to reset your password.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
	</div>
	</div>
<div class='row'; style="width:100%; height:100%; margin-top:100px;">
<h2>Change takes time. Let us help. </h2>
<h4>Track goals to promote incremental change </h4>

<h4> You'll be amazed how much they'll grow!</h4>
<canvas class='col-sm-7'>
</canvas>
<div class='col-sm-2'style="border:2px solid black;">
<h2>Sign Up Today</h2>
<form  action="index.php" method="Post">
<label style="display:block"> First Name </label>
<input type="text" name="fName" value="" > </input>
<label style="display:block"> Last Name </label>
<input type="text" name="lName" value="" > </input>
<label style="display:block"> Birthday </label>
<input type="date" name="birthday" value="" > </input>
<label style="display:block"> Email </label>
<input type="text" name="Email" value="" > </input>
<label style="display:block"> Confirm Email </label>
<input type="text" name="EmailConf" value="" > </input>
<label style="display:block"> Password </label>
<input type="password" name="PW" value="" > </input>
<label style="display:block"> Confirm Password </label>
<input type="password" name="PWConf" value="" > </input>
<input type="submit" name="action" value="Register"> </input>
<p style="color:red;"> <?php echo($errorString); ?> </p>
</div>
</form>
</div> 
</body>
</html>