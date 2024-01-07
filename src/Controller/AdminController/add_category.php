<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-addCategory']))
    {
        $category_name = $_POST['category_name'];

        if(empty($category_name))
        {
            redirect('../../Admin UI/add_categories.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $cateCheck = "SELECT * FROM category WHERE category_name ='$category_name'";
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
                'category_name' => $category_name,
            ];

            $result = insert('category', $data);

            if($result)
            {
                redirect('../../Admin UI/categories.php', '', "You've add new category successfully!");
            }
            else
            {
                redirect('../../Admin UI/add_categories.php', '', "Something went wrong! Please enter again...");
            }
        }

    }
?>
