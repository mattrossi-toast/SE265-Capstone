<?php session_start(); 
    echo session_id();
    var_dump($_SESSION['Email']);
    
    ?>
<nav class="signUp row">
	<span class='col-sm-2'> </span>
	        <h1 class="col-sm-3"> Step By Step </h1>
	    <span class='col-sm-2'> </span>
        <form action="index.php" method="POST">
            <button name='action' value='Login'> Home </button>
            <button name='action' value='User'> My Account </button>
            <button name='action' value='Logout'> Logout </button>
        </form>
</nav>
<div>

<form disabled action="index.php" method="POST">
<label style="display:block"  > First Name </label>
<input disabled class="isDisabled" type="text" id="fName" value='<?php echo $user[0]['Fname'] ?>' />
<label  style="display:block"> Last Name </label>
<input disabled class="isDisabled" type="text" id="lName" value='<?php echo $user[0]['Lname'] ?>' />
<label  style="display:block"> Birthday </label>
<input disabled class="isDisabled" type="date" id="birthday" value='<?php echo date('Y-m-d', strtotime($user[0]['Birthday'])); ?>' />
<label  style="display:block"> Email </label>
<input disabled class="isDisabled" type="text" id="email" value='<?php echo $user[0]['Email'] ?>' />
</form>
<button class="button" onclick="test()" > Edit </button>
<button  class="submitButton" onclick="submit()" > Submit </button>
<form  action="index.php" method="Post">
<label style="display:block"> Password </label>
<input type="password" name="PW" value=""/>
<label style="display:block"> Confirm Password </label>
<input type="password" name="PWConf" value="" />
<input type="submit" name="action" value="Change Password"/>
</form>

</div>
<script>

function test(){
    if($(".isDisabled").prop('disabled') == false){
        $(".isDisabled").prop('disabled', true);
        $(".button").text("Edit");
       
    }

    else{
        $(".isDisabled").prop('disabled', false);
        $(".button").text("Cancel");
        $(".submitButton").prop("display","inline");
    }
    $(".submitButton").toggleClass("view");

}

function submit(){
    var user = {};
    user['fName'] = $("#fName").val();
    user['lName'] = $("#lName").val();
    user['birthday'] = $("#birthday").val();
    user['email'] = $("#email").val();

       $.ajax({
            type: 'POST',
            url: 'users.php',
            data: {user: user},
            success: function(response){           
                console.log(response);  
            },
            error: function(err){
                console.log("err: " + err);
            }
        });


}

</script>