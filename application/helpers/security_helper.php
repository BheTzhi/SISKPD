<?php if (!defined("BASEPATH")) exit("No direct script access allowed");
function encrypt_url($string)
{
    $output = false;
    /*
     * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
     */
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];
    // hash
    $key    = hash("sha256", $secret_key);
    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv     = substr(hash("sha256", $secret_iv), 0, 16);
    //do the encryption given text/string/number
    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}
function decrypt_url($string)
{
    $output = false;
    /*
     * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
     */
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];
    // hash
    $key    = hash("sha256", $secret_key);
    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);
    //do the decryption given text/string/number
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}

function jk($val)
{
    switch ($val) {
        case "l";
            return "Laki-laki";
            break;
        case "p";
            return "Perempuan";
            break;
    }
}

function kd($value)
{
    $awal = substr($value, 0, 2);
    $tengah = substr($value, 2, 2);
    $akhir = substr($value, 4, 3);
    return $awal . $tengah . sprintf("%03s", $akhir + 1);
}

function kodeskpd($value)
{
    $awal = substr($value, 0, 2);
    $tengah = substr($value, 2, 2);
    $akhir = substr($value, 4, 3);
    return $awal . '.' . $tengah . '.' . $akhir;
}

// function kodeprograms($value)
// {
//     $awal = substr($value, 0, 2);
//     $tengah = substr($value, 2, 1);
//     $akhir = substr($value, 3, 2);
//     return $awal . '.' . $tengah . '.' . $akhir;
// }

function kodekegiatan($value)
{
    $awal = substr($value, 0, 2);
    $tengah = substr($value, 2, 2);
    return $awal . '.' . $tengah;
}

function notelp($value)
{
    $awal = substr($value, 0, 4);
    $tengah = substr($value, 4, 4);
    $akhir = substr($value, 8, 4);
    return $awal . '-' . $tengah . '-' . $akhir;
}

function kodenip($value)
{
    $awal = substr($value, 0, 7);
    $tengah1 = substr($value, 7, 6);
    $tengah2 = substr($value, 13, 1);
    $akhir = substr($value, 14, 3);
    return $awal . ' ' . $tengah1 . ' ' . $tengah2 . ' ' . $akhir;
}

function getTanggal($value)
{
    $tahun=substr($value, 0, 4);
    $bulan=substr($value, 5, 2);
    $tanggal=substr($value, 8, 2);

    return $tanggal;
}

function getBulan($value)
{
    $tahun=substr($value, 0, 4);
    $bulan=substr($value, 5, 2);
    $tanggal=substr($value, 8, 2);

    return $bulan;
}

function getTahun($value)
{
    $tahun=substr($value, 0, 4);
    $bulan=substr($value, 5, 2);
    $tanggal=substr($value, 8, 2);

    return $tahun;
}