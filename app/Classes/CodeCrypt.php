<?php

namespace App\Classes;

class CodeCrypt {

    const KEY = 'w3-devmaster';

    public static function encode(string $data, string $passkey = null): string
    {
        $key = $passkey == null ? self::KEY : $passkey;
        $key = sha1($key);
        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }

    public static function decode(string $encoded, string $passkey = null): bool|string
    {
        $key = $passkey == null ? self::KEY : $passkey;
        $key = sha1($key);
        $decoded = base64_decode($encoded);
        $iv = substr($decoded, 0, 16);
        $encrypted = substr($decoded, 16);
        try {
            return openssl_decrypt($encrypted, 'AES-256-CBC', $key, 0, $iv);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
