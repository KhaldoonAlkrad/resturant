<?php require 'classes.php'; ?>

<?php

echo "<form method = POST action = signup.php autocomplete = on> <fieldset><legend>Sign Up </legend>";
echo "<input type=text name=firstname placeholder=First Name value= >";
echo "<input type=text name=lastname placeholder=Last Name value= >";
echo "<input type=text name=address placeholder=Address value= >";
echo "<input type=text name=housenumber placeholder=House Number value= >";
echo "</fieldset> <fieldset> <input type=text name=email placeholder=Email value= >";
echo "<input type=text name=username placeholder=Username value= >";
echo "<input type=password name=password placeholder=Password value= > ";

$account = new account("", "", "", 0, "", "", "");
$msg = $account->checkaccountinput();

echo "<span class=error>";
echo $msg;
echo " </span> </fieldset> <input type=submit name=register value=Register></form>";
?>

