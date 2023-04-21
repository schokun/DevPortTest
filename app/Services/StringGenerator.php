<?php

namespace App\Services;

class StringGenerator
{
    /**
     * @return string
     */
    public function generateUniqueString(): string
    {
        $bytes = openssl_random_pseudo_bytes(20);

        return bin2hex($bytes);
    }
}
