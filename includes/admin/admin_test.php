
<?php

    include("../../controllers/important/connect_DB.php");

$dbConn = new DbClass();
    $eConnect = $dbConn->connect();
        if ($eConnect == true) {
            $aRegVal = ['f_name' => "Test5", 'l_name' => "Testing5", 'username' => "Testing5", 'email' => "test5@test.com", 'password' => "Testing2", 'default_shipping_address' => "123 Address", 'billing_address' => "321"];
            $aWhere = ['id' => "1"];
            $aInsert = $dbConn->update($eConnect, 'users', $aRegVal, $aWhere);


            $qInsert = $dbConn->select($eConnect, 'users', '');
            echo "insert success";
        } else {
            echo "not connected";
        }