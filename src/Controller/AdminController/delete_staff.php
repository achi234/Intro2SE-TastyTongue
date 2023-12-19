<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $staff_id = validate($param);

        $staff = getbyId('users', $staff_id);
        if($staff['status'] != 'Data Found')
        {
            redirect('../../Admin UI/staffs.php', $staff['status'], '');
        }
        else
        {
            $deleteStaff = delete('users', $staff_id);
            if($deleteStaff)
            {
                redirect('../../Admin UI/staffs.php', '', "You've deleted staff {$staff['data']['fullname']} !");
            }
            else
            {
                redirect('../../Admin UI/staffs.php', 'Something went wrong. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../Admin UI/staffs.php', 'Something went wrong. Please try again!', '');
    }
?>