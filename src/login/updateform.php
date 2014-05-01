<html>
<head>
<title>Update-User</title>
</head>
<body bgcolor="EEEEEE">
<?php
         //include("connn.php");
         
         $db_name="tutorials";
          
         $connection=mysql_connect("localhost","root","") or die("I Couldn't connect");
         
         $db=mysql_select_db($db_name,$connection) or die("I Couldn't select your database");
        
         $tutorial="tutorials_tbl";

         
              $tutorial_id=$_GET["tutorial_id"];
            
			  $sql="select * from $tutorial where tutorial_id=".$tutorial_id;
            
            $result=mysql_query($sql);
           
            while($row=mysql_fetch_array($result)) 
            {
            	
                $tutorial_id=$row['tutorial_id'];
                $tutorial_title=$row['tutorial_title'];
                $tutorial_author=$row['tutorial_author'];
                
				
            }
?>
        <form name="form1" method="GET" action="updatequery.php">
        
             <div style="position:absolute;margin:78 0 0 300;">
             <a href="tutorial.php"><strong>Back</strong></a></div>
            
            <table border="1" style="margin:100 0 0 300;"	>
              <tr>
                
                <td><input type="hidden" name="tutorial_id" value="<?php echo $tutorial_id ;?>">
                  </td>
              </tr> 
              <tr>
                <td><strong>Tutorial Title</strong></td>
                <td><input name="tutorial_title" type="text" id="tutorial_title" value="<?php echo $tutorial_title ;?>"></td>
              </tr>
              <tr>
                <td><strong>Tutorial Author</strong></td>
                <td><input name="tutorial_author" type="text" id="tutorial_author" value="<?php echo $tutorial_author; ?>"></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="Submit" value="Update" style="margin:0 0 0 70"></td>
                <td> </td>
              </tr>
            </table>
          </form>      
           
</body>
</html>