<?php
    
    /*
     *    
     *    
     */
    
   if( !isset($_GET['r']) || (float)$_GET['r'] < 0.0 || 10.0 < (float)$_GET['r'] ) {
    	header("HTTP/1.0 500 Illegal Parameter", true, 500);
    	die();
	}
	
	$rating = (float)$_GET['r'] / 10;
    
    // Load in the two images
    $bg = imagecreatefrompng( "rating_bg.png" );
    $fg = imagecreatefrompng( "rating_fg.png" );
    
    // Find the size of the source images
    $width = imagesx( $bg );
    $height = imagesy( $bg );
    
    // Modify the width to crop to the required percentage
    $fgwidth = $rating * $width;
    
    // Crop the foreground to the desired width, copying it over the background
    imagecopyresampled( $bg, $fg, 0, 0, 0, 0, $fgwidth, $height, $fgwidth, $height );
    
    // Send the correct image content type header
    header("Content-Type: image/png");
    
    // Send the new combined image
    imagepng( $bg );
    
    
?>
