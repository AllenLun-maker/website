<?php
$link = mysqli_connect("localhost","root","","meme");
$link->set_charset("utf8");
if($link->connect_error){
    echo "<h>Database link error!</h>";
}
$User = $_COOKIE["User"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>投稿</title>
        <style>
        .Error{color: #FF0000;}
        .manage{
            text-align: center;
        }
        </style>
    </head>
    <body>
        <?php
        $name = $Categ = $Source = $comment = "";
        $ErrN = $ErrCt = $ErrS = $ErrC = "";
        $Check = 2;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["Category"])){
                $ErrCt="Need Choose";
            }else{
                $Categ = input_fix($_POST["Category"]);
                $Check--;
            }
            if(empty($_POST["URL"])){
                $ErrS="Source Link";
            }else{
                $Source = input_fix($_POST["URL"]);
                $Check--;
            }
            if(empty($_POST["comment"])){
            }else{
                $comment = $_POST["comment"];
            }
        }
        function input_fix($In){
            $In = trim($In);
            $In = stripcslashes($In);
            $In = htmlspecialchars($In);
            return $In;
        }
        ?>
        <div class="manage">
            <h1><?php echo $_COOKIE["User"];?>,歡迎投稿!<br><br></h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                類別:
                <input type="radio" name="Category" autocomplete="off" value="environmental">環境
                <input type="radio" name="Category" autocomplete="off" value="history">歷史
                <input type="radio" name="Category" autocomplete="off" value="news">時事
                <span class="Error">*<?php echo $ErrCt?></span>
                <br><br>
                圖片來源: <input type="text" name="URL" autocomplete="off">
                <span class="Error">*<?php echo $ErrS?></span>
                <br><br>
                備註: <br>
                <textarea name="comment" rows="5" cols="40"></textarea>
                <br><br>
                <button type="submit">確認</button> <button type="reset">清除</button>
            </form>
        </div>
        <?php
        if($Check==0){
            switch($Categ){
                case "environmental":
                    $Count=$link->query("SELECT * FROM environmental");
                    $id_count = ((int)mysqli_num_rows($Count))+1;
                    //$id_count = row_num($Categ);
                    echo "$id_count<br>";
                    $link->query("INSERT INTO environmental (ID,Name,URL,Comment) VALUES ('$id_count','$User','$Source','$comment')");
                    break;
                case "history":
                    $Count=$link->query("SELECT * FROM history");
                    $id_count = ((int)mysqli_num_rows($Count))+1;
                    //$id_count = row_num($Categ);
                    echo "$id_count<br>";
                    $link->query("INSERT INTO history (ID,Name,URL,Comment) VALUES ('$id_count','$User','$Source','$comment')");
                    break;
                case "news":
                    $Count=$link->query("SELECT * FROM news");
                    $id_count = ((int)mysqli_num_rows($Count))+1;
                    //$id_count = row_num($Categ);
                    echo "$id_count<br>";
                    //$link->query("INSERT INTO news (Name,URL,Comment) VALUES ($name,$Source,$comment)");
                    $link->query("INSERT INTO news (ID,Name, URL, Comment) VALUES ('$id_count','$User', '$Source', '$comment')");
                    break;
            }
            $Check=2;
            echo "<script>alert('投稿成功');history.go(-1);</script>";
        }
        ?>
    </body>
</html>