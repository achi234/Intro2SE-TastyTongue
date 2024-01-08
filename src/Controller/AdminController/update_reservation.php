<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateReservation']))
    {
        $reservation_id = $_POST['reservation_id'];
        // echo $_POST['table_id'];
        // echo "<br>";
        // echo $_POST['party_size'];
        // echo "<br>";

        // echo $_POST['date_time'];
        // echo "<br>";

        // echo $_POST['status'];
        
        if( empty($_POST['table_id']) || empty($_POST['party_size']) || empty($_POST['date_time'])  || !isset($_POST['status']) )
        {
            redirect('../../Admin UI/update_reservations.php?id='.$reservation_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            //$user_id = $_POST['user_id'];
            $table_id = $_POST['table_id'];
            $party_size = $_POST['party_size'];
            $date_time = $_POST['date_time'];
            $status = $_POST['status'];

            $data = [
                //'user_id' => $user_id,
                'table_id' => $table_id,
                'party_size'    => $party_size,
                'datetime'    => $date_time,
                'status'    => $status,
            ];

            $result = updatebyKeyValue('reservation_list','reservation_id', $reservation_id, $data);

            if($result)
            {
                redirect('../../Admin UI/reservations.php', '', "You've modified reservation with ID " .$reservation_id. " successfully!");
            }
            else
            {
                redirect('../../Admin UI/update_reservations.php?id='.$reservation_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>