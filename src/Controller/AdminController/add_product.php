<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-addProduct']))
    {
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $prod_img = $_FILES['product_image']['name'];
        $product_description = $_POST['product_description'];




        if(empty($product_name) || empty($product_category) || empty($product_price) || empty($product_description))
        {
            redirect('../../Admin UI/add_products.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $productCheck = "SELECT * FROM products WHERE prod_name ='$product_name'";
            $compile_productCheck = mysqli_query($conn, $productCheck);
            if($compile_productCheck)
            {
                if(mysqli_num_rows($compile_productCheck) > 0)
                {
                    redirect('../../Admin UI/add_products.php', '{$product_name} has already register. Please choose another email', '');
                    exit(0);
                }
            }

            move_uploaded_file($_FILES["product_image"]["tmp_name"], "../../assets/image/products/" . $_FILES["product_image"]["name"]);

            $data = [
                'prod_name' => $product_name,
                'prod_cat' => $product_category,
                'prod_price'    => $product_price,
                'prod_img'    => $prod_img,
                'prod_desc'     => $product_description,
            ];

            $result = insert('products', $data);

            if($result)
            {
                redirect('../../Admin UI/products.php', '', "You've created product successfully!");
            }
            else
            {
                redirect('../../Admin UI/add_products.php', '', "Something went wrong! Please enter again...");
            }
        }

    }
?>
