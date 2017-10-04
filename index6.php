<?php

// Open cart session

session_start();


// Include product library (in this case array)

require 'products.php';

// Add to cart

if (isset($_GET['add'])) {
    @$_SESSION['cart'][$_GET['add']]++;
}

// Cart session calcs

$total_num = 0;
$total_value = 0;

// Do not calc if cart has been emptied

if(@is_array($_SESSION['cart']))
foreach (@$_SESSION['cart'] as $id => $count) {
    $total_value += $products[$id]['price'] * $count;
    $total_num += $count;
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title>Ryan Smith Ezyvet Test - View Products</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <style>
        table {border-collapse:collapse; }
        .num {text-align: right; }
        #cart {float: right; text-align: center;}
        td, th, div {border: 1px solid black; padding: 4px; }
        
     
    .button {
        display: block; padding: 2px 5px; background-color: #0A0A0A;
        color: white; text-decoration: none;
        border-style: solid; border-width: 4px;
        border-bottom-color: #000099; border-right-color: #000099;
        border-top-color: #0066FF; border-left-color: #0066FF;
        
    }
    
    </style>
    
        </head>
    <body>
        
        <div id="cart"> Items in your cart: <? =$total_num ?>
            <br/>Total cart value $<?=number_format($total_value,2)?>
            <br/><a href="cart.php">View your cart</a>
        </div>
        
        <p><b>Welcome to Ryan's basic shopping cart test!</b></p>
        
        <p>Functionality as follows:</p>
         <p>Add products to the cart - multiple clicks results in multiple quantities.</p>
         <p>Cart total is updated and displayed to the right.</p>
         <p>Navigate to the cart to toggle quantities (0 to remove) or clear the entire cart.</p>
        
        <br></br>
        <p><b>Please add products below:</b></p>
        <table>
            <tr><th scope="col">Item</th><th scope="col">Name</th>
                <th scope ="col">Price</th>
            
            <?php
            
            // Present product array
            
            $counter = 0;
            foreach ($products as $id=>$p){
                
                $counter++;
                echo"<tr><td>{$counter}</td><td>{$p['name']}</td><td class=\"num\">","$",
                        number_format($p['price'],2) , "</td>";
                
             
            // Add to cart functionality
                
                echo"<td><a class=\"button\"
                href=\"{$_SERVER['PHP_SELF']}?add={$id}\">Add to cart</a></td></tr>\n";
                
                
            }
            ?>
            
        </table>
    </body>
</html>

       <?php>
       