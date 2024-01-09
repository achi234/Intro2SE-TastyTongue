<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-addTable']))
    {
        $table_name = $_POST['table_name'];
        $table_size = $_POST['table_size'];
        $table_desc = $_POST['table_desc'];
        $status = $_POST['status'];



        if(empty($table_name) || empty($table_size) || empty($table_desc) || !isset($status))
        {
            redirect('../../Admin UI/add_tables.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            if($table_size <= 0)
            {
                redirect('../../Admin UI/add_tables.php', 'Table size should be above 0.', '');
                exit(0);
            }

            $data = [
                'table_name' => $table_name,
                'size'    => $table_size,
                'description'    => $table_desc,
                'status'     => $status,
            ];

            $result = insert('table_list', $data);

            if($result)
            {
                redirect('../../Admin UI/tables.php', '', "You've add new table {$table_name} successfully!");
            }
            else
            {
                redirect('../../Admin UI/add_tables.php', '', "Something went wrong! Please enter again...");
            }
        }

    }
?>