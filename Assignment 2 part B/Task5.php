<!DOCTYPE html>

<html>
    <head>
        <title>
            My PHP
        </title>    
    </head>
    
    <body>
        
<?php
        $handle = new PDO(
		'mysql:host=dragon.kent.ac.uk;dbname=co323',
		'co323',
		'pa33word'
        );
        
        $query = $handle->prepare(
	   'select cid, name, avg(mark) from Assessment, Grade where (Assessment.aid = Grade.aid) group by (Grade.aid) order by cid, name'
        );
        $query->execute();

        
        echo "<table>";
        echo "<tr><th>cid</th><th>name</th><th>average mark</th>";
        while ($row = $query->fetch()) 
        {  
            echo "<tr>";
	        echo "<td>" ,  $row[0] , "</td>";
            echo "<td>" ,  $row[1] , "</td>";
            echo "<td>" ,  $row[2] , "</td>";
            echo "</tr>";
        }
        echo "</table>";



    

?>
    
    
    
    
    
    
    </body>




</html>