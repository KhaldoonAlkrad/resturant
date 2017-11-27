<?php

// Account Class  ////////////////////////////////////////////////////////////////////////////////////////////
class account {

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
        $this->housenumber = $housenumber;
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

}

// Meal Class /////////////////////////////////////////////////////////////////////////////////////////////////////
class meal {

    public $id;
    public $name;
    public $price;
    public $description;
    public $imagename;
    public $categoryid;

    public function getid() {
        return $this->id;
    }

}
