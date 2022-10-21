<?php

function geser_teks($string, $key) {
    return implode('', array_map(function ($char) use ($key) {
        return geser_karakter($char, $key);
    }, str_split($string)));
}

function geser_karakter($char, $shift) {
    $shift = $shift % 25;
    $ascii = ord($char);
    $shifted = $ascii + $shift;

    if ($ascii >= 65 && $ascii <= 90) {
        return chr(geser_huruf_besar($shifted));
    }

    if ($ascii >= 97 && $ascii <= 122) {
        return chr(geser_huruf_kecil($shifted));
    }

    if ($ascii >= 33 && $ascii <= 58) {
        return chr(geser_angka($shifted));
    }

    return chr($ascii);
}

function geser_angka($ascii) {
    if ($ascii < 33) {
        $ascii = 59 - (33 - $ascii);
    }

    if ($ascii > 58) {
        $ascii = ($ascii - 58) + 32;
    }
    return $ascii;
}

function geser_huruf_besar($ascii) {
    if ($ascii < 65) {
        $ascii = 91 - (65 - $ascii);
    }

    if ($ascii > 90) {
        $ascii = ($ascii - 90) + 64;
    }

    return $ascii;
}

function geser_huruf_kecil($ascii) {
    if ($ascii < 97) {
        $ascii = 123 - (97 - $ascii);
    }

    if ($ascii > 122) {
        $ascii = ($ascii - 122) + 96;
    }

    return $ascii;
}

function enkripsi($nisn, $key = 12) {
    return geser_teks($nisn, $key);
}

function dekripsi($ciphertext, $key = -12) {
    return geser_teks($ciphertext, -$key);
}