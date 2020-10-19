<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Login.css">

</head>
<style>
    body{
    background-image: url('image/wallpaperEng.png');
    background-size: 100% 100%;
    background-position: center;
    height: 100vh;
    
    margin: 0;
    }
    .LogoEng{
        position: absolute;
        width: 900px;
        height: 100%;
    }
    .LogoEng img{

        margin-left: 350px;
        margin-top: 80px;
    }
    .LogoEng p{
        font-family: 'Sarabun', sans-serif;
        font-size: 36px;
        margin-left: 150px;
        font-weight: bold;
    }
    .Signin{
        height: 100%;
        float: right;
        width: 500px;
        margin-top: 60px;
    }
    .Signin img{
        margin-top: 50px;
        margin-left: 180px;
    }
    .Signin .text-Sign {
       
        font-size: 40px;
        font-weight: bold;
        font-family: 'Sarabun', sans-serif;
        margin-left: 210px;
        text-shadow: 2px 2px 0  #9b2c2c;
    }
    .Signin .Form-Log{

        height: 200px;
 
    }
    .Signin .Form-Log input{
        font-family: 'Sarabun', sans-serif;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        margin-left: 140px;
        width: 250px;
        height: 40px;
        border: black 2px solid;
        border-radius: 10px;
        transition: 0.8s;
        background: white;
    }
    .Signin .Form-Log input:focus{
        box-shadow: 0 0 0 4px #9b2c2c;
        
    }
    .Signin .Form-Log .but-back{
        width: 80px;
        height: 40px;
        font-size: 18px;
        font-weight: bold;
        font-family: 'Sarabun', sans-serif;
        border-radius: 5px;
        transition: 0.8s;
        border: 2px solid black;
    }
    .Signin .Form-Log .but-back:hover{
        box-shadow: 1px 1px 0 black;
        background: #9b2c2c;
        
    }
    .Signin .Form-Log .But-Log{
        width: 100px;
        height: 40px;
        font-size: 18px;
        font-weight: bold;
        font-family: 'Sarabun', sans-serif;
        border-radius: 5px;
        transition: 0.8s;
        border: 2px solid black;
    }
    .Signin .Form-Log .But-Log:hover{
        box-shadow: 1px 1px 0 black;
        background: #3498DB;
    }
</style>
<body>
    <div>
    <div class="LogoEng">
        <img src="image/unnamed.png" alt="" style="width:240px; height:240px;">
        <p >ระบบบริหารจัดการงานวิจัยและงานวิชาการ</p>
    </div>

    <div class="Signin">
    <form action="CheckLogin.php" method="POST">
        <img src="image/worker.png" alt="" style="width:180px; height:180px;">
        <p class="text-Sign">Sign in</p>
        <div class="Form-Log">
           <input type="text" placeholder="ชื่อผู้ใช้ " name="User"><br>
            <input style="margin-top: 10px;" type="Password" name="Pass" placeholder="รหัสผ่าน"><br><br>
        <div style="margin-left: 210px;">
           <a href="show.php"><button type="button" class="but-back"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M154.8,154.8c-1.80062,0 -3.31906,-1.3975 -3.42656,-3.21156c-0.14781,-1.88125 -4.07156,-43.61812 -75.69344,-44.92156v24.05312c0,1.33031 -0.76594,2.53969 -1.96187,3.10406c-1.19594,0.56437 -2.62031,0.40312 -3.64156,-0.43l-55.04,-44.72c-0.80625,-0.65844 -1.27656,-1.63938 -1.27656,-2.67406c0,-1.03469 0.47031,-2.01562 1.27656,-2.67406l55.04,-44.72c1.03469,-0.83312 2.44562,-1.00781 3.64156,-0.43c1.19594,0.56438 1.96187,1.77375 1.96187,3.10406v24.13375c76.37875,2.16344 82.13,76.67438 82.53313,85.12656c0.06719,0.26875 0.09406,0.5375 0.09406,0.81969c0,1.90813 -1.53187,3.44 -3.44,3.44c-0.01344,0 -0.04031,0 -0.06719,0z"></path></g></g></svg>
กลับ</button></a> <button class="But-Log" type="submit" >เข้าสู่ระบบ</button>
           </div>
        </div>
    </form>
    </div>
</div>
</body>
</html>