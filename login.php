<?php
$Userlink = mysqli_connect("localhost","root","","meme");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        .error{color: #FF0000;}
        .login{
            text-align: center;
        }
        </style>
</head>
<body>
<?php
$Username = $PassW = "";
$ErrUn = $ErrPw = "";
$Check = 0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    function input_convert($in){
        $in = stripcslashes($in);
        $in = htmlspecialchars($in);
        return $in;
    }
    if(empty($_POST["Uname"])){
        $ErrUn = "Need Enter Your User Name.";
    }else{
        $Username = input_convert($_POST["Uname"]);
        if(!preg_match("/^[a-zA-Z]*$/",$Username)){
            $ErrUn = "Only letters and white space can use.";
        }else{
            $Check++;
        }
    }
    if(empty($_POST["Pw"])){
        $ErrPw = "Need Your Password.";
    }else{
        $PassW = input_convert($_POST["Pw"]);
        $Check++;
    }
}
?>
<div class="login">
    <h1>You need to log in to use this web`s service<br><br></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
        <label>Username: </label>
        <input type="text" name="Uname" autocomplete="off">
        <span class="error">*<?php echo $ErrUn;?></span>
        <br><br>
        <lable>Password: </lable>
        <input type="password" name="Pw" autocomplete="off">
        <span class="error">*<?php echo $ErrPw;?></span>
        <br><br>
        <input type="submit">
        <a class="reg" href="register.php" onclick="touch()">Register</a>
    </form>
    <?php
    if($Check == 2){
        $result = $Userlink->query("SELECT * FROM login WHERE Username='$Username' && pw='$PassW'");
        $result_count = (int)mysqli_num_rows($result);
        if($result_count==0){
            echo "<p class='error'>用戶名稱或密碼錯誤</p>";
            $Check = 0;
        }else{
            $Check = 0;
            $cookie_name = "User";
            $cookie_value = $Username;
            setcookie($cookie_name, $cookie_value, time()+86400);
            header("Location:Main.php");
            exit;
        }
    }
    ?>
</div>
    
    <script>
        function touch(){
            $(.reg).style['color'] = '#f00';
        }
    </script>
</body>
</html>