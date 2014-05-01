<?php 
//checks if the form has been submitted
if(isset($_POST['submit']))
{
//upload directory where the file will be stored
$uploaddir = 'uploads/';

$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

$uploadfiles = basename($_FILES['userfile']['name']);

list($width, $height, $type, $attr) = 
getimagesize($_FILES['userfile']['tmp_name']);

if (file_exists($uploadfile)) {
//print error message
echo $uploadfiles;
echo "- file already exists";
} else {
echo "The file $uploadfiles does not exist<BR>";
}


if ($width > 80 || $height > 80)
{
//print error message
echo "Maximum allowed size is 80x80 pixels";
die();
}


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "<BR>Image Uploaded Successfully!<BR><BR>";

echo "<BR>Image Width: ";
echo $width;
echo "<BR>Image Height: ";
echo $width;
echo "<BR>Image type: ";
echo $type;
echo "<BR>Attribute: ";
echo $attr;
echo "<BR>";
} else {
//print error message
echo "<BR>File was not successfully uploaded<BR><BR>";  
die();
}

}else{

?>
<form enctype="multipart/form-data" method="post" action="user.php">
<TABLE><TR><TD>
<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
Send this file: <input name="userfile" type="file">
</TD></TR><TR><TD>
<input type="submit" name="submit" value="upload">
</form>
</TD></TR></TABLE>
     
<?php
}
?>