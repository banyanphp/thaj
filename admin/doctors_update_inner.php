<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
@include ("common.php");
@include ("configg.php");
@include ("functions.php");
//url:"supplier_inner.php?dcategory="+dcategory+"&dname="+dname+"&dgender="+dgender+"&dlanguages="+dlanguages,
/*$uname = $_SESSION['uname']; */
$id1=$_REQUEST['aprveprodid'];
$dcategory=$_REQUEST['dcategory'];
$dname=$_REQUEST['dname'];
$dgender=$_REQUEST['dgender'];
$dlanguages=$_REQUEST['dlanguages'];
$doctorfees=$_REQUEST['doctorfees'];
$doctorexperience=$_REQUEST['doctorexperience'];
$doctorphone =$_REQUEST['doctorphone'];

$doctoremail=$_REQUEST['doctoremail'];
	
				error_reporting(0);
				$change="";
				$abc="";
				define ("MAX_SIZE","400");
					function getExtension($str)
					{
						 $i = strrpos($str,".");
						 if (!$i) { return ""; }
						 $l = strlen($str) - $i;
						 $ext = substr($str,$i+1,$l);
						 return $ext;
					}
					$errors=0;				
					$image =$_FILES["fupload"]["name"];
					$uploadedfile = $_FILES['fupload']['tmp_name'];	
                                        if(!empty($image)){
					if($image) 
					{					
					$filename = stripslashes($_FILES['fupload']['name']);					
					$extension = getExtension($filename);
					$extension = strtolower($extension);
					if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
					{						
						$change='<div class="msgdiv">Unknown Image extension </div> ';
						$errors=1;
					}
					else
					{
					 $size=filesize($_FILES['fupload']['tmp_name']);

					if ($size > MAX_SIZE*1024)
					{
						$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
						$errors=1;
					}
					if($extension=="jpg" || $extension=="jpeg" )
					{
					$uploadedfile = $_FILES['fupload']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);
					}
					else if($extension=="png")
					{
					$uploadedfile = $_FILES['fupload']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);
					}
					else 
					{
					$src = imagecreatefromgif($uploadedfile);
					}
					echo $scr;
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=161;
					$newheight=126;
					//$newheight=($height/$width)*$newwidth;
					$tmp=imagecreatetruecolor($newwidth,$newheight);

					//$newwidth1=25;
					//$newheight1=($height/$width)*$newwidth1;
					//$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

					//imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

					$filename = "doctors_images/". $_FILES['fupload']['name'];

					//$filename1 = "images/small/". $_FILES['fupload']['name'];

					imagejpeg($tmp,$filename,100);

					//imagejpeg($tmp1,$filename1,100);

					imagedestroy($src);
					imagedestroy($tmp);
					//imagedestroy($tmp1);
					}
					}	
			
				//echo "tamil".$querytext="insert into tbl_doctors values ('','$dname','$dgender','$dcategory','$dlanguages',$image,'','','')";
				
				//url:"supplier_inner.php?dcategory="+dcategory+"&dname="+dname+"&dgender="+dgender+"&dlanguages="+dlanguages,
				//$querytext= "INSERT INTO `tbl_doctors` (`fld_name`, `fld_gender`, `fld_speciality`, `fld_languages`, `fld_image`, `fld_experience`) VALUES ('$dname', '$dgender', '$dcategory', '$dlanguages', '$image', '')";
				
				$querytext= "UPDATE tbl_doctors SET fld_name='$dname', fld_gender='$dgender', fld_speciality='$dcategory', fld_languages='$dlanguages', fld_image='$image',fld_experience='$doctorexperience',fld_doctor_fees='$doctorfees',mobile_no='$doctorphone',email_id='$doctoremail' WHERE fld_id = $id1";
				
				$catiqry1 = mysql_query($querytext);	
                                        }
                                        
                                        else{
                                            $querytext= "UPDATE tbl_doctors SET fld_name='$dname', fld_gender='$dgender', fld_speciality='$dcategory', fld_languages='$dlanguages',fld_experience='$doctorexperience',fld_doctor_fees='$doctorfees',mobile_no='$doctorphone',email_id='$doctoremail' WHERE fld_id = $id1";
                                            	$catiqry1 = mysql_query($querytext);	
                                        }

?>