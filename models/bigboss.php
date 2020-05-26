<?php
require_once("base.php");


class Boss extends Base {

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
                WHERE admin = 1 AND email = ?
            ");

            $query->execute([
                $data["email"]
            ]);

            $user = $query->fetch( PDO::FETCH_ASSOC );

            if(!empty($user) && password_verify($data["password"], $user["password"])) {
                $_SESSION["admin"] = $user["admin"];

                return true;
            }
        }

        return false;
    }


        public function getPendingList() {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 0
        ORDER BY donation_date ASC
        ");

        $query->execute();

        $pendingdons = $query->fetchAll( PDO::FETCH_ASSOC );

        return $pendingdons;
    }


    public function getActiveList() {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name,	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 1
        ORDER BY donation_date DESC
        ");

        $query->execute();

        $activedons = $query->fetchAll( PDO::FETCH_ASSOC );

        return $activedons;
    }

    public function getActiveUsers() {

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.password, u.phone, u.city_id, u.active_user, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id)
        WHERE u.active_user = 1 AND u.admin = 0
        ORDER BY u.name, u.email ASC
        ");

        $query->execute();

        $active_users = $query->fetchAll( PDO::FETCH_ASSOC );

        return $active_users;

    }

    public function getInactiveUsers() {

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.password, u.phone, u.city_id, u.active_user, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id)
        WHERE u.active_user = 0 AND u.admin = 0
        ORDER BY u.name, u.email ASC
        ");

        $query->execute();

        $blocked_users = $query->fetchAll( PDO::FETCH_ASSOC );

        return $blocked_users;

    }

    public function getBlockedUsers() {

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.password, u.phone, u.city_id, u.active_user, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id)
        WHERE u.active_user = 2 AND u.admin = 0
        ORDER BY u.name, u.email ASC
        ");

        $query->execute();

        $blocked_users = $query->fetchAll( PDO::FETCH_ASSOC );

        return $blocked_users;

    }

    public function getDonByDonID($id) {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.donation_id = ?
        ORDER BY donation_date DESC
        ");

        $query->execute([$id]);

        $results = $query->fetchAll( PDO::FETCH_ASSOC );

        return $results;
    }

    public function updateDonation($data){

        $data = $this->sanitizer($data);
       
        if(
            !empty($data["item"])
        ) {
            $query = $this->db->prepare("
            UPDATE donations
            SET
                item = ?,
                description = ?,
                donation_date = ?,
                category_id = ?,
                city_id = ?
            WHERE 
                donation_id = ?
            ");
            
            $query->execute([
                $data["item"],
                $data["description"],
                $data["donation_date"],
                $data["category_id"],
                $data["city_id"],
                $data["donation_id"]
            ]);

            return $count = $query->rowCount();
        } 
    }

    public function updateDonPhoto($data){

        $data = $this->sanitizer($data);

        $photo = $this->sanitizePhoto($_FILES);

        if($photo === 0 ){
            $message_error = true;

        }else{

            $query = $this->db->prepare("
            UPDATE donations
            SET
                photo = ?
            WHERE 
                donation_id = ?
            ");
            
            $query->execute([
                $photo,
                $data["donation_id"]
            ]);

            return $count = $query->rowCount();   
        }  
    }


}