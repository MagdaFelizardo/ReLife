<?php
require_once("base.php");

class User extends Base {

    public function register($data) {

        $data = $this->sanitizer($data);
        $register_date = date('Y-m-d');
        $api_key = bin2hex(random_bytes(32));
        $active = 1;

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
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)
            ");
            
            $query->execute([
                $data["name"],
                $data["email"],
                password_hash($data["password"], PASSWORD_DEFAULT),
                $data["phone"],
                $data["city_id"],
                $active,
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
                SELECT user_id, email, password, admin
                FROM users
                WHERE admin = 0 AND email = ? AND active_user = 1
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


    public function verifyEmail($email) {

        $query = $this->db->prepare("
        SELECT email
        FROM users 
        WHERE email = ?
        ");

        $query->execute([$email]);

        $query->fetch( PDO::FETCH_ASSOC );

        return $count = $query->rowCount();
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