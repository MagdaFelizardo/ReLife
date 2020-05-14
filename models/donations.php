<?php
require("base.php");

class Donation extends Base {

    public function getList() {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 1
        ORDER BY d.date DESC
        ");

        $query->execute();

        $donations = $query->fetchAll( PDO::FETCH_ASSOC );

        return $donations;
    }

    public function getListByTag($id) {

        $query = $this->db->prepare("
        SELECT 
            d.donation_id, d.item, d.description, d.photo, d.date, 
            u.user_id, u.name, u.email, u.phone, 	
            c.category_id, c.category, ci.city_id, ci.city
        FROM donations AS d
            INNER JOIN cities AS ci USING(city_id)
            INNER JOIN users AS u USING(user_id)
            INNER JOIN categories AS c USING(category_id)
        WHERE d.active = 1 AND c.category_id = ?
        ORDER BY d.date DESC
        ");

        $query->execute($id);

        $doncity = $query->fetchAll( PDO::FETCH_ASSOC );

        return $dontag;
    }

};

