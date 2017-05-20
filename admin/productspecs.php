<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
$viewemail=$_SESSION['pstemail'];

							$oper = $_REQUEST["op"];
							if($oper == "productspecs")
							{
								$_SESSION['catid'] = $catid = $_REQUEST["catid"];
								$_SESSION['subcatid'] = $subcatid = $_REQUEST["subcatid"];
								$_SESSION['subminicatid'] = $subminicatid = $_REQUEST["subminicatid"];
								$_SESSION['brandid'] = $brandid = $_REQUEST["brandid"];
							?>							
							<div id="prodspecs">							
								 <form id="form3" name="form3" method="post">
									<?php
								   $refinesubminicatproduct1 = "SELECT distinct fld_tablename FROM tbl_level3 where fld_level2id=$subcatid and fld_level3id=$subminicatid";
                                   $refinesubminicatproduct11 = mysql_query($refinesubminicatproduct1);
                                   while($row=mysql_fetch_array($refinesubminicatproduct11,MYSQL_ASSOC))
                                    {                                        
   								        $filtertable = $row['fld_tablename'];
										$queryyyy = "select * from $filtertable"; 
										$query1 = mysql_query($queryyyy);
										$counnt = mysql_num_fields($query1)-4;
										$specheadinng=array();  
										$specheadinng1=array();  
										$tesst =array();
										$columnnamees = array();									
										$i=0;
										$j=0;
										while($propertyy = mysql_fetch_field($query1))
										{
											if($i>4 && $i<$counnt+3)
												{
													$specheadinng = $propertyy->name;
													$remove = array("fld_");
													$spec = str_replace($remove, "", $specheadinng);
													$spec1 = strtolower($spec);
													$ddlspecs = ucwords($spec1);
													$specname = strtoupper($spec1);
													//echo $specname;									
													$columnnames[$j] = $specheadinng;													
													$tesst_fld[$j]=$ddlspecs;
													$chkfield[$j]  = $spec1;
													$j++;														
												}
											$i++;
										}
											
                                for($f=0;$f<$counnt-4;$f++)
    							{   
									if($tesst_fld[$f]=="Price" || $tesst_fld[$f]=="Description")
									{
										echo '<label style="margin-top:20px">Enter '.$tesst_fld[$f].'</label>';
									}									
									else
									{									
									echo '<label style="margin-top:20px">Select '.$tesst_fld[$f].'</label>';
									}
									echo '<div class="panel-group" id="accordion">
									<div class="panel panel-info">
										<div id="specs">';
									
									$testing = "refine";
									$refarray = $testing.$f;
									$refarray = array();
									if($columnnames[$f]=="fld_price")
									{
									echo '<input type="text" id="fld_price" name="fld_price" class="span8">';
									}													
									else if($columnnames[$f]=="fld_description")
									{
									echo '<textarea name="fld_description" id="fld_description" cols="10" rows="2" class="span8"></textarea>';
									}													
									else
									{
										$querry1 = "select distinct $columnnames[$f] from $filtertable"; 
										$querry = mysql_query($querry1);
										$p=0;
										echo '<select id="'.$columnnames[$f].'" name="'.$columnnames[$f].'" class="span8">';
										echo '<option value="0">Select</option>';											
										while($row = mysql_fetch_array($querry))
										{
										//echo $columnnames[$s];
										//echo "<br>";
										$refarray[$p] = $row[$columnnames[$f]];
										if($refarray[$p] !="")
										{
										//echo '<li class="li_level3"><a><label class="label_check_level3"><input class="input_check_level3" type="checkbox" id="chkids" name="'.$columnnames[$f].'" value="'.$refarray[$p].'"/>'.$refarray[$p].'</label></a></li>';										
										echo '<option class="input_check_level3" name="'.$columnnames[$f].'" value="'.$refarray[$p].'">'.$refarray[$p].'</option>';							
							//echo '<li class="li_level3"><a><label class="label_check_level3"><input class="input_check_level3" type="checkbox" id="chkids" name="'.$columnnames[$f].'" value="'.$refarray[$p].'" checked="checked"/>'.$refarray[$p].'</label></a></li>'; 
										}										
										$p++;										
										}
										echo '</select>';
										echo '<div id="divmsg1" style="margin-left:69%;margin-top:-7%;">';
										//echo '<a class="addspecss" id="'.$tesst_fld[$f].'" name="'.$tesst_fld[$f].'"><img src="details_open.png"/></div></a>';							
									}    												
										echo '</div>
									</div>';									
									if($tesst_fld[$f]!="Price" && $tesst_fld[$f]!="Description")									
									{
									echo '<div class="specaddd" id="specaddd'.$tesst_fld[$f].'" style="margin-top:20px;display:none">																														
									</div>';									
									}
									echo '</div>';										
    							}                                       
							}			
										
                                    ?>
                                    </form>                                    
							</div>
							<?php
							}
							?>
							
		<!--	Pass checked checkbox and textbox values through URL Start-->
	<!--<script type="text/javascript">
	
		function fn_savespecs()
		{
			var hidspecnames = document.getElementById("txtspecs").value;
			alert(hidspecnames);					
			//alert(titlename);
			var url="updatespecs.php";
			url=url+"?upspecname="+hidspecnames+"&op=addspecs"
			
			xmlhttp1_updcart=GetXmlHttpObject_show();
			if (xmlhttp1_updcart==null)
			{
				alert ("Your browser does not support XMLHTTP!");
				return;
			}
				xmlhttp1_updcart.onreadystatechange=showupdcart;
			try
			{
				xmlhttp1_updcart.open("GET",url,true)
			}
			catch(e1)
			{
				document.write("error1")
			}
				xmlhttp1_updcart.send()
		}
	
			function showupdcart()
			{			
				if (xmlhttp1_updcart.readyState==4 || xmlhttp1_updcart.readyState=="complete")
				{
					var res=xmlhttp1_updcart.responseText;
					if(res=="Valid")
					{
					alert("Specification is Added Successfully");
					location.reload();
					}
					else
					{
					alert("Specification is Added Successfullly");					
					location.reload();
					}
				}
			}    
			
			function GetXmlHttpObject_show()
			{
				var objXMLHttp_show2=null
				if(window.XMLHttpRequest)
				{
				objXMLHttp_show2=new XMLHttpRequest()
				}
				else if(window.ActiveXObject)
				{
				objXMLHttp_show2=new ActiveXObject("Microsoft.XMLHTTP")
				}
				return objXMLHttp_show2;
			}
		
	</script>-->


	<!--<script type="text/javascript">
	$(document).ready(function() {
	$(".addspecss").click(function(){		
		spechead =  $(this).attr("id");
		alert(spechead);
		//$(".specaddd").attr("id");
		  //.siblings("p:visible").toggle("slide");
		//slider.css('display') == "block";
		 //$("[id=choose]").css("background-color","yellow");
		//alert(test);
		
		$('.specaddd').toggle("slide");
		//$('#part' + number).html(text);
		//var spectitle = $("#hdnspec").val();
		//alert("tetsing");		
		});		
	});
	</script>-->
	
	
	<!--<script type="text/javascript">
	$(document).ready(function() {
	$("#btnspecsave").click(function(){		
		var spectxtname = $("#txtspecs").val();		
		var spectitle = $("#hdnspec").val();
		alert("tetsing");
		$.ajax({		
		//type: "POST",
		//url: "updatespecs.php?op=addspecs&upspecname="+spectxtname,
		//dataType: "html",
		//data: "data="+data,
		type: "POST",
		url: "updatespecs.php?op=addspecs",
		data:"upspecname="+spectxtname+"&title="+spectitle, 
		cache: true,
		beforeSend: function() {
			//alert("Before send");
		//$("#divbottommsg").html('<div class="msgboxinfo" style="width:300px;">Loading Please wait... </div>');
		// $('#response').html('<div class="msgboxinfo"><img src='ajax-loaderdrop.gif'/></div>');
		$("#response").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		},
		success: function(data) {
		$('#response').html('');
		//alert(spectitle);
		//$("#prodspecifications.'spectitle'").reload();
		//alert(data);
		$("#prodspecs").html(data);
		//$("#submakeSelect").html("<option value='0'>Select Model</option>");
		}
		});
		});	
		
	});
	</script>-->
	
