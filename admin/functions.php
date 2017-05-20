<?php 
function createThumbs($fileName, $pathToThumbs, $maxW, $maxH, $colorR, $colorG, $colorB){
		
		
			
					$fileName=$fileName;
				    
	   				$match = "1"; // File is allowed
					$save = $pathToThumbs;
					$allowed_ext = "JPG,JPEG,GIF,PNG,bmp,jpg,jpeg,gig,png";
					$match = "";
		
					$file_ext = preg_split("/\./",$fileName);
					
					$allowed_ext = preg_split("/\,/",$allowed_ext);
					$filetype = end($file_ext);
					$filetype= strtolower($filetype);
						list($width_orig, $height_orig) = getimagesize($fileName);
						if($maxH == null){
							if($width_orig < $maxW){
								$fwidth = $width_orig;
							}else{
								$fwidth = $maxW;
							}
							$ratio_orig = $width_orig/$height_orig;
							$fheight = $fwidth/$ratio_orig;
							
							$blank_height = $fheight;
							$top_offset = 0;
								
						}else{
							if($width_orig <= $maxW && $height_orig <= $maxH){
								$fheight = $height_orig;
								$fwidth = $width_orig;
							}else{
								if($width_orig > $maxW){
									$ratio = ($width_orig / $maxW);
									$fwidth = $maxW;
									$fheight = ($height_orig / $ratio);
									if($fheight > $maxH){
										$ratio = ($fheight / $maxH);
										$fheight = $maxH;
										$fwidth = ($fwidth / $ratio);
									}
								}
								if($height_orig > $maxH){
									$ratio = ($height_orig / $maxH);
									$fheight = $maxH;
									$fwidth = ($width_orig / $ratio);
									if($fwidth > $maxW){
										$ratio = ($fwidth / $maxW);
										$fwidth = $maxW;
										$fheight = ($fheight / $ratio);
									}
								}
							}
							if($fheight == 0 || $fwidth == 0 || $height_orig == 0 || $width_orig == 0){
								die("FATAL ERROR REPORT ERROR CODE [add-pic-line-67-orig] to <a href='http://www.atwebresults.com'>AT WEB RESULTS</a>");
							}
							if($fheight < 45){
								$blank_height = 45;
								$top_offset = round(($blank_height - $fheight)/2);
							}else{
								$blank_height = $fheight;
							}
						}
						
						$image_p = imagecreatetruecolor($fwidth, $blank_height);
						$white = imagecolorallocate($image_p, $colorR, $colorG, $colorB);
						imagefill($image_p, 0, 0, $white);
						switch($filetype){
							case "gif":
								$image = @imagecreatefromgif($fileName);
							break;
							case "jpg":
								$image = @imagecreatefromjpeg($fileName);
							break;
							case "jpeg":
								$image = @imagecreatefromjpeg($fileName);
							break;
							case "png":
								$image = @imagecreatefrompng($fileName);
							break;
						}
						@imagecopyresampled($image_p, $image, 0, $top_offset, 0, 0, $fwidth, $fheight, $width_orig, $height_orig);
						switch($filetype){
							case "gif":
								if(!@imagegif($image_p, $save)){
									$errorList[]= "PERMISSION DENIED [GIF]";
								}
							break;
							case "jpg":
								if(!@imagejpeg($image_p, $save, 100)){
									$errorList[]= "PERMISSION DENIED [JPG]";
								}
							break;
							case "jpeg":
								if(!@imagejpeg($image_p, $save, 100)){
									$errorList[]= "PERMISSION DENIED [JPEG]";
								}
							break;
							case "png":
								if(!@imagepng($image_p, $save, 0)){
									$errorList[]= "PERMISSION DENIED [PNG]";
								}
							break;
						}
						@imagedestroy($filename);
	}
	
?>