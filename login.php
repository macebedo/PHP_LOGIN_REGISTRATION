<?php

  require_once("./include/variable.inc.php");
  require_once("./include/footer.inc.php");

  $output_form1 = true;
  $error_text = "";
  $error_text2 = "";
  $user_name = "";
  $pwd = "";
  $registration_msg = "";

// USER SUBMISSION

  if (isset($_POST['submit'])) {

    
// GRAB THE USER ENTERED DATA
    $fuser_name = mysqli_real_escape_string($dbc, trim($_POST['uname']));
    $fpassword = mysqli_real_escape_string($dbc, MD5($_POST['pwd']));


    // LOOKUP USERNAME AND PASSWORD FROM THE EMPLOYEE TABLE 
    $query = "SELECT employeeNumber, username FROM employees WHERE username = '$fuser_name' AND password ='$fpassword' ";
    $result = mysqli_query($dbc, $query);

      if(mysqli_num_rows($result) == 1) {

// LOGIN IS OK, THEN SET THE MEMBER ID AND USERNAME
        $row = mysqli_fetch_array($result);
        $member_id = $row['employeeNumber'];
        $user_name = $row['username'];

        session_start();
        $_SESSION['member_id'] = $member_id;
        $_SESSION['user_name'] = $user_name;
        header('Location: index.php');
        } else { 
        $error_text2.="<p>X - Wrong Username and Password</p>";
        $output_form1 = true; }


      if ((empty($_POST['uname']) && !empty($_POST['pwd']))  || (!empty($_POST['uname']) && empty($_POST['pwd']))) {
          $error_text.="<p> All fields are manditory</p>";
          $output_form1 = true; }
}
  mysql_close($dbc);

?>

<!DOCTYPE html>

  <html>

  <head>

      <meta charset="UTF-8">
      <title>ASSIGNMENT 5</title>
      <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <body>
    <header>
    	<div id="header">
       	<h2>ASSIGNMENT 5: Log-in Page</h2>
      </div>
    </header>
       <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <table id="main_table">
                   
             <h2>Membership Login</h2>
                <tr>
                   <td>Username:</td>
                   <td><input type="text" name="uname" value="<?=$_POST['uname'] ?>" ></td>
                 </tr>
                 <tr>
                   <td>Password:</td>
                   <td><input type="password" name="pwd"></td>
                 </tr>
                 <tr>
                  <td></td>
                   <td><br><br><input type="submit" name="submit" value="Log In"></td>
                 </tr>
                <tr><td><br><br>To register, please <a href="registration.php">Sign-up</a></td></tr>
            
           </table>
      </form>

           <table id="messages"> <!-- THIS PROMPTS USER ENTRY ERROR OR NON-ERROR MESSAGE -->
                 <tr><td><?= $registration_msg ?></td></tr>
                 <tr><td><?= $error_text ?></td></tr>
                 <tr><td><?= $error_text2 ?></td></tr>
           </table> <!-- END ERROR TABLE -->
  </body>

</html>