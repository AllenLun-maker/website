<?php
  session_start();
  if($_COOKIE["User"] != ""){
    $Name = $_COOKIE["User"];
    echo "<script>alert('Welcome! $Name')</script>";
  }else{
    echo "<script>alert('You Need To Log In!')</script>";
    sleep(3);
    header("Location:login.php");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <style>
            .Intro{
              font-family: "Microsoft JhengHei";
              text-align: center;
            }
            @keyframes hue {
              from {
                  filter: hue-rotate(0);
              }

              to {
                  filter: hue-rotate(-360deg);
              }
            }

            .rainbow-text {
              display: inline-block;
              position: relative;
              font-weight: 500;
              font-size: 60px;
              color: transparent;
              animation: hue 1.5s linear infinite;
              background-image: linear-gradient(to right bottom, rgb(255,0,0), rgb(255,128,0), rgb(255,255,0), rgb(0,255,0), rgb(0,255,128), rgb(0,255,255), rgb(0,128,255), rgb(0,0,255), rgb(128,0,255), rgb(255,0,255), rgb(255,0,128));
              -webkit-background-clip: text;
            }
            .meme_head{border:1px solid #998675; background:#f30}
            #menu{display:none; width:184px; border:1px solid #998675; border-top:none}
            #menu li{list-style:none; background:#493e3b} 
            #menu li a{padding:10px; display:block;color:#fff; text-decoration:none;} 
            #menu li a:hover{font-weight:bold;} 
            #menu li.alt{background:#362f2d;} 
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand">MemeGalary</a>
              </div>
              <ul class="nav navbar-nav">
                <li><a href="Manage.php">投稿</a></li>
                <li><a href="Newsmeme.php">時事迷因</a></li>
                <li><a href="Historymeme.php">歷史迷因</a></li>
                <li><a href="Environmentmeme.php">環保迷因</a></li>
                <li><a href="logout.php">登出</a></li>
              </ul>
              <!--<img src="arrow-down-sign-to-navigate.png" width=20px height=20px class="meme_head"/>
              <ul class="nav navbar-nav" id = "menu">
                <li><a>時事迷因</a></li>
                <li><a>歷史迷因</a></li>
                <li><a>環保迷因</a></li>
              </ul>-->
            </div>
        </nav>
        <div>
            <div class="Intro">
                <h1 class="rainbow-text">蒐集各種迷因</h1><br>
                <h3>梗圖迷因，乃至沒有下限的地獄梗<br>都會收集的迷因畫廊</h3>
            </div>
        </div>
      <!--<script type="text/javascript" src="js/iquery.js">
        $(function(){ 
        $("#menu li:even").addClass("alt"); 
        $("img.meme_head").click(function(){ 
        $("#menu").slideToggle("fast"); 
        }); 
        }); 

      </script>-->
    </body>
</html>