    <nav  class="signUp row">
	<span class='col-sm-2'> </span>
	<h1  class="col-sm-3 "> Step By Step </h1>
	<span class='col-sm-2'> </span>
    <form action="index.php" method="POST">
    <button name='action' value='Back'> Back </button>
    <button name='action' value='Logout'> Logout </button>
    </form>
	</nav>
  <?php  
    $strUser = '<table class="table" >';
    foreach($users as $user){ 
	$strUser .= "<tr >";
	$strUser .= "<td>" . $user['Fname'] ." " . $user['Lname'] . "</td>";	
	$strUser .= "<td><form action='index.php' method='get'>";
	$strUser .= "<button name='userId' value='" . $user['UserID'] . "'>"  . "Edit" . "</button> <input type='hidden' name='action' value='Edit'> </input> </form></td> </tr>";
	
}
$strUser .= '</table>';
$strTemp = '<table class="table">';
foreach($templates as $template){ 
	$strTemp .= "<tr >";
	$strTemp .= "<td>" . $template['TemplateName'] . "</td>";	
	$strTemp .= "<td><form action='index.php' method='get'>";
	$strTemp .= "<button name='userId' value='" . $user['UserID'] . "'>"  . "Edit" . "</button> <input type='hidden' name='action' value='Edit'> </input> </form></td></tr>";
	
}
$strTemp.= '</table>';
?>
<input type="text" id="searchBar" onkeyup="search()" placeholder= "Search For Users...">
<div>
<input type="radio" id="searchChoice1"
     name="search" value="User" onchange="toggleSearch()" checked>
    <label for="searchChoice1">User</label>

<input type="radio" id="searchChoice2"
     name="search" value="Template" onchange="toggleSearch()" >
    <label for="searchChoice1">Template</label>

<div id='userSearch' class='table'>
<?php echo($strUser); ?>
</div>
<div id='templateSearch' class='table hide'>
<?php echo($strTemp); ?>
</div>







</div>

<script>
function toggleSearch(){

        $("#userSearch").toggleClass("hide");
        $("#templateSearch").toggleClass("hide");


        if($("#userSearch").hasClass("hide")){
            $("#searchBar").attr("placeholder", "Search For Templates...");
        }

        else{
            $("#searchBar").attr("placeholder", "Search For Users...");
        }
                      
        }
function search(){
    if($("#userSearch").hasClass("hide")){
        table = document.getElementById("templateSearch");
        }

        else{
            table = document.getElementById("userSearch");
        }
      var input, filter, table, tr, td, i;
  input = document.getElementById("searchBar");
  filter = input.value.toUpperCase();
  
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



</script>