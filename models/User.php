<?php


class User
{
    public static function checkName($name)
    {
        if (strlen($name) > 2) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkPasswordVarify($password, $password1)
    {
        if ($password === $password1) {
            return true;
        }
        return false;
    }

    public static function checkEmailExist($email)
    {
        $db = Db::getConection();

        $sql = 'SELECT COUNT(*) FROM users WHERE user_email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;

        return false;

    }

    public static function register($name, $email, $password)
    {
        $db = Db::getConection();

        $password_hesh = password_hash($password, PASSWORD_DEFAULT);
        $date_reg = date("Y-m-d");

        $sql = 'INSERT INTO users(user_name, user_pass, user_data_reg, user_email) 
                    VALUES (:name, :password, :date, :email)';

        $result = $db->prepare($sql);
        $result->bindParam('name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password_hesh, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':date', $date_reg, PDO::PARAM_STR);

        unset($password_hesh);
        $result->execute();

        return true;
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConection();

        $sql = 'SELECT * FROM users WHERE user_email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if ($user) {

            if (password_verify($password, $user['user_pass'])) {
                return $user['user_id'];
            }
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

}