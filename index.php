<?php

require_once "session.php";
require_once "func.php";

$action = $_GET['action'] ?? 'index';


switch( $action )
{
    case "login":
        if( $_SERVER['REQUEST_METHOD'] === 'GET' )
        {
            echo getLoginView();
        }
        else
        {
            echo "Спроба залогінити користувача";
        }
        break;
    case "register":
        if( $_SERVER['REQUEST_METHOD'] === 'GET' )
        {
            echo getRegisterView();
        }
        else
        {
            $login    = $_POST['login'];
            $password = $_POST['password'];
            createUser( $login, $password );
            echo "Спроба зареєструвати користувача";
        }
        break;
    case "logout":
        session_destroy();
        break;
    case "index":
    default:
        echo "main page";
}