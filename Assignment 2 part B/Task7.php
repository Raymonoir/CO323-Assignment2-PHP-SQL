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
        
        
        $sql = "select Assessment.cid, title,  name, weighting, mark from  Grade, Assessment, Course  where (Grade.sid = :s) and (Assessment.aid = Grade.aid) and (Assessment.cid = Course.cid)";
        $query = $handle->prepare($sql);
        
        $param = array(':s' => $_GET["student"]);
        if ($query->execute($param) == FALSE)
        { die("Query error: " . implode($query->errorInfo(), ' ')); }

        
        echo "<table>";
        echo "<tr><th>cid</th><th>title</th><th>name</th><th>weighting</th><th>mark</th></tr>";
        while ($row = $query->fetch())
        {
            echo "<tr>";
	        echo "<td>" ,  $row[0] , "</td>";
            echo "<td>" ,  $row[1] , "</td>";
            echo "<td>" ,  $row[2] , "</td>";
            echo "<td>" ,  $row[3] , "</td>";
            echo "<td>" ,  $row[4] , "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        
        
        
        
        
        $sql = "select DISTINCT title, SUM(mark * (weighting/100)) as OverallMark from Assessment, Course, Grade where (Assessment.cid = Course.cid) and (Grade.sid = :s) and (Assessment.aid = Grade.aid) group by (Course.title);";
        $query = $handle->prepare($sql);
        
        $param = array(':s' => $_GET["student"]);
        if ($query->execute($param) == FALSE)
        { die("Query error: " . implode($query->errorInfo(), ' ')); }

        
        echo "<table>";
        echo "<tr><th>title</th><th>overall mark</th></tr>";
        while ($row = $query->fetch())
        {
            echo "<tr>";
	        echo "<td>" ,  $row[0] , "</td>";
            echo "<td>" ,  $row[1] , "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    

?>
    
    
    
    
    
    
    </body>

</html>