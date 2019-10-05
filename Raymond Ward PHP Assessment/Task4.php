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
	   'SELECT name, weighting from Assessment where (cid = (select cid from Course where (title = "Web Technologies"))) order by name'
        );
        $query->execute();

        
        echo "<ol>";
        while ($row = $query->fetch()) 
        {
	       echo "<li>" ,  $row[0] , "</li>";
        }
        echo "</ol>";



    

?>
    
    
    
    
    
    
    </body>

</html>