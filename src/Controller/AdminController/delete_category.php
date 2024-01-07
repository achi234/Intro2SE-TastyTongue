<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $category_id = validate($param);

        $category = getbyKeyValue('category', 'category_id',$category_id);
        if($category['status'] != 'Data Found')
        {
            redirect('../../Admin UI/categories.php', $category['status'], '');
        }
        else
        {
            $deletCategory = deletebyKeyValue('category', 'category_id',$category_id);
            if($deletCategory)
            {
                redirect('../../Admin UI/categories.php', '', "You've deleted category {$category['data']['category_name']} !");
            }
            else
            {
                redirect('../../Admin UI/categories.php', 'Something went wrong. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../Admin UI/categories.php', 'Something went wrong. Please try again!', '');
    }
?>