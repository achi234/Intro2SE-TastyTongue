<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $product_id = validate($param);

        $product = getbyKeyValue('products', 'prod_id', $product_id);
        if($product['status'] != 'Data Found')
        {
            redirect('../../Admin UI/products.php', $product['status'], '');
        }
        else
        {
            $deleteProduct = deletebyKeyValue('products', 'prod_id', $product_id);
            if($deleteProduct)
            {
                redirect('../../Admin UI/products.php', '', "You've deleted product {$product['data']['prod_name']} !");
            }
            else
            {
                redirect('../../Admin UI/products.php', 'Something went wrong. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../Admin UI/products.php', 'Something went wrong. Please try again!', '');
    }
?>