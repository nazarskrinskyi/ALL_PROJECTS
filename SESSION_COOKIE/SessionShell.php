<?php

namespace OOP\SESSION_COOKIE;

class SessionShell
{
    public function __construct()
    {
        if (!isset($_SESSION)){
            session_start();
        }
    }

    public function SetSession(string $name, int|string $value):void
    {
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $value;
        }
        else exit('session is already exist');
    }

    public function GetSession(string $name): string|int
    {
        if (isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }

    public function DelSession(string $name):void
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
        }
    }

    public function destroy():void
    {
        session_destroy();
    }
}