<?php

session_start();

require 'products.php';

// CLEAR CART



if (@$_POST['boom']=="Clear Cart") {
   
    
    
    $_SESSION['cart'] = "";
}

// MODIFY CART

elseif(isset($_POST['update'])) {
    
    foreach($_POST['update'] as $id=>$val){
        
        $val=trim($val);
        if (preg_match('/^[0-9]*$/',$val)){
            
            if($val == 0) {
                
                unset ($_SESSION['cart'][$id]);
                
            } else {
                
                $_SESSION['cart'][$id]=$val;
            }
        }
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head><title>Ryan Smith Ezyvet Test - View Cart</title>
           <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <style>
        
                table {border-collapse:collapse; }
        .num {text-align: right; }
               td, th, div {border: 1px solid black; padding: 4px; }
               
               </style>
               
    </head>
    <body>
        <p> The following items have been added to the cart:</p>    
        
        <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
            <table>
                <tr><th scope="col">Item</th><th scope="col">Name</th><th scope="col">Price</th><th scope="col">Quantity</th>
              
                    
        <?php
        
        $counter = 0;
        $total = 0;
        
        if(@is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $c) {
                
                $counter++;
                echo "<tr><td>{$counter}</td><td>{$products[$id]['name']}</td>",
                        "<td class=\"num\">", "$", number_format($products[$id]['price'],2) ,
                            "</td><td><input type=\"text\" size=\"3\" class=\"num\" ",
                        "name=\"update[{$id}]\" value = \"{$c}\"/></td></tr>\n";
                        
                     
                        
                     $total += $products[$id]['price'] * $c;  
                        
                        
                        
            }
        }
        
  ?>

                    <tr class="num"><td colspan="3">Total:</td>
                        <td><?= "$",number_format($total,2)?></td></tr>
                    
                    <tr class="num"><td colspan="4">
                 
                           <br/><a href="index6.php">Continue shopping</a>
                           
                           
                       
                    
                    <input type ="submit" name ="submit" value ="Update quantities"/>
                    
                    <input type ="submit" name ="boom" value ="Clear Cart"/>
                    
                     
              