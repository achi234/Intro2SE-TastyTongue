<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-addTable']))
    {
        $table_name = $_POST['table_name'];
        $description = $_POST['table_desc'];
        $size = $_POST['table_size'];
        $status = $_POST['status'];
        echo $table_name ;
        echo $description ;
        echo $size ;
        echo $status ;

        if(empty($table_name) || empty($table_size) || !isset($status))
        {
            //redirect('../../Admin UI/add_tables.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $cateCheck = "SELECT * FROM table_list WHERE table_name ='$table_name'";
            $compile_cateCheck = mysqli_query($conn, $cateCheck);
            if($compile_cateCheck)
            {
                if(mysqli_num_rows($compile_cateCheck) > 0)
                {
                    redirect('../../Admin UI/add_categories.php', 'Category has already existed. Please choose another name', '');
                    exit(0);
                }
            }

            $data = [
                'table_name' => $table_name,
                'size' => $size,
                'description' => $description,
                'status' => $status
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
