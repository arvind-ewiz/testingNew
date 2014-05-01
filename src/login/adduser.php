<html>
<head>

<script type="text/javascript">
   
    function clearText(input)
    {
       if (input.defaultValue==input.value)
       input.value = ''
    }
    
    function restoreText(input)
    {
    if (input.value=='')
    input.value = input.defaultValue
    }


function valid_form ()
{
    valid = true;

    if (document.insert_form.tutorial_id.value=="Enter Tutorial Id")
    {
        
		alert ( "Please Enter The Id" );
        valid = false;
		
    }
    else if (document.insert_form.tutorial_title.value=="Enter Tutorial Title")
    {
        
		alert ( "Please Enter Tutorial Title" );
        valid = false;
		
    }
    else if (document.insert_form.tutorial_author.value=="Enter Author Name")
    {
        
		alert ( "Please Enter Author Name" );
        valid = false;
		
    }
    return valid;
}
</script>
<title>Add New Record</title>
</head>
<body bgcolor="EEEEEE">
<form name="insert_form" method="post" action="tutorial.php" onsubmit="return valid_form();">

<div style="position:absolute;margin:78 0 0 400;">
<a href="tutorial.php"><strong>Back</strong></a></div>

<table border="1" cellspacing="1" cellpadding="2" style="margin:100 0 0 300;">
<tr>
<td> 
<b>Tutorial Id :</b><input name="tutorial_id" type="text" value="Enter Tutorial Id"
 onfocus="clearText(this)" onblur="restoreText(this)" style="margin:0 0 0 32;background-color:#eeeeee;color:A3B7E7;">
</td></tr>


<tr>
<td> 
<b>Tutorial Title :</b><input name="tutorial_title" type="text" value="Enter Tutorial Title"
 onfocus="clearText(this)" onblur="restoreText(this)" style="margin:0 0 0 15;background-color:#eeeeee;color:A3B7E7;">
</td></tr>
<tr>
<td > 
<b>Tutorial Author :</b><input name="tutorial_author" type="text" value="Enter Author Name"
 onfocus="clearText(this)" onblur="restoreText(this)" style="background-color:#eeeeee;color:A3B7E7;">
</td>
</tr>

<td colspan="2" >
<input name="add" type="submit" id="add" value="Add Tutorial" style="margin:0 0 0 65;">
<input type="reset" value="Reset"> 
</td>
</tr>
</table>
</form>

</body>
</html>


<?php
//include("connn.php");

if(isset($_POST['add']))
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

mysql_select_db('TUTORIALS');

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
   $tutorial_id = $_POST['tutorial_id'];
   $tutorial_title = $_POST['tutorial_title'];
   $tutorial_author = $_POST['tutorial_author'];
   
  
  $sql = " select * from tutorials_tbl ".
      "where tutorial_title= '".$tutorial_title."'";

      $retval = mysql_query($sql); 


    if (!mysql_num_rows($retval)) 
      {          
         $sql = "INSERT INTO tutorials_tbl "."(tutorial_id,tutorial_title,tutorial_author) "."VALUES "."('$tutorial_id','$tutorial_title','$tutorial_author')";

         $retval = mysql_query($sql);
         if(! $retval )
           {
             die('Could not enter data: ' . mysql_error());
           }

        echo "<center>Entered data successfully\n</center>";

     } 
else 
   
     
      

     echo "<center>Record with this name already exist</center>";
      
  
      
   //  echo "Fetched data successfully\n <br/>";

}
?>