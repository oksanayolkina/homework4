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
            $login = $_POST['login'];
            $password = $_POST['password'];
            loginUser($login, $password);
        }
        break;
    case "register":
        if( $_SERVER['REQUEST_METHOD'] === 'GET' )
        {
            echo getRegisterView();
        }
        else
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            createUser($login, $password);
            echo "I WILL TRY TO REGISTER USER";
        }
        break;
    case "logout":
        session_destroy();
        header( "Location: /" );
        break;
    case "index":
    default:
        echo getMainPageView();
}