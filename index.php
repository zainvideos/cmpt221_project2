 <html>
 <head>

     <?php
     require "mysql_connect.php";

     ?>

     <!-- derpina everyday derp derp -->

      <title>Dorm Form</title>
	 <link rel="stylesheet" type="text/css" href="form.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

     <script type="text/javascript">
	 $(document).ready(function() {


    var dorms = {
        Freshman: ['Champagnat ','Leo',"Sheahan <?php $result = mysql_query("SELECT `spotsleft` FROM DORM WHERE dormname='Leo'") or die(mysql_error());
                                                while($row = mysql_fetch_assoc($result)){
                                                      echo $row['spotsleft'];
                                                } ?>" ],
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
	  <form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" >
      <h2>Step 1/3: <br></h2>
	   <h2>Please sign up and select your housing preferences</h2>

		First Name:<br />
		<input type="text" name="Firstname"  value="<?php echo @$_POST['Firstname']; ?>"> <br /> <!--This is a placeholder for a PHP variable -->

		Last Name: <br />
		<input type="text" name="Lastname"  value="<?php echo @$_POST['Lastname']; ?>"> <br />
		<p>
        CWID: <br />
		<input type="text" name="cwid" value="<?php echo @$_POST['cwid']; ?>"> <br />

		Gender:
		<input type="radio" name="gender" value="male" checked="checked">Male <!--Get rid of default checked property -->
		<input type="radio" name="gender" value="female">Female <br />

		Special Accommodations:
		<input type="radio" name="needs" value="<?php echo @$_POST['needs']; ?>">Yes
		<input type="radio" name="needs" value="<?php echo @$_POST['needs']; ?>" checked="No">No <br />


          accommodations 

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



            </script>
            <input type="submit" onclick="dormToHidden();" value="Continue" form action="mysql_submit.php">
  </form>
    </div>





    <?php

    if (isset($_POST['gender'])) {
		print '<div id="step2">';
        print '<h2>Step 2/3: </br> </h2>';
        print '<h2> Please review the following information </h2>';


     //VARIABLE NAMES

	  $Firstname = $_POST['Firstname'];
	  $Lastname = $_POST['Lastname'];
     //Forst the first letter uppercase on first and last names.
      $formFirst = ucfirst($Firstname);
      $formLast = ucfirst($Lastname);

	  $Fullname = $formFirst.' '.$formLast;

	  $cwid = $_POST['cwid'];
	  $gender = $_POST['gender'];
	  $dining = $_POST['dining'];
	  $year = $_POST['year'];
	  $dropdown = $_POST['dorm_hidden'];
	  $needs = $_POST['needs'];





function addtoDB($conn) {
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    //Forst the first letter uppercase on first and last names.
    $formFirst = ucfirst($Firstname);
    $formLast = ucfirst($Lastname);

    $Fullname = $formFirst.' '.$formLast;

    $cwid = $_POST['cwid'];
    $gender = $_POST['gender'];
    $dining = $_POST['dining'];
    $year = $_POST['year'];
    $dropdown = $_POST['dorm_hidden'];
    $needs = $_POST['needs'];



    //INSERT INTO students(cwid, firstname, lastname, gender, accomodations, dinepref, dormname) values ($cwid, $formFirst, $Lastname, $gender, $needs, $dining, $dropdown); //the reg_date should populate automatically
}


	  //NAME CHECK



	      if ($Firstname =="" )
    	  {
    		  print "<p class='error'><b>You need a first name entered. ";
			  print '<a href="javascript:history.back()">Go Back</a>';
			  die();
    	  }
    	  else if ($Lastname =="")
    	  {
    		  print "<p class='error'><b>You need a last name entered.";
              print '<a href="javascript:history.back()">Go Back</a>';
			  die();
    	  }
          else if (is_numeric($Firstname) ) {
             print "<p class='error'><b>Name fields must be letters.";
          }
            else {
                print "<p>Your name is $Fullname";
            }

      //CWID CHECK

           $cwid_length = strlen((string)$cwid);
           if ($cwid == "" )
              {
                  print "<p class='error'><b>You need a cwid.";
                  print '<a href="javascript:history.back()">Go Back</a>';
                  die();
              }
              else if (!is_numeric($cwid))
              {
                  print "<p class='error'>Your CWID is not a number. Please enter a number ";
                  print '<a href="javascript:history.back()">Go Back</a>';
                  die();
              }
              else if ($cwid_length !== 9 ) {
                  print "<p class='error'>Your CWID must consist of 9 characters. Try again.  ";
                  print '<a href="javascript:history.back()">Go Back</a>';
                  die();
              }
                else
                {
                    print "<p>Your CWID is $cwid.";
                }

      //GENDER

          print "<p>Your gender is: $gender ";

	  //DINING IFS

          if ($dining == "Yes")
          {
              print "<p>You want the Dining Hall";
          }
          else if ($dining == "No")
          {
              print "<p>You do not want the Dining Hall";
          }
          else print "<p>You have no preferences regarding proximity to the Dining Hall";

              if ($dropdown == 'Leo' and $dining == "Yes")
              {
                print "<p class='error'> Leo is the furthest choice away from the dining hall. Is that OK with you? If not, you can go back and choose another dorm. ";
              }


     //YEAR CHECK

        if ($year == "")
        {
            print "<p class='error'>Please choose a class. ";
            print '<a href="javascript:history.back()">Go Back</a>';
            die();
        }
        else {
            print "<p>You are a $year.";
        }

     //DORM CHECK

        if ($dropdown == "Choose Dorm")
        {
            print "<p class='error'>Please choose a dorm. ";
            print '<a href="javascript:history.back()">Go Back</a>';
            die();
        }
        else {
            print "<p> You want to live at $dropdown";
        }



print "<p> Your answer was $needs regarding special accommodation.";

print '<br><br> If all looks well, press the submit button below to confirm your selection. Otherwise, please make the appropriate changes in the form above.';

print '<p> You can always <a href="javascript:history.back()">Go Back</a> and make any changes </p>';



print '<br><button class="button" onclick="$(\'#hidden\').toggle();$(\'#step1\').toggle();$(\'#step2\').toggle();

" >Submit!</button>';

	}



print '</div>';
?>
<div id="hidden" style="display:none">
<h2>Part 3/3:<br></h2>
<h2> Thank you for your submission, below is your confirmation<br></h2>

<?php

 //NAME

    print "<p>Your name is $Fullname";

 //CWID

    PRINT "<p>Your CWID is $cwid";




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
        else {
            print "<p>You are a $year.";
        }

     //DORM CHECK

        if ($dropdown == "Choose Dorm")
        {
            print "<p class='error'>Please choose a dorm. ";
            print '<a href="javascript:history.back()">Go Back</a>';
            die();
        }
        else {
            print "<p> You want to live at $dropdown";
        }




print "<p> Your answer was <strong>$needs</strong> regarding special accommodation.";



?>




</div>



	<br>
	</div>
   </body>
 </html>