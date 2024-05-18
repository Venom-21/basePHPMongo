<?php
// mongo_connection.php

require_once "vendor/autoload.php"; // Include Composer's autoloader

use MongoDB\Client;

function connectToMongoDB() {
    try {
        // MongoDB connection parameters
        $mongoClient = new Client('mongodb+srv://aravindraj273:MEvmWJLh4hbCSbuE@djangoproject.c0y4lpx.mongodb.net/');
        
        // Return MongoDB client object
        return $mongoClient;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}
?>
