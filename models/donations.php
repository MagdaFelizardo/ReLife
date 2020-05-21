<?php
require("base.php");

class Donation extends Base {

    public function getList() {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 1
        ORDER BY date DESC
        ");

        $query->execute();

        $donations = $query->fetchAll( PDO::FETCH_ASSOC );

        return $donations;
    }

    public function getListByTag($id) {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 1 AND c.category_id = ?
        ORDER BY date DESC
        ");

        $query->execute([$id]);

        $dontags = $query->fetchAll( PDO::FETCH_ASSOC );

        return $dontags;
    }


    public function getListByCity($id) {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 1 AND ci.city_id = ?
        ORDER BY date DESC
        ");

        $query->execute([$id]);

        $doncities = $query->fetchAll( PDO::FETCH_ASSOC );

        return $doncities;
    }

    public function getListByUsers($id) {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 1 AND u.user_id = ?
        ORDER BY date DESC
        ");

        $query->execute([$id]);

        $donusers = $query->fetchAll( PDO::FETCH_ASSOC );

        return $donusers;
    }

    public function searchItem($search) {

        $search = $this->sanitizeSearch($search);

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE item LIKE ? OR 
              d.description LIKE ? OR 
              c.category LIKE ? OR 
              ci.city LIKE ?
        ORDER BY date DESC
        ");

        $query->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);

        $items = $query->fetchAll( PDO::FETCH_ASSOC );

        return $items;

    }


    public function giveDonation($data) {

        // $data = $this->sanitizer($data);
        $donation_date = date('Y-m-d');
        $user_id = $_SESSION["user_id"];
        $pending_donation = 0;

        // if(
        //     !empty($data["name"]) &&
        //     !empty($data["email"]) &&
        //     filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
        //     !empty($data["password"]) &&
        //     mb_strlen($data["password"]) > 5 &&
        //     mb_strlen($data["password"]) <= 1000 &&
        //     $data["password"] === $data["rep-password"]
        // ) {

            $query = $this->db->prepare("
                INSERT INTO donations
                (item, description, donation_date, category_id, city_id, user_id, active) 
                VALUES(?, ?, ?, ?, ?, ?)
            ");
            
            $query->execute([
                $data["item"],
                $data["description"],
                // $data["photo"], 
                $donation_date,
                $data["category_id"],
                $data["city_id"],
                $user_id,
                $pending_donation
            ]);

            return $query;
            
        // }        
    }

};