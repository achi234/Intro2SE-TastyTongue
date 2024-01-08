<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-addReservation']))
    {
        $user_id = $_POST['user_id'];
        $table_id = $_POST['table_id'];
        $party_size = $_POST['party_size'];
        $date_time = $_POST['date_time'];
        $status = $_POST['status'];



        if(empty($user_id) || empty($table_id) || empty($party_size) || empty($date_time)|| !isset($status))
        {
            redirect('../../Admin UI/add_reservations.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            if($party_size <= 0)
            {
                redirect('../../Admin UI/add_reservations.php', 'Party size should be above 0.', '');
                exit(0);
            }

            $selectedDateTime = new DateTime($date_time);
        
            $today = new DateTime('now');

            if ($selectedDateTime < $today) 
            {
                redirect('../../Admin UI/add_reservations.php', 'Cannot book a reservation for a date in the past! Please try again', '');
                exit(0);
            } 

            $data = [
                'user_id' => $user_id,
                'table_id' => $table_id,
                'party_size'    => $party_size,
                'datetime'    => $date_time,
                'status'     => $status,
            ];

            $result = insert('reservation_list', $data);

            if($result)
            {
                redirect('../../Admin UI/reservations.php', '', "You've add new reservation successfully!");
            }
            else
            {
                redirect('../../Admin UI/add_reservations.php', '', "Something went wrong! Please enter again...");
            }
        }

    }
?>
