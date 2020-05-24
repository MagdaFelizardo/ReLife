<?php
require_once("base.php");

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
        ORDER BY donation_date DESC
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
        ORDER BY donation_date DESC
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
        ORDER BY donation_date DESC
        ");

        $query->execute([$id]);

        $doncities = $query->fetchAll( PDO::FETCH_ASSOC );

        return $doncities;
    }

    public function getCategories() {

        $query = $this->db->prepare("
        SELECT category_id, category
        FROM categories
        ");

        $query->execute();

        $categories = $query->fetchAll( PDO::FETCH_ASSOC );

        return $categories;
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
        ORDER BY donation_date DESC
        ");

        $query->execute([$id]);

        $donusers = $query->fetchAll( PDO::FETCH_ASSOC );

        return $donusers;
    }

    public function getDonByDonID($id) {

        $user_id = $_SESSION["user_id"];

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE u.user_id = ? AND d.donation_id = ?
        ORDER BY donation_date DESC
        ");

        $query->execute([$user_id, $id]);

        $results = $query->fetchAll( PDO::FETCH_ASSOC );

        return $results;
    }

    public function getDonation($id) {

        $user_id = $_SESSION["user_id"];

        $query = $this->db->prepare("
        SELECT *
        FROM donations 
        WHERE user_id = ? AND donation_id = ?
        ");

        $query->execute([$user_id, $id]);

        $donation = $query->fetchAll( PDO::FETCH_ASSOC );

        return $donation;
        
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
        ORDER BY donation_date DESC
        ");

        $query->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);

        $items = $query->fetchAll( PDO::FETCH_ASSOC );

        return $items;

    }


    public function giveDonation($data) {

        $data = $this->sanitizer($data);

        $photo = $this->sanitizePhoto($_FILES["photo"]);

        if($photo === 0 ){

            $message_two = true;
            require("views/formdon.php");
            die();
              
        }else{

            $donation_date = date('Y-m-d');
            $user_id = $_SESSION["user_id"];
            $pending_donation = 0;

            if(
                !empty($data["item"]) &&
                !empty($data["category_id"]) &&
                !empty($data["description"]) 
            ) {
                $query = $this->db->prepare("
                    INSERT INTO donations
                    (item, description, photo, donation_date, category_id, city_id, user_id, active) 
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?)
                ");
                
                $query->execute([
                    $data["item"],
                    $data["description"],
                    $photo, 
                    $donation_date,
                    $data["category_id"],
                    $data["city_id"],
                    $user_id,
                    $pending_donation
                ]);

                return $query;
            }
            else{
                return false;
            }
        }
        
    }


    public function updateDonation($data){

        $user_id = $_SESSION["user_id"];
        $active = 1;
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
                city_id = ?,
                user_id = ?,
                active = ?
            WHERE 
                donation_id = ?
            ");
            
            $query->execute([
                $data["item"],
                $data["description"],
                $data["donation_date"],
                $data["category_id"],
                $data["city_id"],
                $user_id,
                $active,
                $data["donation_id"]
            ]);

            return $count = $query->rowCount();
        } 
    }


    public function updateDonPhoto($data){

        $active = 0;
        $data = $this->sanitizer($data);

        $photo = $this->sanitizePhoto($_FILES);

        if($photo === 0 ){
            $message_error = true;

        }else{

            $query = $this->db->prepare("
            UPDATE donations
            SET
                photo = ?,
                active = ?
            WHERE 
                donation_id = ?
            ");
            
            $query->execute([
                $photo,
                $active,
                $data["donation_id"]
            ]);

            return $count = $query->rowCount();   
        }  
    }

    public function deleteDonation($id) {

        $user_id = $_SESSION["user_id"];

        $query = $this->db->prepare("
        DELETE FROM donations
        WHERE user_id = ? AND donation_id = ?
        ");
        $query->execute([$user_id, $id]);
        
        return true;
    }

}