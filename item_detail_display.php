<?php

//Configures the Smarty template for the item detail page//
require "includes/defs.php";
require "Smarty.class.php";

#get the item id
$id = $_GET['id'];

#retrieve the item details
$item = get_item($id);

#retrieve the item category
$category = get_category($item['categoryID']);

#initiate the Smarty template and define the variables
$smarty = new Smarty;
$smarty->assign("item", $item);
$smarty->assign("category", $category);
$smarty->display("item_detail.tpl");

?>