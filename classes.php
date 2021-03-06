<?php

require 'connectdb.php';
?>

<?php

// Account Class  /////////////////////////////////////////////////////////////////////////////////////////////////
class account {

    public $id;
    public $firstname;
    public $lastname;
    public $address;
    public $housenumber;
    public $email;
    public $username;
    public $password;

    public function __construct($firstname, $lastname, $address, $housenumber, $email, $username, $password) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $address;
        $this->housenumber = $housenumber;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function getid() {
        return $this->id;
    }

    public function setid($id) {

        $this->id = $id;
    }

    public function getfirstname() {
        return $this->firstname;
    }

    public function setfirstname($firstname) {

        $this->firstname = $firstname;
    }

    public function getlastname() {
        return $this->lastname;
    }

    public function setlastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getaddress() {
        return $this->address;
    }

    public function setaddress($address) {
        $this->address = $address;
    }

    public function gethousenumber() {
        return $this->housenumber;
    }

    public function sethousenumber($housenumber) {
        $this->housenumber = (int) $housenumber;
    }

    public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
    }

    public function getusername() {
        return $this->username;
    }

    public function setusername($username) {
        $this->username = $username;
    }

    public function getpassword() {
        return $this->password;
    }

    public function setpassword($password) {
        $this->password = $password;
    }

    public function addaccount() {
        $con = connectionDB();
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            $sql = "INSERT INTO `account`(`role`, `firstname`, `lastname`, `address`, `housenumber`, `email`, `username`, `password`) VALUES";
            $sql .= " ('customer','$this->firstname','$this->lastname','$this->address',$this->housenumber,'$this->email','$this->username','$this->password')";
            $result = $con->query($sql);
            session_start();
            $_SESSION["firstname"] = $this->firstname;
            $_SESSION["lastname"] = $this->lastname;
            $con->close();
            header("location: newindex.php");
        }
        $con->close();
    }

    public function signin() {

        $con = connectionDB();
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            $sql = "SELECT * FROM `account` WHERE `username`= BINARY '$this->username' AND `password`= BINARY '$this->password'";
            $result = $con->query($sql);
            if (isset($result)) {
                if ($result->num_rows <= 0) {
                    return "username or password does not match";
                } else {
                    session_start();
                    $row = $result->fetch_assoc();
                    $_SESSION["firstname"] = $row['firstname'];
                    $_SESSION["lastname"] = $row['lastname'];
                    $con->close();
                    header("location: newindex.php");
                }
            }
        }
    }

    public function checkifaccountexist() {

        $con = connectionDB();
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            $sql = "SELECT `username`, `email` FROM `account` WHERE `username`= '$this->username' OR `email`= '$this->email'";
            $result = $con->query($sql);
            if ($result->num_rows >= 1) {
                $con->close();
                return true;
            } else {
                return false;
            }
        }
    }

    public function checkaccountinput() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["firstname"])) {
                $this->setfirstname(test_input($_POST["firstname"]));
                if ($this->firstname == "") {
                    return "firstname can not be empty <br>";
                }
            }

            if (isset($_POST["lastname"])) {
                $this->setlastname(test_input($_POST["lastname"]));
                if ($this->lastname == "") {
                    return "lastname can not be empty";
                }
            }
            if (isset($_POST["address"])) {
                $this->setaddress(test_input($_POST["address"]));
                if ($this->address == "") {
                    return "address can not be empty";
                }
            }
            if (isset($_POST["housenumber"])) {
                $this->sethousenumber(test_input($_POST["housenumber"]));
                if ($this->housenumber == "") {
                    return "house number can not be empty";
                }
            }
            if (isset($_POST["email"])) {
                $this->setemail(test_input($_POST["email"]));
                if ($this->email == "") {
                    return "email can not be empty";
                }
            }
            if (isset($_POST["username"])) {
                $this->setusername(test_input($_POST["username"]));
                if ($this->username == "") {
                    return "username can not be empty <br>";
                }
            }
            if (isset($_POST["password"])) {
                $this->setpassword(test_input($_POST["password"]));
                if ($this->password == "") {
                    return "password can not be empty";
                }
            }

            if ($this->checkifaccountexist() == false) {
                return $this->addaccount();
            } else {
                return "the username or the email that you have enterd is al ready exist! Please choose another one";
            }
        }
    }

    public function checksignin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["username"])) {
                $this->setusername(test_input($_POST["username"]));
                if ($this->username == "") {
                    return "username can not be empty <br>";
                }
            }
            if (isset($_POST["password"])) {
                $this->setpassword(test_input($_POST["password"]));
                if ($this->password == "") {
                    return "password can not be empty";
                }
            }

            if ($this->username != "" && $this->password != "") {
                return $this->signin();
            }
        }
    }

}

// Meal Class /////////////////////////////////////////////////////////////////////////////////////////////////////
class meal {

    public $id;
    public $name;
    public $price;
    public $description;
    public $imagename;
    public $categoryid;

    public function __construct($name, $price, $description, $imagename, $categoryid) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->imagename = $imagename;
        $this->categoryid = $categoryid;
    }

    public function getid() {
        return $this->id;
    }

    public function setid($id) {

        $this->id = $id;
    }

    public function getname() {
        return $this->name;
    }

    public function setname($name) {

        $this->name = $name;
    }

    public function getprice() {
        return $this->price;
    }

    public function setprice($price) {

        $this->price = $price;
    }

    public function getdescription() {
        return $this->description;
    }

    public function setdescription($description) {

        $this->description = $description;
    }

    public function getimagename() {
        return $this->imagename;
    }

    public function setimagename($imagename) {

        $this->imagename = $imagename;
    }

    public function getcategoryid() {
        return $this->categoryid;
    }

    public function setcategoryid($categoryid) {

        $this->categoryid = $categoryid;
    }

    static function getmeals($categoryid) {
        $con = connectionDB();
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            $sql = "SELECT * FROM `meal` WHERE categoryid=$categoryid";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {

                $mealitems = "<table>";
                while ($row = $result->fetch_assoc()) {
                    $mealid = "m" . $row['id'];
                    $mealitems .= <<<EOT
                    <tr>
                    <td class="meals" rowspan=2> <img src=images/{$row['imagename']}></td>
                    <td class='meals mealname'colspan=3>{$row['name']}</td>
                    </tr>
                    <tr>
                    <td class='meals'> {$row['description']}</td>
                    <td class='meals'> &euro;{$row['price']}</td>
                    <td>
                    <input  type=number name=quantity value=1 min=0 max=100>
                    <button type=submit class=addbutton fa fa-cart-plus >+</button>
                    </td>
                    <tr>
EOT;
                }
                echo $mealitems .= "</table>";
            }
            $con->close();
        }
    }

}

//Category Class///////////////////////////////////////////////////////////////////////////////////////////////////
class category {

    public $id;
    public $name;
    public $priority;

    public function __construct($name, $priority) {
        $this->name = $name;
        $this->priority = $priority;
    }

    public function getid() {
        return $this->id;
    }

    public function setid($id) {

        $this->id = $id;
    }

    public function getname() {
        return $this->name;
    }

    public function setname($name) {

        $this->name = $name;
    }

    public function getpriority() {
        return $this->priority;
    }

    public function setpriority($priority) {
        $this->priority = $priority;
    }

    static function displaycategories() {
        $con = connectionDB();
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            $sql = "SELECT * FROM `category` ORDER by `priority`";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<details open><summary>" . $row['name'] . "</summary>";
                    if ($row['id'] == 3) {
                        product::getproducts($row['id']);
                    } else {
                        meal::getmeals($row['id']);
                    }
                    echo '</details>';
                }
            }
            $con->close();
        }
    }

}

//Product Class //////////////////////////////////////////////////////////////////////////////////////////////////
class product {

    public $id;
    public $name;
    public $type;
    public $price;
    public $description;
    public $imagename;
    public $categoryid;

    public function __construct($name, $type, $price, $description, $imagename, $categoryid) {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->description = $description;
        $this->imagename = $imagename;
        $this->categoryid = $categoryid;
    }

    public function getid() {
        return $this->id;
    }

    public function setid($id) {

        $this->id = $id;
    }

    public function getname() {
        return $this->name;
    }

    public function setname($name) {

        $this->name = $name;
    }

    public function gettype() {
        return $this->type;
    }

    public function settype($type) {

        $this->type = $type;
    }

    public function getprice() {
        return $this->price;
    }

    public function setprice($price) {

        $this->price = $price;
    }

    public function getdescription() {
        return $this->description;
    }

    public function setdescription($description) {

        $this->description = $description;
    }

    public function getimagename() {
        return $this->imagename;
    }

    public function setimagename($imagename) {

        $this->imagename = $imagename;
    }

    public function getcategoryid() {
        return $this->categoryid;
    }

    public function setcategoryid($categoryid) {

        $this->categoryid = $categoryid;
    }

    static function getproducts($categoryid) {
        $con = connectionDB();
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            $sql = "SELECT * FROM `product` WHERE categoryid=$categoryid";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $productitems = "<table>";
                while ($row = $result->fetch_assoc()) {
                    $productitems .= <<<EOT
                    <tr>
                    <td class='meals' rowspan=2> <img src=images/{$row['imagename']}> </td>
                    <td class='meals mealname'colspan=4>{$row['name']}</td>
                    </tr>
                    <tr>
                    <td class='meals'> {$row['description']}</td>
                    <td class='meals'> &euro;{$row['price']}</td>
                    <td>
                    <input value=1 type=number name=quantity min=0 max=100>
                    <button class=addbutton fa fa-cart-plus onclick=>+</button>
                    </td>
                    <tr>
EOT;
                }
                echo $productitems .= "</table>";
            }
            $con->close();
        }
    }

}
