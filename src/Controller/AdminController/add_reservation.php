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
                redirect('../../Admin UI/add_reservations.php', "The time is not within the restaurant's operating hours (10am - 10pm). Please re-enter.", '');
                exit(0);
            }

            $sql = "SELECT table_name, table_id FROM table_list WHERE table_id NOT IN (
                SELECT table_id FROM reservation_list WHERE datetime >= :datetime - INTERVAL 1 HOUR  
                AND (status  = 0 OR status = 1)
            ) AND size >= :size";
        
            
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
                redirect('../../Admin UI/add_reservations.php', ". Please re-enter.", '');
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
