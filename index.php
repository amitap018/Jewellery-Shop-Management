<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEWELERS</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <style>
        body{
        display: flex;
        justify-content: center;
        height: 100vh;
        align-items: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        form{
    width: 25rem;
    height: 25rem;
    margin: 100px auto auto auto;
    padding: 10px 20px;
    border-radius: 12px;
}
button{
    width: 100%;
    background-color: rgba(71, 61, 61, 0.7);
    color: white;
    padding: 10px 20px;
    border-radius: 30px;
    border: none;
    margin: 30px 0px;
    font-size: 20px;
}
button:hover{
    opacity: 0.5;
    cursor: pointer;
}

a{
    text-decoration: underline;
    color: black;
    padding: 5% 13%;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

h2{
    padding: 5% 3%;
    color: black;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.button_user, .button_admin{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color: white;
}
.bg-img{
    background-image: url("img/bg1.jpg");
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  width: 100%;
  height: 95%;
}
    </style>
</head>
<body>
    <div class="bg-img">
    <form>
        <center><h2>LOGIN</h2></center>

        <a href="#">CONTACT US</a>
        <a href="about.php">ABOUT US</a>
        <button type="submit" name="userlogin"><a href="userlogin.php" class="button_user">USER LOGIN</a></button>
        <button type="submit" name="adminlogin"><a href="adminLogin.php" class="button_admin">ADMIN LOGIN</a></button>
    </form>
</div>
</body>
</html>