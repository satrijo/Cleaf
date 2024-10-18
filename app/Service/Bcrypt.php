<?php

namespace Cleaf\Service;

class Bcrypt
{
    public function hash($password)
    {
        if (empty($password)) {
            return null;
        }
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
