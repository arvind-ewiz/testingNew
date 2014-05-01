<html>
<head>
<script>
   
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
    
    if (document.registration.uname.value == "")
    {
        
		alert ( "Please Enter The User Name" );
        valid = false;
		
    }
    else if (document.registration.uname.value=="Enter User Name")
    {
        
		alert ( "Please Enter The User Name" );
        valid = false;
		
    }
     
    else if (document.registration.pass.value=="Password")
    {
        
		alert ( "Please Enter Password" );
        valid = false;
		
    }
    else if (document.registration.city.value=="Enter City Name")
    {
        
		alert ( "Please Enter City" );
        valid = false;
		
    }
    else if (document.registration.mobno.value=="Enter Mobile No")
    {
        
		alert ( "Please Enter Mobile No" );
        valid = false;
		
    }
    return valid;
}

    
</script>

<title>Create Registration Form</title>
</head>
<body bgcolor="EEEEEE">



<fieldset style="position:absolute;margin:50 0 0 400;">
<legend><strong>Registration Form</strong></legend>

  <form name="registration" method="POST" action="" onsubmit="return valid_form();">
 
  <strong>User Name</strong> <input type="text" name="uname" value="Enter User Name"
     onfocus="clearText(this)" onblur="restoreText(this)" style="background-color:#eeeeee;color:A3B7E7;"/><br><br>
  
  <strong>Password</strong> <input type="password" name="pass" value="Password"
     onfocus="clearText(this)" onblur="restoreText(this)" style="margin:0 0 0 14;background-color:#eeeeee;color:A3B7E7;"/><br><br>
  
  <strong>City</strong> <input type="text" name="city" value="Enter City Name"
     onfocus="clearText(this)" onblur="restoreText(this)" style="margin:0 0 0 49;background-color:#eeeeee;color:A3B7E7;"/><br><br>
  
  <strong>Mobile No</strong> <input type="text" name="mobno" value="Enter Mobile No"
      onfocus="clearText(this)" onblur="restoreText(this)" style="margin:0 0 0 5;background-color:#eeeeee;color:A3B7E7;"/><br><br>
  
 <input type="submit" value="Register" name="add" style="margin:0 0 0 70" >
 <a href="login.php"><strong>Login</strong></a>
 
</form>
</fieldset>
</body>
</html>

<?php
include("conn.php");

if(isset($_POST['add']))
{
 $dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

 mysql_select_db('ajit');
 
 if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
 
  $uname = $_POST['uname'];
 
 $sql="select * from user"." where username='".$uname."'";
 
   $retval = mysql_query($sql); 


    if (!mysql_num_rows($retval)) 
      {          

$sql="insert into user"."(username,password,city,mobno)"."values"."('$_POST[uname]','$_POST[pass]','  $_POST[city]','$_POST[mobno]')";

$res=mysql_query($sql);

if(!$res)
{
	 die('Could not enter data: ' . mysql_error());
}  
    echo "<center><strong>Record is inserted in database</strong></center>";
      }
      else 
   
     
      

     echo "<center><strong>Record with this name already exist</strong></center>";
      
  
      
   //  echo "Fetched data successfully\n <br/>";
}
    ?>