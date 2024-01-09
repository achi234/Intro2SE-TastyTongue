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


            $selectedDateTime = new DateTime($date_time);
        
            $today = new DateTime('now');

            if ($selectedDateTime < $today) 
            {
                redirect('../../Admin UI/update_reservations.php?id='.$reservation_id, 'Cannot book a reservation for a date in the past! Please try again', "");
                exit(0);
            } 
            // Lấy giờ và phút từ thời gian nhập
            $selectedHour = $selectedDateTime->format('H:i');

            // Thiết lập thời gian giới hạn
            $startHour = '10:00';
            $endHour = '22:00';

            // Kiểm tra xem thời gian nhập có nằm trong khoảng từ 10am đến 10pm không
            if ($selectedHour >= $startHour && $selectedHour <= $endHour) {
                echo "Thời gian nhập nằm trong khoảng từ 10am đến 10pm.";
            } else {
                echo "Thời gian nhập không nằm trong khoảng từ 10am đến 10pm.";
                redirect('../../Admin UI/update_reservations.php?id='.$reservation_id, "The time is not within the restaurant's operating hours (10am - 10pm). Please re-enter.", "");
                exit(0);
            }

            $sql = "SELECT table_name, table_id FROM table_list WHERE table_id NOT IN (
                SELECT table_id FROM reservation_list WHERE datetime >= ? - INTERVAL 1 HOUR  
                AND (status  = 0 OR status = 1)
            ) AND size >= ?";
        
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $date_time, $party_size);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Lấy kết quả truy vấn
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            // Kiểm tra nếu $table_id có trong kết quả
            $check = false;
            foreach ($rows  as $row) {
                if ($row['table_id'] == $table_id) {
                    echo "Có trong kết quả";
                    // Thực hiện các hành động khi $table_id có trong kết quả
                    $check = true;
                    break;
                }
            }
            if($check = false){
                redirect('../../Admin UI/update_reservations.php?id='.$reservation_id, ". Please re-enter.", "");
                exit(0);
            }

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