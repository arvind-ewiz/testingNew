<?php
	 session_start();
	
	if($_SESSION['isset']==0 || $_SESSION['isset']==1)
 {
 	echo "<b><center>User Page Here</center></b>";
 }
     else
 		header( 'Location: http://localhost/Ajit/login/login.html' );
 ?>		
 		<html>
       <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="generator" content="scite">
  <title></title>
<script type="text/javascript" src="lightbox/prototype.js"></script>
<script type="text/javascript" src="lightbox/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/lightbox.js"></script>
<link rel="stylesheet" href="dialog.2.1.css" type="text/css" />
<script language="JavaScript" src="prototype-1.6.0.3.js"></script>
<script language="JavaScript" src="dialog.2.1.js"></script>
</head>
<body bgcolor="EEEEEE">
<link rel="stylesheet" href="lightbox/lightbox.css" type="text/css" media="screen" />
</body>
</html>
<?php
 		 include("conn.php");
	   ?> <form name='myform' action='' method='GET'><strong>Category</strong> 
				
 	<select name='catgy' onChange='myform.submit();'> 
					<p> <option value=''>- -Select- -</option>
					<option value='nature'<?php if($_GET[catgy]=='nature')echo"selected"?>>Nature</option>
			 	    <option value='friends'<?php if($_GET[catgy]=='friends')echo"selected"?>>Friends</option>
			 	    <option value='actor' <?php if($_GET[catgy]=='actor')echo"selected"?>>Actor</option>
			 	    <option value='flower'<?php if($_GET[catgy]=='flower')echo"selected"?>>Flower</option>
		 	     </select>
				</p>  
			 </form>
	    <?php
		//echo $_POST[catgy];
		//mysql_select_db("ajit", $con);
		//$result = mysql_query("SELECT category,ispublic,imgurl FROM image");
		require_once('lightbox/lbinsert.php');
		$result = mysql_query("SELECT * FROM image");
		
		$cnt=0;
        echo "<table border=\"1\">";     
		while($row = mysql_fetch_array($result))
		  {
		  
			    if($row['category']== $_GET[catgy] && $row['ispublic']== 1)
			    {
				   //echo "<pre>";
                  //print_r($row);
                 //echo $cnt;
             if($cnt==0)         
            echo"<tr>";
       ?> 
				    <td style="padding:10px">
					<a href="http://localhost/Ajit/login/upload/<?php echo $row['imgurl'];?>" rel="lightbox[]">
                    <img height="100" width="100" src="http://localhost/Ajit/login/upload/<?php echo thm_."".$row['imgurl'];?>"></a>
				
				   <br><?php echo $row['imgurl'];?>
				 <?php
				  //echo " "."http://localhost/Ajit/login/" . $row['imgurl'];
				  //echo "<br/>";
				  echo"</td>";
       $cnt++;  
      // echo $cnt;        
       if($cnt==5)
        {
         echo "</tr>";
         $cnt=0;
        }              
          
       
				}
		  }
	
		echo "</table>";
?> 