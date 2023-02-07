<?php

namespace OOP\SESSION_COOKIE;

class CookieShell
{
    protected string|int $value;

    public function setCookie(string $CookieName, string|int $CookieValue, int $CookieTime): void
    {
        $this->value = $CookieValue;
        setcookie($CookieName, $CookieValue, $CookieTime);
        $_COOKIE[$CookieName] = $CookieValue;
    }

    public function getCookie(string $CookieName): string|null
    {
        return $_COOKIE[$CookieName] ?? null;
    }

    public function delCookie(string $CookieName): void
    {
        setcookie($CookieName, expires_or_options: time() - 3600 * 100);
    }

    public function counter():int|string
    {
        $counter = $_COOKIE['counter'] ?? 0;
        if ($counter == 10) $counter = 0;
        $counter++;
        setcookie('counter',$counter,time() + 3600);
        $_COOKIE[$counter] = $counter;
        return $_COOKIE[$counter];
    }
}
