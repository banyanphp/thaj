<?php
session_start();
@include("../config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['user'];
$name = $_SESSION['name'];
date_default_timezone_set('Asia/Kolkata');
//print_r($_SESSION);exit();
?>


    <!DOCTYPE html>

    <html lang="en" class="no-js">

        <head>

            <meta charset="UTF-8" />

            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

            <title>Login</title>

            <meta name="author" content="Reverie Tech" />

            <link rel="stylesheet" type="text/css" href="css/demo.css" />

            <link rel="stylesheet" type="text/css" href="tabs.css" />'

            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        </head>

        <style>

            .ul {

                list-style-type: none;

                margin: 0;

                padding: 0;

                overflow: hidden;



            }



            .ul li {

                float: left;

            }



            .ul li a {

                display: block;

                color: white;

                text-align: center;

                padding: 14px 16px;

                text-decoration: none;



            }



            .ul li a:hover {

                /*  background-color: #00A9DA; */

            }

        </style>

        <body style="background-image:url(../images/slider/slider-02.jpg)">





            <div class="container-fluid">

                <header style="background-color:#A61F3D;height:122px">

                    <img src="logo.png" style="width:20%;float:left">

                    <ul class="ul" style="width:8%;float:right">

    <?php /*   <li><a class="active" href="#home">Home</a></li>

      <li><a href="#news">How it works?</a></li>

      <li><a href="#contact">Top Specialities</a></li>

      <li><a href="#about">Specialist Doctors</a></li> <?php */ ?>

                        <li><a href="index.php"><img src="home.png" style="width: 49%;"></a></li>

                    </ul> 

                </header>



                <section class="tabred" style="margin-top:5%;color:#fff">

                    <ul class="tabs red">



                        <li>

                            <input type="radio" name="tabs red" id="tab6" checked />





                            <div id="tab-content6" class="tab-content">







                                <form method="post" name="register" action="#" id="form">


  <h4 >Already appointment fixed.Please choose another time</h4>







                                </form>

                                <form>     


                                    <input type="button" class="btn btn-primary" value="Go Back" onclick="window.location.href = 'doctorslist.php'" style="font-weight:600;background-color:#FFFAFA;color:#FF0000">

                                </form>



                            </div>



                        </li>











                    </ul>

                </section>



                <script type="text/javascript" src="js/jquery-1.10.2.js"></script>



            </div>







        </body>





    </html>

