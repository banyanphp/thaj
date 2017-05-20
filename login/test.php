<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Embedded HipChat jQuery Plugin Test</title>
  <style>
    iframe {
      border: 1px solid #ccc;
    }
  </style>
</head>
<!-- Step 1. Defining a container for video chat -->
<div id='ls-container' style='width:600px;height:400px;'></div>
<!-- Step 2. Including LyteSpark library -->
<script src='https://s3.amazonaws.com/s3.lytespark.com/api.soft.js'></script>
<!-- Step 3. Launching video chat -->
<script>
   $LS.setup({endpoint:'https://www.lytespark.com'}); /* Api Endpoint */
   var LScall = $LS.launch({
      space:"vr3ya4rw4zs3an1f", /* String, Space short URL, required */
      chatkey:"testchat2", /* String, 8-32 length, lowercase latin letters and numbers allowed, required */
      container:"ls-container", /* String, Container ID, required */
      username:"", /* String, User name, optional */
      userphoto:"", /* String, User photo, optional */
      audioonly: false /* Boolean, Audio call mode, optional */
   });
</script>
</html>
