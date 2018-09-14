
	<nav class="signUp row">
	<span class='col-sm-2'> </span>
	<h1 class="col-sm-3 "> Step By Step </h1>
	<span class='col-sm-2'> </span>
	<div class="yo col-sm-4" >
	<form action="index.php" method="post">
				<label> Email </label>
				<input type="text" name="Email" value=""/>
				<label> Password </label>
				<input type="password" name="PW" value=""/>
				
				<input type="submit" name="action" value="Login"/>
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
			<input type="text" name="EmailReset" value=""/>
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
<span class="col-sm-1"> </span>
<div class='col-sm-4 offset-sm-2'>
<h2>Change takes time. Let us help. </h2>
<h4>Track goals to promote incremental change </h4>
<h4 > You'll be amazed how much they'll grow!</h4>
</div>
<span class="col-sm-3"> </span>

<div class='col-sm-2'>
<h2>Sign Up Today</h2>
<form  action="index.php" method="Post">
<label style="display:block"> First Name </label>
<input type="text" name="fName" value="" />
<label style="display:block"> Last Name </label>
<input type="text" name="lName" value="" />
<label style="display:block"> Birthday </label>
<input type="date" name="birthday" value="" />
<label style="display:block"> Email </label>
<input type="text" name="Email" value="" />
<label style="display:block"> Password </label>
<input type="password" name="PW" value=""/>
<label style="display:block"> Confirm Password </label>
<input type="password" name="PWConf" value="" />
<input type="submit" name="action" value="Register"/>
<p style="color:red;"> <?php echo($errorString); ?> </p>
</div>
</form>
</div> 
