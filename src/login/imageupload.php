<html>
<head>
<title>Upload Image</title>
</head>
<body>
<form name="Upload image" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<div align="center"><br>
<select>
  <option>--Select Category--</option>
            <option value='nature'>Nature</option>
	 	    <option value='friends'>friends</option>
	 	    <option value='actor'>Actor</option>
	 	    <option value='flower'>Flower</option>
</select><br><br>
Image Name:
<input type="text" name="name" /><br/><br/>
Description:
<input type="text" name="description" ><br><br>
Yes<input type="radio" name="yes" value="yes" > <br>
No<input type="radio" name="no" value="no" > <br><br>
<label for="file">Image upload:</label>
<input type="file" name="upimage" value="Browse" ><br><br>
<input type="submit" value="Image Upload" ><br>


</div>
</form>
</body>
</body>
</html>