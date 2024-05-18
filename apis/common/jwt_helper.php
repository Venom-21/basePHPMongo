<?php
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

    function encodeToken($endcodeToken, $secratekey) {
        $encodeTokn = JWT::encode($endcodeToken, $secratekey, 'HS512');
        return $encodeTokn;
    }

    function decodeToken($token, $secratekey) {
        $returnData = '';
        try{
            $decodeToken = JWT::decode($token, new Key($secratekey, 'HS512'));
            $returnData = $decodeToken;
        } catch(Exception $ex) {
            $returnData = $ex->getMessage();
        }
        return $returnData;
    }
?>
