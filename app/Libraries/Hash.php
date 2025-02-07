<?php

namespace App\Libraries;

class Hash
{
    // Hash the password
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    // Verify the password
    public static function verify($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }

    // Check if rehashing is needed
    public static function needsRehash($hashedPassword)
    {
        return password_needs_rehash($hashedPassword, PASSWORD_BCRYPT);
    }
}