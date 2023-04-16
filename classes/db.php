<?php

class database{
    public $instance; // 1 database instance
    public $serverName; // localhost
    public $dbName;   // cms
    public $userName; // root
    public $password; // ""
    public $errors;
    
    // With 'this' you address the global variable
    function __construct($serverName, $dbName, $userName, $password){
        $this->serverName = $serverName;
        $this->dbName     = $dbName;
        $this->userName   = $userName;
        $this->password   = $password;
        $this->errors     = array();
    }

    // We create here a function to connect with the database
    function connect(){
        try{
            $this->instance = new PDO("mysql:host=$this->serverName;dbname=$this->dbName", $this->userName, $this->password);
        }
        // If something went wrong, we indicate the error here
        catch(PDOException $error){
            array_push($this->errors, "<br/>" . $error->getMessage());   
            die();
        }
    }

    function uploadPHP($title, $taal, $categorie, $datum, $beschrijving){
        try{
            $sql = "INSERT INTO php(Title, Taal, Categorie, Datum, Beschrijving) VALUES(:Title, :Taal, :Categorie, :Datum, :Beschrijving)";
            $statement = $this->instance->prepare($sql);

            $statement->execute([
            "Title" => $title,
            "Taal" => $taal,
            "Categorie" => $categorie,
            "Datum" => $datum,
            "Beschrijving" => $beschrijving
            ]);
        }
        catch(PDOException $error){
            array_push($this->errors, "<br/>" . $error->getMessage());
            return;
        }
    }
}

class Register{
    public $instance;
    public $errors;

    function __construct($instance){
        $this->instance = $instance;
        $this->errors = array();
    }

    // We create here a register
    function register($name, $email, $password, $role){
        try{ 
            $sql = "INSERT INTO users(name, email, password, role) VALUES(:name, :email, :password, :role)";
            $statement = $this->instance->prepare($sql);
    
            $statement->execute([
            "name" => $name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "role" => $role
            ]);
        }
        catch(PDOException $error){
            array_push($this->errors, "<br/>" . $error->getMessage());
            return;
        }
    }
}

class Login{
    public $instance;
    public $errors;

    function __construct($instance)
    {
        $this->instance = $instance;
        $this->errors = array();
    }

    // We create here a login
    function login($email, $password){
        try{
            // Get everything from the 'user' table. The email column == to the email variable we pass along
            $sql = "SELECT * FROM users WHERE `email`='$email'"; 
            foreach ($this->instance->query($sql) as $row){
                if(password_verify($password, $row["password"])){  
                    // We return to row to use it in sessions (login.php)
                    return $row;
                }
                else{
                    array_push($this->errors, "Password is incorrect");
                    return;
                }
            }
            array_push($this->errors, "Email or password isn't find");
        }
        catch(PDOException $error){
            array_push($this->errors, "<br/>" . $error->getMessage());
            return;
        }
    }

    // We create here a updatePassword
    function updatePassword($email, $password){
        try{
            // First password reference to the database column password, second password reference to line 55. Same goes for password
            $sql = "UPDATE users SET password=:password WHERE email=:email";
            $statement = $this->instance->prepare($sql);
            
            $statement->execute([
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);
            // When it is == 0, we know the password isn't changed in the database
            if($statement->rowCount() == 0){
                array_push($this->errors, "Failed to update password");
            }
        }
        catch(PDOException $error){
            array_push($this->errors, "<br/>" . $error->getMessage());
            return;
        }
    }
}



?>