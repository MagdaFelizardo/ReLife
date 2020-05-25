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
                SELECT user_id, email, password
                FROM users
                WHERE email = ? and user_id = 107
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

}