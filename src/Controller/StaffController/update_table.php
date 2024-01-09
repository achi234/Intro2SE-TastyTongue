<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateTable']))
    {
        $table_id = $_POST['table_id'];
        if(empty($_POST['table_name']) || empty($_POST['table_size']) || !isset($_POST['table_status'])|| empty($_POST['table_desc']) )
        {
            redirect('../../Staff UI/update_tables.php?id='.$table_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $table_name = $_POST['table_name'];
            $table_size = $_POST['table_size'];
            $table_status = $_POST['table_status'];
            $table_desc = $_POST['table_desc'];
        
            $data = [
                'table_name' => $table_name,
                'size' => $table_size,
                'status'    => $table_status,
                'description'    => $table_desc,
            ];

            $result = updatebyKeyValue('table_list','table_id',$table_id, $data);

            if($result)
            {
                redirect('../../Staff UI/tables.php', '', "You've modified table successfully!");
            }
            else
            {
                redirect('../../Staff UI/update_tables.php?id='.$table_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>