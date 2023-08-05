<?php  
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include('connection.php');  
    $username = $_POST["username"];  
    $password = $_POST["password"];  
      
    $sql = "select * from users where username = '$username' and password = '$password'";  
    $result = mysqli_query($conn, $sql);    
    $count = mysqli_num_rows($result);         
       if($count == 1){  
           $login = true;
           session_start();
           $_SESSION['loggedin']= true;
           $_SESSION['username']= $username;
           header("location: userpage.php"); 
        }  
       else{  
           $showError ="Invalid Credentials";
       }    
} 
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <title>JEWELERS</title>
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
    background-image: url("img/bg2.jpg");
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
    <form method="post">
        <h2>USER LOGIN</h2>
        <div class="maincontainer">
            <label for="username">YOUR USERNAME:</label>
            <input type="text" placeholder="Enter Username" name="username" required>
            
            <br><br>

            <label for="password">YOUR PASSWORD:</label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br><br>
            
            <button type="submit">LOGIN</button>
        </div>
    </form>
</div>
</body>
</html>