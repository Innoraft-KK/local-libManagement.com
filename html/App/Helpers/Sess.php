<?php

namespace App\Helpers;
/**
 * setSession
 *sets session values
 * @param  mixed $data
 * @return void
 */
//session_start();
class Sess{
function setSession($data)
{
    $_SESSION["user"] = $data["id"];
    $_SESSION["email"] = $data["email"];
}
/**
 * isLoggedIn
 *checks if user is logged in or not
 * @return boolean
 */
function isLoggedIn()
{
    if (isset($_SESSION["user_id"])) {
        return true;
    }
    return false;
}
function adminLoggedIn()
{
    if (isset($_SESSION["admin_id"])) {
        return true;
    }
    return false;
}
/**
 * logout
 *destroys and unset session
 * @return void
 */
function logout()
{
    session_unset();
    session_destroy();
}

}