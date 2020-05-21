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

    public function getUser($data) {

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.password, u.phone, u.city_id, u.active_user, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id)
        WHERE u.active_user = 1 AND u.user_id = ?
        ");

        $query->execute([$data]);

        $user = $query->fetch( PDO::FETCH_ASSOC );

        return $user;

    }

}