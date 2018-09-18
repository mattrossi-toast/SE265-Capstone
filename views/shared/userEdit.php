<?php session_start(); ?>
<nav class="signUp row">
	<span class='col-sm-2'> </span>
	        <h1 class="col-sm-3"> Step By Step </h1>
	    <span class='col-sm-2'> </span>
        <form action="index.php" method="POST">
            <button name='action' value='Home'> Home </button>
            <button name='action' value='User'> My Account </button>
            <?php if($_SESSION['isAdmin'] == 1){ ?>
            <button name='action' value='Admin'> Admin Portal </button>
            <?php } ?>
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
<input type="hidden" id="id" value='<?php echo $user[0]['UserID'] ?>' />
</form>
<button class="button" onclick="test()" > Edit </button>
<button  class="submitButton" onclick="submit()" > Submit </button>

<label style="display:block"> Password </label>
<input required type="password" id="PW" value=""/>
<label style="display:block"> Confirm Password </label>
<input required type="password" id="PWConf" value="" />
<input type="submit" onclick="changePass()"> Change Password </input>


</div>
<script>
function changePass(){

    if($('#PW').val() == $('#PWConf').val()){
        pw = $('#PW').val();
        id = $("#id").val();
        $.ajax({
            type: 'POST',
            url: 'models/users.php',
            data: {pw: pw, id: id},
            success: function(response){           
                console.log(response);  
            },
            error: function(err){
                console.log("err: " + JSON.stringify(err));
            }
        });

    }


}
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
    user['userId'] = $("#id").val();

       $.ajax({
            type: 'POST',
            url: 'models/users.php',
            data: {user: user},
            success: function(response){           
                console.log(response);  
            },
            error: function(err){
                console.log("err: " + JSON.stringify(err));
            }
        });
        
        $(".submitButton").toggleClass("view");
        $(".isDisabled").prop('disabled', true);
        $(".button").text("Edit");
}

</script>