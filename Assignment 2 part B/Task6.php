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
	   'SELECT * from Student'
        );
        $query->execute();
        
        echo "<form action = 'http://localhost:8080/Task7.php' method = 'GET'>";
        echo "<select name = 'student'>";
    
        while ($row = $query->fetch())
        {
            echo "<option value=",$row[0],">", $row[0], " ",$row[1], " ", $row[2]," ", $row[3],  "</option>";  
        }
        echo "</select>";
        
        
        echo "<input type='submit' value = 'send'/>";
        
        echo "</form>"
        
        ?>
        
    </body>
</html>