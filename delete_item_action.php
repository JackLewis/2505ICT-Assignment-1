<?php

//Passes data for deleting an item between the client and server//
require "includes/db_defs.php";

#get the item id
$id = $_GET['id'];

#delete the item
$deleted = delete_item($id);

#check the item was deleted and return to the home page
if($deleted == 0) {
    header("Location: index.php");
    exit;
}

?>