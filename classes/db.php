<?php
class database{
    public $serverName; // localhost
    public $dbName;   // cms
    public $userName; // root
    public $password; // ""
    public $instance; // 1 database instantie

    // With 'this' you address the global variable
    function __construct($serverName, $dbName, $userName, $password){
        $this->serverName = $serverName;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
    }

    // We create here a function to connect with the database
    function connect(){
        try{
            $this->instance = new PDO("mysql:host=$this->serverName;dbname=$this->dbName", $this->userName, $this->password);
        }
        // If something went wrong, we indicate the error here
        catch(PDOException $error){
            echo "Database connection failed: " . $error->getMessage() . "<br/>";
            die();
        }
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
            return "Error!: " . $error->getMessage() . "<br/>";
        }
    }

    // We create here a updatePassword
    function updatePassword($email, $password){
        try{
            // First password reference to the database column password, second password reference to line 55
            $sql = "UPDATE users SET password=:password WHERE email=:email";
            $statement = $this->instance->prepare($sql);
            
            $statement->execute([
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);
            if($statement->rowCount() > 0){
                return TRUE;
            }
        }
        catch(PDOException $error){
            return "Error!: " . $error->getMessage() . "<br/>";
        }
    }

    // We create here a login
    function login($email, $password){
        try{
            // Get everything from the 'user' table. The email column == to the email variable we pass along
            $sql = "SELECT * FROM users WHERE `email`='$email'"; 
            foreach ($this->instance->query($sql) as $row){
                // This is where we hash passwords
                if(password_verify($password, $row["password"])){
                    return $row;
                }
                else{
                    return FALSE;
                }
                
            }
            return FALSE;
        }
        catch(PDOException $error){
            return "Error!: " . $error->getMessage() . "<br/>";
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
            return "Error!: " . $error->getMessage() . "<br/>";
        }
    }

}



?>