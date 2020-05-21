<?php
require("base.php");

class User extends Base {

    public function cityChoice(){

        $query = $this->db->prepare("
        SELECT city_id, city
        FROM cities
        ");

        $query->execute();

        $cities = $query->fetchAll( PDO::FETCH_ASSOC );

        return $cities;
    }

    public function register($data) {

        $data = $this->sanitizer($data);
        $register_date = date('Y-m-d');
        $api_key = bin2hex(random_bytes(32));

        if(
            !empty($data["name"]) &&
            !empty($data["email"]) &&
            filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
            !empty($data["password"]) &&
            mb_strlen($data["password"]) > 5 &&
            mb_strlen($data["password"]) <= 1000 &&
            $data["password"] === $data["rep-password"]
        ) {

            $query = $this->db->prepare("
                INSERT INTO users
                (name, email, password, phone, city_id, active_user, register_date, api_key) 
                VALUES(?, ?, ?, ?, ?, 1, ?, ?)
            ");
            
            $query->execute([
                $data["name"],
                $data["email"],
                password_hash($data["password"], PASSWORD_DEFAULT),
                $data["phone"],
                $data["city_id"],
                $register_date,
                $api_key
            ]);

            $user_id = $this->db->lastInsertId();

            $_SESSION["user_id"] = $user_id;
            
        }
        
    }

    public function login($data) {
        $data = $this->sanitizer($data);
        
        if(
            filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
            !empty($data["password"]) &&
            mb_strlen($data["password"]) <= 1000
        ) {
            $query = $this->db->prepare("
                SELECT user_id, email, password
                FROM users
                WHERE email = ?
            ");

            $query->execute([
                $data["email"]
            ]);

            $user = $query->fetch( PDO::FETCH_ASSOC );

            if(!empty($user) && password_verify($data["password"], $user["password"])) {
                $_SESSION["user_id"] = $user["user_id"];

                return true;
            }
        }

        return false;
    }




    public function updateUser($data){

        $data = $this->sanitizer($data);
        $user_id = $_SESSION["user_id"];

        if(
            !empty($data["name"]) &&
            !empty($data["phone"]) &&
            mb_strlen($data["phone"]) > 5 &&
            mb_strlen($data["phone"]) <= 32 && 
            !empty($data["city_id"])
        ) {
            $query = $this->db->prepare("
            UPDATE users
            SET
                name = ?,
                phone = ?,
                city_id = ?
            WHERE 
                user_id = ?
        ");
        
        $query->execute([
            $data["name"],
            $data["phone"],
            $data["city_id"],
            $user_id
        ]);

        return $count = $query->rowCount();
        }
    }



    public function updatePassword($data){

        $data = $this->sanitizer($data);
        $user_id = $_SESSION["user_id"];

        if(
            !empty($data["password"]) &&
            !empty($data["rep-password"]) &&
            mb_strlen($data["password"]) > 5 &&
            mb_strlen($data["password"]) <= 1000 && 
            $data["password"] === $data["rep-password"]
        ) {
            $query = $this->db->prepare("
            UPDATE users
            SET
                password = ?
            WHERE 
                user_id = ?
        ");
        
        $query->execute([
            password_hash($data["password"], PASSWORD_DEFAULT),
            $user_id
            
        ]);
        return $count = $query->rowCount();
        }

    }

    public function deleteUser($data) {

        $user_id = $_SESSION["user_id"];
        $query = $this->db->prepare("
        DELETE FROM users
        WHERE user_id = ?
        ");
        $query->execute([$user_id]);
        return true;
    }
}