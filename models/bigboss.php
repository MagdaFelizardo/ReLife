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


    /////DONATION/////


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

        if(
            (isset($photo)) &&
            ($photo != NULL || 
            $photo != false ) 
            ){

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


    public function approveDon($id){
       
        $query = $this->db->prepare("
        UPDATE donations
        SET
            active = 1
        WHERE 
            donation_id = ?
        ");
        
        $query->execute([$id]);

        return $count = $query->rowCount();
    }

    public function disapproveDon($id){
       
        $query = $this->db->prepare("
        UPDATE donations
        SET
            active = 0
        WHERE 
            donation_id = ?
        ");
        
        $query->execute([$id]);

        return $count = $query->rowCount();
    }

    public function deleteDonation($id) {

        $query = $this->db->prepare("
        DELETE FROM donations
        WHERE donation_id = ?
        ");
        $query->execute([$id]);
        
        return true;
    }

    public function searchPendingDons($search) {

        $search = $this->sanitizeSearch($search);

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, d.active,
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE ( item LIKE ? OR 
              d.description LIKE ? OR 
              c.category LIKE ? OR 
              ci.city LIKE ? )
              AND active = 0
        ORDER BY donation_date DESC
        ");

        $query->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);

        $items = $query->fetchAll( PDO::FETCH_ASSOC );

        return $items;
    }

    public function searchActiveDons($search) {

        $search = $this->sanitizeSearch($search);

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.donation_date, d.active,
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE ( item LIKE ? OR 
              d.description LIKE ? OR 
              c.category LIKE ? OR 
              ci.city LIKE ? )
              AND active = 1
        ORDER BY donation_date DESC
        ");

        $query->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);

        $items = $query->fetchAll( PDO::FETCH_ASSOC );

        return $items;
    }


    //////USERS////////

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

    public function getUser($data) {

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.password, u.phone, u.city_id, u.active_user, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id)
        WHERE (u.active_user = 1 || u.active_user = 0)  AND u.user_id = ?
        ");

        $query->execute([$data]);

        $user = $query->fetch( PDO::FETCH_ASSOC );

        return $user;

    }

    public function getBlockedUser($user_id) {

        $query = $this->db->prepare("
        SELECT user_id, name
        FROM users 
        WHERE active_user = 2 AND user_id = ?
        ");

        $query->execute([$user_id]);

        $blocked_user = $query->fetch( PDO::FETCH_ASSOC );

        return $blocked_user;

    }

    public function updateUser($data){

        $data = $this->sanitizer($data);

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
            $data["user_id"]
        ]);

        return $count = $query->rowCount();
        }
    }


    public function blockUser($user_id){

    $query = $this->db->prepare("
        UPDATE users
        SET
            active_user = 2
        WHERE 
            user_id = ?
    ");
    
    $query->execute([
        $user_id
    ]);


    $query2 = $this->db->prepare("
        UPDATE donations
        SET
            active = 2
        WHERE 
            user_id = ?
    ");
    
    $query2->execute([
        $user_id
    ]);

    return $count = $query->rowCount() && $count2 = $query2->rowCount();

    }

    public function unblockUser($user_id){

        $query = $this->db->prepare("
            UPDATE users
            SET
                active_user = 1
            WHERE 
                user_id = ?
        ");
        
        $query->execute([
            $user_id
        ]);
    
    
        $query2 = $this->db->prepare("
            UPDATE donations
            SET
                active = 1
            WHERE 
                user_id = ?
        ");
        
        $query2->execute([
            $user_id
        ]);
    
        return $count = $query->rowCount() && $count2 = $query2->rowCount();
    
        }

    public function deactivateUser($user_id){

        $query = $this->db->prepare("
            UPDATE users
            SET
                active_user = 0
            WHERE 
                user_id = ?
        ");
        
        $query->execute([
            $user_id
        ]);
    
    
        $query2 = $this->db->prepare("
            UPDATE donations
            SET
                active = 0
            WHERE 
                user_id = ?
        ");
        
        $query2->execute([
            $user_id
        ]);
    
        return $count = $query->rowCount() && $count2 = $query2->rowCount();
    
    }

    public function activateUser($user_id){

        $query = $this->db->prepare("
            UPDATE users
            SET
                active_user = 1
            WHERE 
                user_id = ?
        ");
        
        $query->execute([
            $user_id
        ]);
    
    
        $query2 = $this->db->prepare("
            UPDATE donations
            SET
                active = 1
            WHERE 
                user_id = ?
        ");
        
        $query2->execute([
            $user_id
        ]);
    
        return $count = $query->rowCount() && $count2 = $query2->rowCount();
    
    }

    public function searchActiveUsers($search) {

        $search = $this->sanitizeSearch($search);

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.phone, u.city_id, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id) 
        WHERE ( u.name LIKE ? OR 
              u.email LIKE ? OR 
              u.phone LIKE ? OR 
              ci.city LIKE ? )
              AND u.active_user = 1 
              AND u.admin = 0
        ORDER BY u.name DESC
        ");

        $query->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);

        $activeusers = $query->fetchAll( PDO::FETCH_ASSOC );

        return $activeusers;
    }


    public function searchInactiveUsers($search) {

        $search = $this->sanitizeSearch($search);

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.phone, u.city_id, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id) 
        WHERE ( u.name LIKE ? OR 
              u.email LIKE ? OR 
              u.phone LIKE ? OR 
              ci.city LIKE ? )
              AND u.active_user = 0 
              AND u.admin = 0
        ORDER BY u.name DESC
        ");

        $query->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);

        $inactiveusers = $query->fetchAll( PDO::FETCH_ASSOC );

        return $inactiveusers;
    }

    public function searchBlockedUsers($search) {

        $search = $this->sanitizeSearch($search);

        $query = $this->db->prepare("
        SELECT 
            u.user_id, u.name, u.email, u.phone, u.city_id, u.register_date, ci.city
        FROM users AS u
            INNER JOIN cities AS ci USING(city_id) 
        WHERE ( u.name LIKE ? OR 
              u.email LIKE ? OR 
              u.phone LIKE ? OR 
              ci.city LIKE ? )
              AND u.active_user = 2 
              AND u.admin = 0
        ORDER BY u.name DESC
        ");

        $query->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);

        $blockedusers = $query->fetchAll( PDO::FETCH_ASSOC );

        return $blockedusers;
    }

}