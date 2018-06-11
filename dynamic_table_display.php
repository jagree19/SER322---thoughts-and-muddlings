<?php

/*
Modified code from answer by waLL e
at https://stackoverflow.com/questions/17902483/show-values-from-a-mysql-database-table-inside-a-html-table-on-a-webpage

dynamic display of table data utilizing php and MySQL

*/

$host = '127.0.0.1'; //host address
$user = '***'; //change to user name for database
$pass = '***'; //change to password for database
$dbName = '***'; // change to database name

//create connection
$connection = mysqli_connect($host, $user, $pass, $dbName);

//test for failure
if(mysqli_connect_errno()) {
  die("connection failed: "
    . mysqli_connect_error()
    . " (" . mysqli_connect_errno()
    . ")");
}

//get results from database
$result = mysqli_query($connection,"SELECT * FROM Players"); //change query to suit needs
$all_elements = array(); // declare array for saving property

//showing property
echo '<table class="data-table"
        cellspacing="5" cellpadding="8">
        <tr class = "data-heading">';  //init table tag
while ($elements = mysqli_fetch_field($result)) {
  echo '<th>' . $elements->name . '</th>'; //get field name for header
  array_push($all_elements, $elements->name);
}
echo '<tr>';

//showing all data
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  foreach ($all_elements as $item) {
    echo '<td>' . $row[$item] . '</td>'; //get items using property value
  }
  echo '</tr>';
}
echo "</table>";

 ?>
