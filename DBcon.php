<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 21/09/2015
 * Time: 1:30 PM
 */

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'top100';

$dom = new DOMDocument();
$dom->validateOnParse = true;
$dom->loadHTML(file_get_contents("stuffGraph.html"));
$name = $dom->getElementById("linkName")->nodeValue;

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$query = "SELECT * FROM stufftable";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {


    while ($row = mysqli_fetch_array($result)) {
        $sname = $row['SNAME'];
        $words = $row['TOPWORDS'];
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Server Name</th>";
        echo "<th> Top Words</th>";
        echo "</tr>";
        echo "</thead>";


        echo "<tbody>";
        echo "<tr>";
        echo "<td>$sname</td>";
        echo "<td>$words</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";

       echo $row;
    }


} else {
    echo "No Words found";
}


mysqli_close($conn);
?>