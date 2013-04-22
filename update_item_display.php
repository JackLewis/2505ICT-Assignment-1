<?php

//Configures the Smarty template for the update item page//
require "includes/defs.php";
require "Smarty.class.php";

#get the item id
$id = $_GET['id'];

#retrieve the list of categories
$categories = get_categories();

#retrieve the item details
$item = get_item($id);

#initiate the Smarty template and define the variables
$smarty = new Smarty;
$smarty->assign("categories", $categories);
$smarty->assign("item", $item);
$smarty->display("update_item.tpl");

?>