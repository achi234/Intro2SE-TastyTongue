
<?php
    $host="localhost";
    $dbuser="root";
    $dbpass="";
    $db="main";
    
    try{
        $conn = mysqli_connect ($host,
                                $dbuser,
                                $dbpass,
                                $db);
    }
    catch(mysqli_sql_exception)
    {
        echo "Could not connect to database";
    }

    if($conn)
    {
        ///echo "You are connected!";
    }
?>