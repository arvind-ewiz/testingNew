<html>
<head>

<script type="text/javascript">

function valid_form ()
{
    valid = true;

    if ( document.insert_form.tutorial_title.value == "" )
    {
        
		alert ( "Please Enter The Title " );
        valid = false;
		
    }
    return valid;
}
function selectall()
{
//        var formname=document.getElementById(formname);

       var recslen = document.insert_form.length;
       //alert(recslen);
        if(document.insert_form.topcheckbox.checked==true)
            {
                for(i=1;i<recslen;i++) {
                document.insert_form.elements[i].checked=true;
                }
    }
    else
    {
        for(i=1;i<recslen;i++)
        document.insert_form.elements[i].checked=false;
    }
} 


  function goDel()
{
	var recslen =  document.insert_form.length;
    var checkboxes=""
    for(i=1;i<recslen;i++)
    {
        if(document.insert_form.elements[i].checked==true)
        checkboxes+= " " + document.insert_form.elements[i].name
    }
   
    if(checkboxes.length>0)
    {
        var con=confirm("Are you sure you want to delete");
        if(con)
        {
            document.insert_form.action="deletequery.php?recsno="+checkboxes
            document.insert_form.submit()
        }
    }
    else
    {
        alert("No record is selected.")
    }
}




</script>

</head>
<title>Add New Record</title>
<body bgcolor="EEEEEE">


<form name="insert_form" method="post" action="<?php $_PHP_SELF ?>" onsubmit="return valid_form();">




<?php
include("connn.php");

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
$sql = 'SELECT  tutorial_title,tutorial_id,tutorial_author FROM tutorials_tbl';
                 

       mysql_select_db('TUTORIALS');

        $res = mysql_query( $sql);

        if(! $res )
        {
          die('Could not get data: ' . mysql_error());
         }
         echo "<a href=admin1.php><strong>Back</strong></a>";
         echo "<table border=\"1\" style='float:left'>";
         
         echo "<tr>    
         <td><strong>Select All</strong><input name='topcheckbox' type='checkbox' class='check' id='topcheckbox' onClick='selectall();' value='ON'></td>
         
         <td align='center' colspan='5'><strong><a href='adduser.php'>Add New User</a></strong></td></tr>
         
               <tr><td align='center'><strong><a href='javascript:goDel()'>Delete</a></strong></td>
               <td style='padding:10px'><strong>Tutorial Id</strong></td>
               <td style='padding:10px'><strong>Tutorial Title</strong></td>
               <td style='padding:10px' colspan='2' width='115'><strong>Tutorial Author</strong></td></tr></table>";
                  ?>
         
         
         
 <?php
        echo "<div style='overflow:auto;height:450px;width:480px;clear:left;'>
             <table border=\'1\' style='float:left'>";
     
  
      while($row = mysql_fetch_array($res))
    {
   // echo "Title: {$row['tutorial_title']} <br> ".
       //  "--------------------------------<br>";
   ?> 
   
   <?php echo"<tr>";?>
           
        <td align="center" style="padding:5" width="76"><input name="<?php echo $row['tutorial_id']; ?>" type="checkbox" class="check"></td>
      <?php  
        echo "<td style='padding:5px'width='81'>";?>      
    <?php echo $row['tutorial_id'];?>             
    <?php echo "</td>";
    
    echo "<td style='padding:5px' width='98'>";?>      
    <?php echo $row['tutorial_title'];?>             
    <?php echo "</td>";
    
     echo "<td style='padding:5px' width='95'>";?>      
    <?php echo $row['tutorial_author'];?>             
    <?php echo "</td>";?>
    
     <td><a href="<?php echo"updateform.php?tutorial_id=".$row['tutorial_id'] ;?>">Edit</a></td>
         <?php    echo "</tr>
                         </div>";
             
} 
?>
</form>

</body>
</html>