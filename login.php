<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('location:home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'calibri';
        }
        #login{
            /* border: 1px solid black; */
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
           
        }
        
        #form{
            display: block;
            box-sizing: border-box;
            padding: 40px;
            width: 400px;
            height: 500px;
            flex-direction: column;
            display: flex;
            gap: 5px;
            background-color: white;
            border-radius: 19px;
            backdrop-filter: blur(2px);
            box-shadow: 0px 0px 20px rgba(0,0,0,0.75);
        }

        #h1{
            font-weight: normal;
            font-size: 40px;
            text-shadow: 0px 0px 2px rgba(0,0,0,0.5);
            margin-bottom: 60px;
        }

        #lable{
            color: black;
            
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 2px;
            padding-left: 10px;
            font-size: 14px;
            text-align: left;
        }

        #input{
            background:white;
            height: 40px;
            line-height: 40px;
            border-radius: 20px;
            padding: 0px 20px;
            margin-bottom: 20px;
            color:black;
        }
        

        #button{
            background: rgb(45, 126, 231);
            height: 40px;
            line-height: 40px;
            border-radius: 40px;
            border: none;
            margin: 10px 0px;
            box-shadow: 0px 0px 5px rgba(0,0,0,0.3);
            color: white;
            font-size: 15px;
            text-transform: uppercase;
        }
        #button:hover {
            background: rgb(45, 110, 228);
        }

        a {
            text-decoration: none;
            color: coral;
            margin-top: 0px;
            font-size:20px;
        }
    </style>
</head>
<body>
<center>
    <div id="login">
        <form id="form" method='POST'>
            <h1 id="h1">LOGIN</h1>

            <div style=" display: flex; flex-direction: column;">
                <lable id="lable"><b>Username</b></lable>
                <input type="email" id="input" name='txtemail' placeholder='Username'>
            </div>
            <lable id="lable"><b>Password</b></lable>
            <input type="password" id="input" name='txtpass' placeholder='password'/>
            <input type="submit"  id="button" name="btn" value="Login"/>
            Are You Not Register? Yes<a href="Ragister.php">Sign up</a>

        </form>
    </div>
    </center>
</body>
</html>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=project","root","");
if(isset($_POST['btn']))
{
    $email=$_POST['txtemail'];
    $password=$_POST['txtpass'];
    $stmt=$pdo->prepare("select * from project_register where email=:email");
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $data=$stmt->fetch(PDO::FETCH_ASSOC);
    if($data['email']==$email)
    {   
        if($data['password']==$password)
        {
        $_SESSION['user']=$email;
        header('location:home.php');
        }
        else{
            echo "<script type='text/javascript'>alert('invalid password')</script>";
        }
        
    }
    else{
        echo "<script type='text/javascript'>alert('user not found')</script>";
        
    }
}
?>