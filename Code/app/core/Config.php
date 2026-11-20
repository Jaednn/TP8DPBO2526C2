<?php

// ambil protokol request
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
// ambil nama host domain
$host = $_SERVER['HTTP_HOST'];
// tentukan path folder relatif terhadap script
$folder = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/';

// definisikan konstanta BASEURL untuk aset dan navigasi link
define("BASEURL", $protocol . $host . $folder);
