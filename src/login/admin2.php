
<?php
	 session_start();
	 if($_SESSION['isset']==1 )
	 {
	 	echo "<b>Admin2 Page Here</b>";
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
<body><table><tr><td> <a href="user.php"><strong>User Page</strong></a></td>
<td> <a href="admin1.php"><strong>Back</strong></a></td>    </tr>  </table>
<link rel="stylesheet" href="lightbox/lightbox.css" type="text/css" media="screen" />

 <table style="padding:30px; border:solid 1px black"><tr>
<td><form action="<?php echo $_server['php-self'];  ?>" method="post" enctype="multipart/form-data" id="something" class="uniForm">
		<p>Category 
		<select name='catgy'> 
			<option value='nature'>Nature</option>
	 	    <option value='friends'>Friends</option>
	 	    <option value='actor'>Actor</option>
	 	    <option value='flower'>Flower</option>
 	    </select></p>
		  Image Name<input type="text" name="iname"><br><br>
		  Description<p><textarea cols="40" rows="2" name="descp"></textarea></p>
		  Publish<br>
		  Yes: <input type="radio" name="pub" value="1"/>
		  No : <input type="radio" name="pub" value="0"/><br><br>
        <input name="new_image" id="new_image" size="30" type="file" class="fileUpload" /><br></br>
        <button name="submit" type="submit" class="submitButton">Upload</button>
</form>
</td></tr>
</table>
</body>
</html>
<?php
        if(isset($_POST['submit'])){
          if (isset ($_FILES['new_image'])){
              $imagename = $_FILES['new_image']['name'];
              $source = $_FILES['new_image']['tmp_name'];
              $target = "upload/".$imagename;
              move_uploaded_file($source, $target);
 
              $imagepath = $imagename;
              $save = "upload/new_" . $imagepath; //This is the new file you saving
              $file = "upload/" . $imagepath; //This is the original file
 
              $save = "upload/thm_" . $imagepath; //This is the new file you saving
              $file = "upload/" . $imagepath; //This is the original file
              echo $file;
              list($width, $height) = getimagesize($file) ; 
 
              $modwidth = 80; 
 
              $diff = $width / $modwidth;
 
              $modheight = $height / $diff; 
              $tn = imagecreatetruecolor($modwidth, $modheight) ; 
              $image = imagecreatefromjpeg($file) ; 
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
 
              imagejpeg($tn, $save, 100) ; 
			   $imagepath;
			  thm_."$imagepath";
            //echo "Large image: <img src='upload/".$imagepath."'><br>"; 
            //echo "Thumbnail: <img src='upload/thm_".$imagepath."'>"; 
		  }
        }
	 //connection
   $link=mysql_connect("localhost","root","");
   if(!$link)
      echo "not";
   else 
       echo""; 
   mysql_select_db("ajit") ;
   $qry="insert into image(category,name,description,ispublic,imgurl)values('".$_POST[catgy]."','".$_POST[iname]."','".$_POST[descp]."','".$_POST[pub]."','".$imagepath."')";
   $res=mysql_query($qry);
   //display
  
  require_once('lightbox/lbinsert.php');
 
  $result = mysql_query("SELECT * FROM image");
        echo "<table border=\"1\">";
		while($row = mysql_fetch_array($result))
		  {
		    if($row['ispublic']== 1) 
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
?>
