<nav  class="signUp row">
	<span class='col-sm-2'> </span>
	<h1  class="col-sm-3 "> Step By Step </h1>
	<span class='col-sm-2'> </span>
    <form method="POST" action="index.php" name="change">
    <input type="hidden" name='action' value='Update Template'> </input>
    </form>
    <form action="index.php" method="POST">
    <button name='action' value='User'> My Account </button>
    <button name='action' value='Logout'> Logout </button>
    <?php if($_SESSION['isAdmin'] == 1){ ?>
        <button name='action' value='Admin'> Admin Portal </button>
      <?php } ?>
    </form>
	</nav>
<div>

<?php foreach($questions as $question){ ?>
    <div>
        <input disabled id='<?php echo('isDisabled' . $question['QuestionID']);?>' type="text" style="width:500px"; value='<?php echo($question['QuestionText']); ?>'>
        <input type=hidden value='<?php echo($question['QuestionID']); ?>'>
        <button id='<?php echo('button' . $question['QuestionID']);?>'  onclick="edit(<?php echo($question['QuestionID']);?>)" > Edit </button>
        <button class='hide' id='<?php echo('submitButton' . $question['QuestionID']);?>'  onclick="submit(<?php echo($question['QuestionID']);?>)" > Submit </button>
    </div>
<?php }?>

<script>
function edit(QuestionID){
    console.log('isDisabled' + QuestionID)
    if($('#isDisabled' + QuestionID).prop('disabled') == false){
        $('#isDisabled' + QuestionID).prop('disabled', true);
        $('#button' + QuestionID).text("Edit");
    }

    else{
        $('#isDisabled' + QuestionID).prop('disabled', false);
        console.log($('#isDisabled' + QuestionID).val());
        $('#button' + QuestionID).text("Cancel");
    }
   $('#submitButton' + QuestionID).toggleClass("hide");

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