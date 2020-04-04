<?php

require_once "session.php";
require_once "func.php";

$action = $_GET['action'] ?? 'index';


switch( $action )
{
    case "login":
        if( $_SERVER['REQUEST_METHOD'] === 'GET' )
        {
            echo "Сторінка ЛОГІН";
        }
        else
        {
            echo "Спроба залогінити користувача";
        }
        break;
    case "register":
        if( $_SERVER['REQUEST_METHOD'] === 'GET' )
        {
            echo "Сторінка РЕЄСТРАЦІЯ";
        }
        else
        {
            echo "Спроба зареєструвати користувача";
        }
        break;
    case "index":
    default:
        echo "main page";
}