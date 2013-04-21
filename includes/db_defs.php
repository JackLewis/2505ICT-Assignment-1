<?php
//Database search and CRUD functions//
require "db_access.php"

//Search the database using the user's search term
function db_search($search, $category) {
    $connection = mysql_open();
    
    #sanitise user input
    $search = mysql_escape_string($search);
    $category = mysql_escape_string($category);
    
    #connect to the database and query it
    $query = "select distinct itemID, name from items where categoryID='$category' and (name like '%$search%' or description like '%$search%' or vendor like '%$search%')";
    $result = mysql_query($query, $connection);
    
    #put the table rows into an array
    $results = array();
    while ($row = mysql_fetch_array($result)){
        $results[] = $row;
    }
    
    #disconnect
    mysql_close($connection) or show_error();
    
    return $results;
}

//Create item function
function add_item($name, $description, $category, $vendor, $start_price) {
    $connection = mysql_open(); 
    
    #sanitise input
    $name = mysql_escape_string($name);
    $description = mysql_escape_string($description);
    $category = mysql_escape_string($category);
    $vendor = mysql_escape_string($vendor);
    $start_price = mysql_escape_string($start_price);
    
    #connect to the database and query it
    $query = "insert into items (name, description, categoryID, vendor, startPrice) values ('$name', '$description', '$category', '$vendor', '$start_price')";
    $result = mysql_query($query, $connection) or show_error();
    
    #get the auto-incremented pk
    $id = mysql_insert_id();
    
    #disconnect
    mysql_close($connection) or show_error();
    
    return $id;    
}

//Retrieve an item with a given id
function get_item($itemID) {
    $connection = mysql_open();
    
    #sanitise input
    $itemID = mysql_escape_string($itemID);
    
    #connect to the database and query it
    $query = "select * from items where itemID='$itemID'";
    $result = mysql_query($query, $connection) or show_error();
    
    #check that one and only one item is returned
    if (mysql_num_rows($result) != 1) {
        echo "There was an error retrieving the item";
        die();
    }
    
    #put the table row into an array
    $item = mysql_fetch_array($result);
    
    #disconnect
    mysql_close($connection) or show_error();
    
    return $item;
}

//Retrieve all categories
function get_categories() {
    $connection = mysql_open();
    
    #connect to the database and query it
    $query = "select categoryID, category from category";
    $result = mysql_query($query, $connection) or show_error();
    
    #check that the number of results is equal to the known number of categories
    if (mysql_num_rows($result) != 9) {
        echo "There was an error retrieving the categories";
        die();
    }
    
    #put the table rows into an array
    $categories = array();
    while ($row = mysql_fetch_array($result)){
        $categories[] = $row;
    }
    
    #disconnect
    mysql_close($connection) or show_error();
    
    return $categories;
}

//Retrieve a category with a given id
function get_category($id) {
    $connection = mysql_open();
    
    #sanitise input
    $id = mysql_escape_string($id);
    
    #connect to the database and query it
    $query = "select category, categoryDescription from category where categoryID='$id'";
    $result = mysql_query($query, $connection) or show_error();
    
    #check that one and only one category is returned
    if (mysql_num_rows($result) != 1) {
        echo "There was an error retrieving the category";
        die();
    }
    
    #put the table row into an array
    $category = mysql_fetch_array($result);
    
    #disconnect
    mysql_close($connection) or show_error();
    
    return $category;
}

//Update a listed item
function update_item($id, $name, $description, $category, $vendor, $start_price) {
    
    $connection = mysql_open();
    
    #sanitise input
    $id = mysql_escape_string($id);
    $name = mysql_escape_string($name);
    $description = mysql_escape_string($description);
    $category = mysql_escape_string($category);
    $vendor = mysql_escape_string($vendor);
    $start_price = mysql_escape_string($start_price);
    
    #connect to the database and query it
    $query = "update items set name='$name', description='$description', categoryID='$category', vendor='$vendor', startPrice='$start_price where itemID='$id'"
    $result = mysql_query($query, $connection) or show_error();
    
    #disconnect
    mysql_close($connection) or show_error();
    
    return $result;
}

//Delete an item listing
function delete_item($id) {
    $connection = mysql_open();
    
    #sanitise input
    $id = mysql_escape_string($id);
    
    #connect to the database and query it
    $query = "delete from items where itemID = '$id'";
    $result = mysql_query($query, $connection) or show_error();
    
    #disconnect
    mysql_close($connection) or show_error();
    
    #return 0 for error-checking
    return 0;
}
?>