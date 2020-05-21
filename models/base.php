<?php
class Base {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=relife;charset=utf8mb4", "root", "");
    }

    public function sanitizeSearch($input) {
        return strip_tags(trim($input));
    }

    public function sanitizer($input){
        foreach($input as $key => $value) {
            $input[$key] = strip_tags(trim($value));
        }
        return $input;
    }

    public function isValidUser($data) {
        if(isset($_SESSION["user_id"])){
            $user_id = $_SESSION["user_id"];
        }
        return $user_id ?? false;
    }

    public function sanitizePhoto($data){

        $allowed_files = [
            "jpeg" => "image/jpeg",
            "png" => "image/png",
            "webp" => "image/webp",
            "gif" => "image/gif",
            "bmp" => "image/bmp"
        ];

        if(isset($_FILES["photo"])){

            //detectar o media type do ficheiro enviado
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $detected_filetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
        
            //validar o ficheiro - no inarray vai verificar se o tipo do ficheiro está dentro do array.
            if(
                $_FILES["photo"]["error"] === 0 && 
                in_array($detected_filetype, $allowed_files) && // in array retorna um booleano, V ou F
                $_FILES["photo"]["size"] < 204800 && //*é em bytes 
                $_FILES["photo"]["size"] > 0
            ){
                //criarmos nós o nome do ficheiro pq é mais seguro
                $file_name = date("YmdHis") ."_".mt_rand(100000, 999999) . "." . array_search($detected_filetype, $allowed_files);
                move_uploaded_file($_FILES["photo"]["tmp_name"], "./imgs/uploads/".$file_name);
                return $file_name;
            }
            else{
                return 0;
            }
        }
    }

}