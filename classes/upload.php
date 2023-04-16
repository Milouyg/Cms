<?php
class upload{
    public $rootDir;
    public $fileDestination;
    public $fileTmpName;
    public $fileExt;
    public $fileSize;
    public $errors;

    function __construct($rootDir){
        $this->rootDir = $rootDir;
        $this->errors = array();
    }
    
    function setExtension($fileExt){
        $this->fileExt = $fileExt;
    }
    
    function isValidType(){
        if (is_uploaded_file($this->fileTmpName)) {
            $mime_type = mime_content_type($this->fileTmpName);
        
            // If you want to allow certain files
            $allowed_file_types = ["image/png", "image/jpeg", "image/jpg", "image/webp"];
            if (!in_array($mime_type, $allowed_file_types)) {
                array_push($this->errors, "This file is not valid");
                return False ;
            }
            return True;
        }
        array_push($this->errors, "Something went wrong");
        return False;
    }

    function converterWebp($newName){
        $img = imagecreatefrompng($this->rootDir . $this->fileTmpName);
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
        imagewebp($img, $this->rootDir . $newName, 100);
        imagedestroy($img);
    }

    function save(){
        if(count($this->errors) == 0){
            move_uploaded_file($this->fileTmpName, $this->fileDestination);
            return True;
        }
        return $this->errors;
    }
}

?>

<!-- $destination = 'assets/' . basename($_FILES['image']['name']);
$file = $_FILES['image']['tmp_name'];
$err = $_FILES['image']['error'];

$allowed = array("jpg", "jpeg", "png");

$fileExt = explode(".", $fileName);
$fileExt = strtolower(end($fileExt));

if(in_array($fileExt, $allowed)) {
    echo "bestand toegestaan";
}

if ($err == 0 && move_uploaded_file($file, $destination)){
    echo "Bestand succesvol geupload en verplaatst naar {$destination}";
} -->
