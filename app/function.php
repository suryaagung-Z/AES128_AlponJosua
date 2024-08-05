<?php
function encryptAES128($data, $key)
{
    try {
        // Pastikan panjang kunci adalah 16 byte
        if (strlen($key) !== 16) {
            throw new InvalidArgumentException('Kunci harus 16 byte untuk AES-128');
        }

        // Generate IV
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-128-cbc'));

        // Enkripsi data
        $encrypted = openssl_encrypt($data, 'aes-128-cbc', $key, 0, $iv);

        // Encode IV dan hasil enkripsi dalam format base64
        return base64_encode($iv . $encrypted);
    } catch (\Throwable $th) {
        return false;
    }
}

function decryptAES128($data, $key)
{
    try {
        // Pastikan panjang kunci adalah 16 byte
        if (strlen($key) !== 16) {
            throw new InvalidArgumentException('Kunci harus 16 byte untuk AES-128');
        }

        // Decode data dari base64
        $data = base64_decode($data);

        // Pisahkan IV dan data terenkripsi
        $ivLength = openssl_cipher_iv_length('aes-128-cbc');
        $iv = substr($data, 0, $ivLength);
        $encrypted = substr($data, $ivLength);

        // Dekripsi data
        return openssl_decrypt($encrypted, 'aes-128-cbc', $key, 0, $iv);
    } catch (\Throwable $th) {
        return false;
    }
}

function getCurrentKey()
{
    global $conn;

    $res_keys = $conn->query("SELECT * FROM secret_keys");
    $res_key = $res_keys->fetch_assoc()['key'];

    return $res_key;
}
