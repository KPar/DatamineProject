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

$conn = new mysqli($servername,$username,$password,$dbname);
if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
}


$query = "SELECT * FROM wordbase WHERE SNAME='archway.archives.govt.nz'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        $words = $row['TOPWORDS'];
        $sname = $row['SNAME'];

        echo "<table class='table table-striped'>";
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
    }

} else {
    echo "No Words found";
}

mysqli_close($conn);
?>