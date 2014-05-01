<?php
       include("conn.php");
      $tutorial_id=$_GET["tutorial_id"];

      $recsno=$_GET["recsno"];
      $data=trim($recsno);
      $ex=explode(" ",$data);
      $size=sizeof($ex);
      for($i=0;$i<$size;$i++) 

   {
		$tutorial_id=trim($ex[$i]);
		//echo $tutorial_id;
		
		 $sql="delete from $tutorial where tutorial_id=".$tutorial_id;
	
		
		$result=mysql_query($sql);
   }
       header("location: index.php");
?>