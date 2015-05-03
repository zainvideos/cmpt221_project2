 <html>
 <head>

     <?php
     require "mysql_connect.php";

     //include('login.php');
     if (isset($_SESSION['login_user'])) {
         header("Location: profile.php"); // Take the user to their profile page
     }

     ?>

     <div id="login">
         <center>
<p>Existing Users:</p>
         <form action="login.php" method="post">
             <input id=name name=username placeholder=username type=text> <br />
             <input id=password name=password placeholder=******* type=password> <br />
             <center><input name=submit type=submit value=login></center>

         </form>

     </div>


     <!-- derpina everyday derp derp -->

      <title>Dorm Form</title>
	     <link rel="stylesheet" type="text/css" href="form.css" />
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

     <script type="text/javascript">
	 $(document).ready(function() {



      var dorms = {
          Freshman: ['Champagnat ','Leo','Sheahan ' ],                                              //1. Echo spots left
          Sophmore: ['Midrise','Lower West','Talmadge'],
          Junior_Senior: ['Lower Fulton','Upper Fulton','Upper West']
      };
      $('.year').change(function() {
          var value = $(this).val();
          addToList(dorms[value]);
      });
      function addToList(dorms) {
          removeOptions();
          for (var i in dorms) {
              var option = '<option value="'+i+'">'+dorms[i]+'</option>';
              $('.dorms').append(option)
          }
      }

      function removeOptions() {
           $('.dorms option').each(function(){
              if ($(this).val().length > 0){
                  $(this).remove();
              }
          });
      }


  });
  </script>

      <script>
    $(document).ready(function() {
      $("#dorms").change(function(){
        $("#dorm_hidden").val(("#dorms").find(":selected").text());
      });
    });
  </script>


  </head>
  <body onunload="dormToHidden()"> <!-- call this something else -->

  <div id="logo">
      <a href="index.php">
      <img src="MaristLogo.jpg" alt="Marist Logo" height="20%" width="51%">
      </a>
  </div>

  <div id="left"> <!--try using get and then post for the final step -->
      <div id="step1">
        <form method="post" id="formage" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" >
        <h2>Step 1/3: <br></h2>
         <h2>Please sign up and select your housing preferences</h2>


          First Name:<br />
          <input type="text" name="Firstname"  value="<?php echo @$_POST['Firstname']; ?>"> <br />

          Last Name: <br />
          <input type="text" name="Lastname"  value="<?php echo @$_POST['Lastname']; ?>"> <br />
          <p>
          CWID: <br />
          <input type="text" name="cwid" value="<?php echo @$_POST['cwid']; ?>"> <br />

          Gender:
          <input type="radio" name="gender" value="male" checked="checked">Male
          <input type="radio" name="gender" value="female">Female <br />

          Special Accommodations:
          <input type="radio" name="needs" value="<?php echo @$_POST['needs']; ?>">Yes  <!--get rid of echo ats -->
          <input type="radio" name="needs" value="<?php echo @$_POST['needs']; ?>" checked="No">No <br />

          <p>
            Living Arrangements:<br />
            Do you want to live near dining hall?:
          <input type ="radio" name="dining" value="Yes" checked="Yes">Yes
          <input type ="radio" name="dining" value="No">No
          <input type ="radio" name="dining" value="NoPref" checked="NoPref">No Preference<br />

            <select class="year" id="year" name="year">
                <option selected="selected" value="<?php echo @$_POST['year']; ?>"> Choose Class </option>
                <option value="Freshman"> Freshman </option>
                <option value="Sophmore"> Sophmore </option>
                <option value="Junior_Senior"> Junior / Senior </option>
              </select>


              <select class="dorms" id="dorms" name="dorms[dorm]">
                <option selected="selected" value="<?php echo @$_POST['dropdown']; ?>"> Choose Dorm </option>

              </select>
              <input type="hidden" name="dorm_hidden" id="dorm_hidden">

           <script type="text/javascript">
           function dormToHidden(){
              var dormSelect = document.getElementById("dorms");
              var selectedText = dormSelect.options[dormSelect.selectedIndex].text;
              //document.write(selectedText);
              document.getElementById('dorm_hidden').value=selectedText;
           }

                                                                                              //mysql submit will go here until php is working

              </script>
              <input type="submit" onclick="dormToHidden();" value="Continue">
    </form>
      </div>




      <?php


      if (isset($_POST['gender'])) {

          //VARIABLE NAMES

          $Firstname = $_POST['Firstname'];
          $Lastname = $_POST['Lastname'];
          $formFirst = ucfirst($Firstname);
          $formLast = ucfirst($Lastname);

          $Fullname = $formFirst . ' ' . $formLast;

          $cwid = $_POST['cwid'];
          $gender = $_POST['gender'];
          $dining = $_POST['dining'];
          $year = $_POST['year'];
          $dropdown = $_POST['dorm_hidden'];
          $needs = $_POST['needs'];



          $sql= "INSERT INTO students (cwid, firstname, lastname, gender, accomodations, dinepref, dormname, reg_date) VALUES ('$cwid', '$formFirst', '$formLast', '$gender', '$needs', '$dining', '$dropdown', CURRENT_TIMESTAMP)";

          $sql2= "UPDATE dorms SET spotsleft = spotsleft - 1 WHERE dormname = '$dropdown' and spotsleft > 0"; //set dormname to $dropdown

          $sqlDisplay = "SELECT spotsleft, dormname from dorms where '$dropdown' = dormname ";
           /*   $result = mysql_query($sqlDisplay);
              while($row = mysql_fetch_array($result)) {
                  echo $row["students.spotslwft"];
              }      */

          function check_results($results)
          {
              global $conn;

              if ($results != true)
                  echo '<p>There is an error = ' . mysqli_error($conn) . '</p>';
          }

              $results = mysqli_query($conn, $sqlDisplay);
              check_results($results);

              if ($results) {
                  while ($row = mysqli_fetch_array($results)) { //

                     // echo '<h3>' . $row['dormname'];

                      echo '<h3>' . $row['spotsleft']  ." left in ".$row['dormname'];


                  }
              }



          //$SQL = "INSERT INTO students (cwid, firstname, lastname, gender, accomodations, dinepref, dormname, reg_date) VALUES ('$cwid', '$formFirst', '$formLast', '$gender', '$needs', '$dining', '$dropdown', CURRENT_TIMESTAMP)";

          /*$res = mysqli_query($conn, $sql2)
              or die('Error.');*/

          if	(mysqli_query($conn, $sql))	{
              echo	"query returned successfully";
          }	else	{
              echo	"Error	with	database:	"	.	mysqli_error($conn);
          }

          if	(mysqli_query($conn, $sql2))	{
              echo	"query returned successfully";
          }	else	{
              echo	"Error	with	database:	"	.	mysqli_error($conn);
          }

          if	(mysqli_query($conn, $sqlDisplay))	{
              echo	"";
          }	else	{
              echo	"Error	with	database:	"	.	mysqli_error($conn);
          }




          print '<div id="step2">';
          print '<h2>Step 2/3: </br> </h2>';
          print '<h2> Please review the following information </h2>';





          //GENDER

          print "<p>Your gender is: $gender ";

          //DINING IFS

          if ($dining == "NoPref")
          {
              print "<p>You have no preference regarding the Dining Hall";
          }
          else if ($dining == "Yes")
          {
              print "<p>You want the Dining Hall";
          }
          else if ($dining == "No")
          {
              print "<p>You do not want the Dining Hall";
          }


          //YEAR CHECK

          if ($year == "")
          {
              print "<p class='error'>Please choose a class. ";
              print '<a href="javascript:history.back()">Go Back</a>';
              die();
          }
          else
          {
              print "<p>You are a $year.";
          }

          //DORM CHECK

          if ($dropdown == "Choose Dorm")
          {
              print "<p class='error'>Please choose a dorm. ";
              print '<a href="javascript:history.back()">Go Back</a>';
              die();
          }
          else
          {
              print "<p> You want to live at $dropdown";
          }


          print "<p> Your answer was $needs regarding special accommodation.";




          //NAME CHECK


          if ($formFirst == "") {
              print "<p class='error'><b>You need a first name entered. ";
              print '<a href="javascript:history.back()">Go Back</a>';
              die();
          } else if ($formLast == "") {
              print "<p class='error'><b>You need a last name entered.";
              print '<a href="javascript:history.back()">Go Back</a>';
              die();
          } else if (is_numeric($formFirst)) {
              print "<p class='error'><b>Name fields must be letters.";
          } else {
              print "<p>Your name is $Fullname";
          }

          //CWID CHECK

          $cwid_length = strlen((string)$cwid);
          if ($cwid == "")
          {
              print "<p class='error'><b>You need a cwid.";
              print '<a href="javascript:history.back()">Go Back</a>';
              die();
          } else if (!is_numeric($cwid) || $cwid_length !== 9) {
              print "<p class='error'>Your CWID is not a number. Please enter a 9 digit number ";
              print '<a href="javascript:history.back()">Go Back</a>';
              die();
          } else {
              print "<p>Your CWID is $cwid";
          }

          print '<br><br> If all looks well, press the submit button below to confirm your selection. Otherwise, please make the appropriate changes in the form above.';

          print '<p> You can always <a href="javascript:history.back()">Go Back</a> and make any changes </p>';


          print '<br><button class="button" onclick="$(\'#hidden\').toggle();$(\'#step1\').toggle();$(\'#step2\').toggle();" >Submit!</button>'; //would we need to change the submit here?

      }                                                              //ends the if isset. Tested sql needs to go here.

  print '</div>';
  ?>

<div id="hidden" style="display:none">
<h2>Part 3/3:<br></h2>
<h2> Thank you for your submission, below is your confirmation<br></h2>

<?php

$confcode = md5($formFirst) + md5($formLast);



print "<p>Your confirmation code is: $confcode ";


?>




      </div>
	 <br>
	</div>
   </body>
 </html>