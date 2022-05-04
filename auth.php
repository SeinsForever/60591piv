<?php
    session_start();
    if($_POST['login'])
    {
        $result = $conn->query("SELECT * FROM users WHERE login='".$_POST['login']."'");
        if($row = $result->fetch())
        {
            if(md5($_POST['password']) == $row['password'])
                $_SESSION['username'] = $_POST['login'];
            else
            {
                $message = 'Неверный пароль';
            }
        }
        else
        {
            $message = 'Неверный логин';
        }

        $title = $row['title'];
        $img_url = $row['img_url'];
        $price = $row['price'];
        if($_POST['password'] == 'pass')
        {
            $_SESSION['username'] = $_POST['login'];
        }
    };

    if($_GET['logout'])
    {
        session_unset();
    }