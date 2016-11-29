<!DOCTYPE html>
<html>
<body>
<table style="width:100%">
    <tr>
        <th>#| </th>
        <th>ID</th> 
        <th>TIME</th> 
        <th>COMMENT</th>
        <th>IMAGE LINK</th> 
    </tr>
<?php
include_once("DB.php");

$db = new DB();
// // $db->setTable();

// $query_name = $_GET["query_name"];
// if($query_name === "SHOW_DATA"){
    $db->showAllData();
// }



?>
</table>

</body>
</html>
