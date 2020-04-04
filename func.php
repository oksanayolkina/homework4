<?php

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
        </form>
        <br>Don't have an account <a href='/?action=register'>register</a>
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
        </form>
        <br>Have an account <a href='/?action=login'>login</a>
    ";
}

function getUsersList(): array
{
    return [];
}

function createUser(): bool
{
    return true;
}

function readJsonFile( string $filename ): array
{
    return [];
}

function writeJsonFile( array $data  ): array
{
    return [];
}