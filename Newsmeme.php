<?php
$link = mysqli_connect("localhost","root");
mysqli_select_db($link,"meme");
mysqli_query($link,"set names utf-8");
$data = mysqli_query($link,"SELECT * FROM news");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>時事</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        img{
            width: 350px;
            margin: 5px;
        }
        /*img:hover{
            transform: scale(1.05);
            transition: 1.2s;
        }*/
        /*.container{
            display: flex;
            flex-wrap: wrap;
            justify-content:space-around;
            align-items: stretch;
        }*/
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Main.php">首頁</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" id="Post" href="Manage.php">投稿</a>
            </div>
        </div>
    </nav>
	<div class="container">
    <?php
    if(mysqli_num_rows($data) > 0){
        while($Out = $data->fetch_assoc()){
            $name = $Out["Name"];
            $comment = $Out["Comment"];
            if($comment == ""){
    ?>
            <div class="pic">
            <img src="<?php echo $Out["URL"]?>">
            <?php
            echo "<br>";
            echo "<a>投稿人: $name</a><br><br>";
            ?>
            </div>
            <?php
                }else{
            ?>
            <div class="pic">
            <img src="<?php echo $Out["URL"]?>">
            <?php
            echo "<br>";
            echo "<a>投稿人: $name</a><br>";
            echo "<a>Info: $comment</a><br><br>";
            ?>
            </div>
    <?php
            }
        }
    }
    ?>
	</div>
</body>
</html>