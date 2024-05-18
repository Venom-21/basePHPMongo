<?php
    require 'loginComponent.php';
    // CUSTOMER LOGIN
    $f3->route('POST /LoginCheck',
        function($f3) {
            header('Content-Type: application/json');
            $decoded_items =  json_decode($f3->get('BODY'),true);
            if(!$decoded_items == NULL)
                CheckLogin($decoded_items);
            else
                echo json_encode(array("status"=>"error This value","message_text"=>"Invalid input parameters"),JSON_FORCE_OBJECT);
        }
    );
?>