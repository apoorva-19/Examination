<?php $con=mysql_connect("localhost","root","") or die("Failed to connect with database!!!!");
mysql_select_db("project", $con); 
// The Chart table contains two fields: weekly_task and percentage
// This example will display a pie chart. If you need other charts such as a Bar chart, you will need to modify the code a little to make it work with bar chart and other charts
$sth = mysql_query("SELECT * FROM rank ORDER BY score DESC");

$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'email', 'type' => 'string'),
    array('label' => 'score', 'type' => 'number')

);

$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['email']); 

    // Values of each slice
    $temp[] = array('v' => (int) $r['score']); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;
?>