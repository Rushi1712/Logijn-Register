<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ragister</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'calibri';
        }
        #login{
            /* border: 1px solid black; */
            width: 500px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:150px;
           
        }
        
        #form{
            display: block;
            box-sizing: border-box;
            padding: 40px;
            width: 400px;
            height: 650px;
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
            margin-bottom: 20px;
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
            margin-top: 10px;
            font-size:20px;
        }
    </style>
</head>
<body>
<center>
    <div id="login">
        <form action="" id="form" method='POST'>
            <h1 id="h1">Register</h1>

            <div style=" display: flex; flex-direction: column;">

                <lable id="lable"><b>Name</b></lable>
                <input type="text" id="input" name='txtname' placeholder="Name"/>

                <lable id="lable"><b>UserName</b></lable>
                <input type="text" id="input" name='txtuname' placeholder="username"/>

                <lable id="lable"><b>Email</b></lable>
                <input type="email" id="input" name='txtemail' placeholder="Email-ID"/>


                <lable id="lable"><b>Gender</b></lable>
                <select name="gender" id="input">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <lable id="lable"><b>Password</b></lable> 
                <input type="password" id="input" name='txtpass' placeholder="password must be 8 digits"/>
            <input type="submit"  id="button" name="btn" value="Ragister"/>

            Are You Register Already? Yes<a href="login.php">Login</a>
            </div>
           
        </form>
    </div>
    </center>
</body>
</html>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=project", "root", "");
if(isset($_POST['btn'])) {
    $name = $_POST['txtname'];
    $uname = $_POST['txtuname'];
    $email = $_POST['txtemail'];
    $gender = $_POST['gender'];
    $password = $_POST['txtpass'];

    $stmt = $pdo->prepare("INSERT INTO project_register (name, uname, email, gender, password) VALUES (:name, :uname, :email, :gender, :password)");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":uname", $uname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
}
?>


        