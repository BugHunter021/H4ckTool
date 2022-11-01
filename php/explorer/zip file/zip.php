<?php
/**
 *  PHP script to zip folder using RecursiveDirectoryIterator PHP function
 */ 

  // Get real path for folder
  $folder_to_zip = realpath("files");
  
  //saving zip  
  $zipname = "zip-files.zip";
  // we are using try and catch
 // you can run the script without the try..catch 
  try{
  // Initialize archive object
  $zip = new ZipArchive();
  $zip->open( $zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);

  // Create recursive directory iterator
  $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder_to_zip), RecursiveIteratorIterator::LEAVES_ONLY );
	$numfile=0;
  foreach ($files as $name => $file) {
   	 // Skip directories (they would be added automatically)
	 $numfile=$numfile+1;
	 if ($numfile <= 2000 )
	 {
		  if (!$file->isDir()) {
				// Get real and relative path for current file
			  $filePath = $file->getRealPath();
				  $relativePath = substr($filePath, strlen($folder_to_zip) +1);
			
				 // Add current file to archive
				  $zip->addFile($filePath, $relativePath);
		  } // if ends
	}
     } // foreach ends
   echo "zip is generated";

 } catch( Exception $e ){
	// catch message  for unable to generate zip
 }
?>
