          
                                            $(function () {
                                                document.getElementById("pemail").disabled = true;
                                                $(".Proceed_button").click(function () {

                                                    var name = $("#pname").val();
                                                    var email = $("#pemail").val();
                                                    var mobile = $("#pmobile").val();
                                                    var gender = $("#gender").val();
                                                    var zip = $("#pzip").val();

                                                    var country = $("#pcountry").val();
                                                    var state = $("#pstate").val();
                                                    var city = $("#pcity").val();
                                                    var address = $("#paddress").val();

                                                    var str = $("#form").serialize(); 
												
                                                    if (name == '')
                                                    {
                                                        $('.error_login').html('Enter Name');
                                                        $("#pname").focus();
                                                        $("html, body").animate({scrollTop: 0}, "slow");
                                                        return false;
                                                    }

                                                    if (email == '')
                                                    {
                                                        $('.error_login').html('Enter Email address');
                                                        
                                                        $("#pemail").focus();
                                                         $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    }


                                                    if (mobile == '')
                                                    {
                                                        $('.error_login').html('Enter Mobile Number');
                                                        $("#pmobile").focus();
                                                         $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    }


                                                    if (gender == '')
                                                    {
                                                        $('.error_login').html('Choose Gender');
                                                        $("#gender").focus();
                                                        $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    }


                                                    if (zip == '')
                                                    {

                                                        $('.error_login').html('Enter zipcode');
                                                        $("#pzip").focus(); $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    }

                                                    if (country == '')
                                                    {
                                                        $('.error_login').html('Enter Country');
                                                        $("#pcountry").focus(); $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    }


                                                    if (state == '')
                                                    {
                                                        $('.error_login').html('Enter State');
                                                        $("#pstate").focus(); $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    }


                                                    if (city == '')
                                                    {
                                                        $('.error_login').html('Enter Password');
                                                        $("#pcity").focus(); $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    }


                                                    if (address == '')
                                                    {
                                                        $('.error_login').html('Enter Password');
                                                        $("#paddress").focus();
                                                              $("html, body").animate({scrollTop: 200}, "slow");
                                                        return false;
                                                    } else

                                                    {

                                                        $('.error_login').html('Loading please wait....');
                                                        $("#flash").show();
                                                        $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "login_check.php?action=update_register",
                                                            data: str,
                                                            cache: true,
                                                            success: function (html) {
                                                                $('.error_login').hide();
                                                              
                                                                $('.updatee').html(html);
                                //$(".refreshtab").load(window.location + " .refreshtab");
                                //window.location.reload();
                                                            }
                                                        });
                                                    }
                                                    return false;
                                                });
                                            });
                                            
                                            $(function() {
	
$(".passwordbutton").click(function() {


var cpassword = $("#cpassword").val();
var password = $("#password").val()
var str = $( "#change-password" ).serialize();
 $('.password_error').show();    
  $('.password_errors').show();
if(cpassword == '')
{
	$('.password_error').html('Enter Current Password');
	$("#cpassword").focus();
          setTimeout(function () {
                            $('.password_error').html('');
                        }, 2000);
	return false;
}
 

if(password.length==0)
{
	$('.password_error').html('Enter Password');
	$("#password").focus();
          setTimeout(function () {
                            $('.password_error').html('');
                        }, 2000);
        
      return false;
	
}
  	var minLength = 6; // Minimum length
	if (password.length < minLength) {
             $('.password_errors').html('Your password must be at least ' + minLength + ' characters long. Try again.');
	
	        $("#password").val('');
		$("#password").focus();
                
                 setTimeout(function () {
                            $('.password_errors').html('');
                        }, 2000);
	return false;
	}

else 
{
	
	$('.loading').html('Loading please wait....');
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "login_check.php?action=change_password",
data: str,
cache: true,
success: function(html){
  $('.loading').html('');
if(html==1)
{ $('.loading').show();
	 $('.loading').html('Password changed successfully');
          setTimeout(function () {
                            $('.loading').hide();
                        }, 5000);
}
else if(html==2) { 
  $('.password_error').show();    
$('.password_error').html('Wrong Current Password'); 
      setTimeout(function () {
                            $('.password_error').html('');
                        }, 3000);
}
else

{ 
     $('.password_error').show();    
$('.password_error').html('something error found.Please try again later');
 setTimeout(function () {
                            $('.password_error').html('');
                        }, 5000);
 }

}

});
}
return false;
});
});
                               

    $(document).ready(function () {

        $("#submit").click(function (e)
        {
            e.preventDefault();
            //alert("sdf");
            var id = myselect.value;
            if (id != "xxx") {

                var specalist_id = getdoctor.value;
               $("#process").html('<img src="ajaxloading.svg" style="width:30px" /> Processing ');
                var time = "1";

                $.ajax({
                    type: "POST",
                    url: "select_time.php",
                    data: {
                        doctor_id: id,
                        time: time,
                        specalist_id: specalist_id

                    },
                    //datatype:string,

                    success: function (data)
                    {
$("#process").html('');
                        $('#dataresponse').html(data);
                        $('#myModal').modal('show');
                    }
                });
            } else
            {

                $('#error').show();
            }
        });
    });

  
    $(document).ready(function () {

        $("#schedule").click(function (e)
        {
 $('#error').hide();
            e.preventDefault();
            //alert("sdf");
            var id = myselect.value;
            if (id != "xxx") {

$("#process").html('<img src="ajaxloading.svg" style="width:30px" /> Processing ');
                var specalist_id = getdoctor.value;
                var time = "2";
                //alert(id);
                $.ajax({
                    type: "POST",
                    url: "select_time.php",
                    data: {
                        doctor_id: id,
                        time: time,
                        specalist_id: specalist_id

                    },
                    //datatype:string,

                    success: function (data)
                    {
	$("#process").html('');
                      $('#dataresponse').html(data);
                       $('#myModal1').modal('show');
                    }
                });
            } else
            {
                $('#error').show();
            }
        });
    });
     

            function validate_upload() {
                //Get reference of FileUpload.
                var fileUpload = document.getElementById("file");

                //Check whether the file is valid Image.
                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
                if (regex.test(fileUpload.value.toLowerCase())) {

                    //Check whether HTML5 is supported.
                    if (typeof (fileUpload.files) != "undefined") {
                        //Initiate the FileReader object.
                        var reader = new FileReader();
                        //Read the contents of Image File.
                        reader.readAsDataURL(fileUpload.files[0]);
                        reader.onload = function (e) {
                            //Initiate the JavaScript Image object.
                            var image = new Image();

                            //Set the Base64 string return from FileReader as source.
                            image.src = e.target.result;

                            //Validate the File Height and Width.
                            image.onload = function () {
                                var height = this.height;
                                var width = this.width;
                                //alert(height+"-"+width);

                                if (height != 109 || width != 109) {
                                    alert("please upload a image as width is 109 and height is 109");
                                    document.getElementById('file').value = '';
                                    return false;
                                }
                                //    alert("Uploaded image has valid Height and Width.");
                                //  return true;
                            };

                        }
                    } else {
                        alert("This browser does not support HTML5.");
                        document.getElementById('file').value = '';
                        return false;
                    }
                } else {
                    alert("Please select a valid Image file.");
                    document.getElementById('file').value = '';
                    return false;
                }
            }
  
                                $(".doctor").change(function () {
                                    var list = $('#getdoctor').val();

                                    var string = "doctor=" + list;
                                    $('#ajax-loader').show();
                                    $('.error').html('Connecting to server please wait');
                                    $("#flash").show();
                                    $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
                                    $.ajax({
                                        type: "POST",
                                        url: "get_doctor.php",
                                        data: string,
                                        cache: true,
                                        success: function (html) {
                                            $("#show").after(html);
                                            $("#show-list").html(html);
                                            $('#ajax-loader').hide();
                                        }
                                    });

                                    return false;
                                });

                           $(document).ready(function () {
                                $(".nav-tabs a").click(function () {
                                    $(this).tab('show');
                                });
                            });
                             
        
function cancel (doctor_id,pid){
                    //alert("sdf");
            var id = doctor_id;
         var patient_id=pid;
                var time = "2";
             

                $.ajax({
                    type: "POST",
                    url: "cancel_time.php",
                    data: {
                        doctor_id: id,
                        time: time,
                        patient_id: patient_id

                    },
                    //datatype:string,

                    success: function (data)
                    {

                        $('#dataresponse').html(data);
                        $('#myModa2').modal('show');
                    }
                });
           
            }
      