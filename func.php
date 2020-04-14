<?php

const USERS_FILE = "users.json";

function getLoginView(): string
{

    $html = "";

    if( isset( $_GET['error'] ) )
    {
        $html .= "<span style='color: red'>" . $_GET['error'] . "</span>";
    }

    $html .= "<h2>Login</h2>
        <form action='/?action=login' method='POST'>
            <br>
            <input type='text' name='login' placeholder='Login'>
            <br>
            <input type='password' name='password' placeholder='Password'>
            <br>
            <input type='submit' name='Register'>
        </form><br>Don't have an account <a href='/?action=register'>register</a>
    ";

    return $html;
}

function getRegisterView(): string
{
    return "<h2>Register</h2>
        <form action='/?action=register' method='POST'>
            <br>
            <input type='text' name='login' placeholder='Login'>
            <br>
            <input type='password' name='password' placeholder='Password'>
            <br>
            <input type='submit' name='Register'>
        </form><br>Have an account <a href='/?action=login'>login</a>
    ";
}

function createUser( string $login, string $password ): bool
{
    $newUser = [
        'login'    => $login,
        'password' => md5( $password ),
    ];


    $users   = readJsonFile( USERS_FILE );
    $users[] = $newUser;
    writeJsonFile( $users, USERS_FILE );

    $_SESSION['data']['user'] = $newUser;
    header( "Location: /" );

    return true;
}

function loginUser( string $login, string $pass )
{
    $users = readJsonFile( USERS_FILE );

    foreach( $users as $user )
    {
        if( $user['login'] === $login && $user['password'] === md5( $pass ) )
        {
            echo "User found {$user['login']}";
            $_SESSION['data']['user'] = $user;
            header( "Location: /" );

            return;
        }
    }

    header( "Location: /?action=login&error=User not found" );
}

function readJsonFile( string $fileName ): array
{
    return json_decode( ( file_get_contents( $fileName ) ?? '[]' ), true ) ?? [];
}

function writeJsonFile( array $data, string $fileName ): void
{
    $jsonString = json_encode( $data );
    file_put_contents( $fileName, $jsonString );
}

function getMainPageView()
{
    if( isset( $_SESSION['data']['user']['login'] ) )
    {
        return "Welcome back, " . $_SESSION['data']['user']['login'] . " You can <a href='/?action=logout'>Logout</a>";
    }

    return "Hello ANON, you can <a href='/?action=login'>login</a> or <a href='/?action=register'>register</a>";
}