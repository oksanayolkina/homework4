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
        <form action='/?action=login' method='POST'><br>
            <input type='text' name='login' placeholder='Login'><br><br>
            <input type='password' name='password' placeholder='Password'><br><br>
            <input type='submit' name='register' value='Увійти'>
        </form>
        <br>Don't have an account <a href='/?action=register'>register</a>
    ";

    return $html;
}

function getRegisterView(): string
{
    return "<h2>Register</h2>
        <form action='/?action=register' method='POST'><br>
            <input type='text' name='login' placeholder='Login'><br><br>
            <input type='password' name='password' placeholder='Password'><br><br>
            <input type='submit' name='register' value='Зареєструватися'>
        </form>
        <br>Have an account <a href='/?action=login'>login</a>
    ";
}

function getUsersList(): array
{
    return [];
}

function createUser( string $login, string $password ): bool
{
    $newUser =
    [
        'login'    => $login,
        'password' => md5( $password )
    ];

    $users = readJsonFile( USERS_FILE );
    $users[] = $newUser;
    writeJsonFile($users, USERS_FILE);

    return true;
}

function readJsonFile( string $filename ): array
{
    return json_decode( ( file_get_contents( $filename ) ?? '[]' ), true ) ?? [];
}

function writeJsonFile( array $data, string $filename ): void
{
    $jsonString = json_encode( $data );
    file_put_contents( $filename , $jsonString );
}