<html>
 <head>
  <title>PHP Test</title>
  <form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="text" name="password" id="password">
  <input type="submit" value="upload file" name="submit">
  </form>
 </head>
 <body>
 <?php 
 //echo '<p>FILE UPLOAD</p><br>'; 
// Turn off all error reporting
error_reporting(0);

 $tgt_file = $tgt_dir.basename($_FILES['fileToUpload']['name']);
 $tgt_pass = $_POST['password'];
 //echo "<br>TARGET FILE= ".$tgt_file;
 //echo "<br>Password= ".$tgt_pass;
 //$filename = $_FILES['fileToUpload']['name'];
// echo "<br>FILE NAME FROM VARIABLE:- ".$_FILES["fileToUpload"]["name"];
 if(isset($_POST['submit']))
 {
	 if($tgt_pass == "kanjaro@1") 
		{
		 if(file_exists($_FILES["fileToUpload"]["name"]))
			{ echo "<br>file exists, try with another name"; }
		 else   {   
				 echo "<br>STARTING UPLOAD PROCESS<br>";
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tgt_file))
				{ echo "<br>File UPLOADED:- ".$tgt_file; }

				  else  { echo "<br>ERROR WHILE UPLOADING FILE<br>"; }
			}
		}
	else
	 {	echo "Protected with password";	 }
 }
?> 
 </body>
</html>