<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateProduct']))
    {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_category = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $prod_img = $_FILES['product_image']['name'];
        $product_description = $_POST['product_description'];
        $product_status = $_POST['product_status'];




        if(empty($product_name) || empty($product_category) || empty($product_price) || empty($product_description))
        {
            redirect('../../Staff UI/update_products.php?id='.$product_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $productCheck = "SELECT * FROM products WHERE prod_name ='$product_name'";
            $compile_productCheck = mysqli_query($conn, $productCheck);
            if($compile_productCheck)
            {
                if(mysqli_num_rows($compile_productCheck) > 1)
                {
                    redirect('../../Staff UI/update_products.php?id='.$product_id, '{$product_name} has already created.', '');
                    exit(0);
                }
            }
            if(!empty($prod_img))
            {
                move_uploaded_file($_FILES["product_image"]["tmp_name"], "../../assets/image/products/" . $_FILES["product_image"]["name"]);
            }
            else
            {
                $product = getbyKeyValue('products', 'prod_id', $product_id);
                $prod_img = $product['data']['prod_img'];
            }
            $data = [
                'prod_name' => $product_name,
                'prod_cat' => $product_category,
                'prod_price'    => $product_price,
                'prod_img'    => $prod_img,
                'prod_desc'     => $product_description,
                'status'     => $product_status,
            ];

            $result = updatebyKeyValue('products','prod_id',$product_id, $data);

            if($result)
            {
                redirect('../../Staff UI/products.php', '', "You've modified product successfully!");
            }
            else
            {
                redirect('../../Staff UI/update_products.php?id='.$product_id, '', "Something went wrong! Please enter again...");
            }
        }

    }
?>
