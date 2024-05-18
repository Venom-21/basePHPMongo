<?php
    class LoginComponent
    {
    
        public $LoginCheckToken;

        public function CheckExistLogin()
        {
            include('config/mysql.inc');
            require_once "config/mongo.php";
            header('Content-Type: application/json');
            $queryTimeZoneUpdate = "SET time_zone = '+05:30'";

            // MONGO DB SECTION
            $mongoClient = connectToMongoDB();
            $database = $mongoClient->selectDatabase('Django');
            $collection = $database->selectCollection('tblUser');

            // Query to find the document by its ObjectId
            $query = ['userPhone' => '9094538125'];
        
            // Find the document
            $document = $collection->findOne($query);
        
            if ($document) {
                echo json_encode($document) . "<br>";
            } else {
                echo "Document not found.<br>";
            }
            exit;

            $secratekey = "ApplicationDocKey";
            $decodeVal = decodeToken($this->LoginCheckToken['hell'], $secratekey);

            $rsdTimeZoneUpdate = mysqli_query($connect_var, $queryTimeZoneUpdate);
            $responseCode = "100";
            $responseMessage = 'STAGE COMPELETE CHECKED FAILED';
            $count = 0;
            try {
                $queryMemberStageCompleted = "SELECT memberID, StageCompleted, memberType, memberPhone, memberName, memberPhoto, memberPassword from tblMember where memberPhone='9840528317'";
                $rsd = mysqli_query($connect_var, $queryMemberStageCompleted);
                $resultArr = array();
                while ($rs = mysqli_fetch_assoc($rsd)) {
                    $resultArr[$count]['MemberID'] = $rs['memberID'];
                    $resultArr[$count]['MemberPhone'] = $rs['memberPhone'];

                    $responseCode = "01";
                    $responseMessage = 'STAGE COMPELETE CHECKED SUCCESSFULLY';
                }

                $payload_info = array(
                    "data" => $resultArr,
                    "message" => $responseMessage
                );
                $encodeToken = encodeToken($payload_info, $secratekey);
                echo json_encode(array("statusCode" => $responseCode, "response" => $encodeToken), JSON_FORCE_OBJECT);
            } catch (PDOException $e) {
                echo json_encode(array("status" => "errors", "message_text" => $e->getMessage()), JSON_FORCE_OBJECT);
            }
        }

    }

    function CheckLogin(array $data)
    {
        $LoginObject = new LoginComponent;
        if ($data) {
            $LoginObject->LoginCheckToken = $data;
            $LoginObject->CheckExistLogin();
        } else
            echo json_encode(array("status" => "error On Login ", "message_text" => "Invalid Input Parameters"), JSON_FORCE_OBJECT);
    }
?>