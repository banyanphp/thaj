<?php
ob_start();
session_start();
require "includes/config.php";
?>
<?php 
$id=$_REQUEST['id'];
$query_user=mysqli_query($conn,"select * from tbl_profile where pro_id='".$id."'") or die(mysqli_error());
$result_user=mysqli_fetch_array($query_user);
?>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>

<form name="customerData" id="customerData" action="http://narayanapearls.com/ccavanue/ccavRequestHandler.php" enctype="multipart/form-data" method="post">
   <input type="hidden" name="tid" id="tid" readonly />
   <input type="hidden" name="order_id" value="<?php echo $id;?>">
   <input type="hidden" name="merchant_id" value="15754">
   <input type="hidden" name="amount" value="513">
   <input type="hidden" name="redirect_url" value="http://narayanapearls.com/ccavanue/ccavResponseHandler.php"/>
   <input type="hidden" name="cancel_url" value="http://narayanapearls.com/ccavanue/ccavResponseHandler.php"/>
   <input type="hidden" name="language" value="EN"/>
   <input type="hidden" name="billing_name" value="<?php echo $result_user1['user_name']; ?>"/>
   <input type="hidden" name="billing_address" value="<?php echo $result_user1['user_name']; ?>"/>
   <input type="hidden" name="currency" value="INR"/>
</form>
<script language='javascript'>document.customerData.submit();</script>

</center>

<!-- <script language="javascript" type="text/javascript" src="json.js"></script>-->
<!-- <script src="jquery-1.7.2.min.js"></script>-->
 <script language="javascript" type="text/javascript" src="json.js"></script>
 <script src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
  $(function(){
  
  	  var jsonData;
  	  var access_code="AVSP06CJ89BJ40PSJB" // shared by CCAVENUE 
	  var amount="513";
  	  var currency="INR";
  	  
      $.ajax({
           url:'https://secure.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code='+access_code+'&currency='+currency+'&amount='+amount,
           dataType: 'jsonp',
           jsonp: false,
           jsonpCallback: 'processData',
           success: function (data) { 
                 jsonData = data;
                 // processData method for reference
                 processData(data); 
		 // get Promotion details
                 $.each(jsonData, function(index,value) {
			if(value.Promotions != undefined  && value.Promotions !=null){  
				var promotionsArray = $.parseJSON(value.Promotions);
		               	$.each(promotionsArray, function() {
					console.log(this['promoId'] +" "+this['promoCardName']);	
					var	promotions=	"<option value="+this['promoId']+">"
					+this['promoName']+" - "+this['promoPayOptTypeDesc']+"-"+this['promoCardName']+" - "+currency+" "+this['discountValue']+"  "+this['promoType']+"</option>";
					$("#promo_code").find("option:last").after(promotions);
				});
			}
		});
           },
           error: function(xhr, textStatus, errorThrown) {
               alert('An error occurred! ' + ( errorThrown ? errorThrown :xhr.status ));
               //console.log("Error occured");
           }
   		});
  });
</script>

</body>
</html>
