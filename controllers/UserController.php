<?php

require_once ROOT . '/models/User.php';

class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $password_verify = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = trim(htmlspecialchars($_POST['name']));
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $password_verify = trim(htmlspecialchars($_POST['password_verify']));

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = "Имя должно быть не короче 2х символов";
            }
            if (!User::checkEmail($email)) {
                $errors[] = "Email введён неправильно";
            }
            if (!User::checkPassword($password)){
                $errors[] = "Пароль не должен быть меньше 6 символов";
            }
            if (!User::checkPasswordVarify($password, $password_verify)){
                $errors[] = "Пароли не совпадают";
            }
            if(User::checkEmailExist($email)){
                $errors[] = "Такой Email уже существует";
            }

            if($errors == false){
                $result = User::register($name, $email, $password);
            }
        }

        require_once ROOT . '/view/user/register.php';
        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        $email = trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars($_POST['password']));

        $errors = false;

        if(!User::checkEmail($email)){
            $errors[] = "Email не правильный";
        }
        if (!User::checkPassword($password)){
            $errors[] = "Пароль введен неправильно";
        }

        $userId = User::checkUserData($email, $password);

        if($userId == false){
            $errors[] = "Неправильные данные для входа на сайт";
        }else{
            User::auth($userId);
            header('Location: /');
        }

        require_once ROOT . '/view/user/auth.php';
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: /');

        return true;
    }
}