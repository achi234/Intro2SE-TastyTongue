<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateCategory']))
    {
        $category_id = $_POST['category_id'];
        if(empty($_POST['category_name']))
        {
            redirect('../../Admin UI/update_categories.php?id='.$category_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $category_name = $_POST['category_name'];

            $data = [
                'category_name' => $category_name,
            ];

            $result = updatebyKeyValue('category', 'category_id', $category_id, $data);

            if($result)
            {
                redirect('../../Admin UI/categories.php', '', "You've modified category successfully!");
            }
            else
            {
                redirect('../../Admin UI/update_categories.php?id='.$category_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>