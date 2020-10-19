<?php
$Username = "Navation Sugguees";
// $Username = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navtest.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head> 
<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">Management.dev</a></li>
            <li class="item button secondary"><a href="#">ค้นหา</a></li>
            <li class="item button secondary"><a href="#">เพิ่มข้อมูล</a></li>
            <li class="item button secondary"><a href="#">แก้ไขข้อมูล</a></li>
            <li class="item button"><a href="#" id="login">Login</a></li>
            <!-- <li class="item button secondary"><a href="#" id=>Sign Up</a></li> -->
            <li class="toggle"><span class="bars"></span></li>
            <i class="fa fa-unlock-alt"></i>
            <div class="arrow-up"></div>
        </ul>
        <div class="login-form">
            <?php if(!$Username){ ?>
            <form action="">
                <label>ชื่อผู้ใช้</label>
                <div>
                    <input type="text" placeholder="username" required>
                </div>
                <label>รหัสผ่าน</label>
                <div>
                    <input type="password" placeholder="password" required>
                </div>
                <div>
                    <input type="submit" value="Log In">
                </div>
                <div>
                    <a href="#" style="text-decoration: none;position: relative;top: 20px;font-size: 16px;color: gray;">Lost Your Password?</a>
                </div>
            </form>
            <?php }if($Username){ ?>
                <form action="">
                    <div>
                        <label class="label"><?php echo $Username;}?></label>
                    </div>
                    <div>
                        <input type="submit" value="Log out">
                    </div>
                </form>
        </div>
    </nav>
</body>

</html>
<script>
    //สำหรับ show dropdown
    $(document).ready(function(){
        var arrow = $(".arrow-up");
        var form = $(".login-form");
        var status = false;
        $("#login").click(function(event){
            event.preventDefault();
            if(status == false){
                arrow.fadeIn();
                form.fadeIn();
                status = true;
            }else{
                arrow.fadeOut();
                form.fadeOut();
                status = false;
            }
        })

    })
    //script สำหรับทำ responsive web
    $(function() {
            $(".toggle").on("click", function(){
                if($(".item").hasClass("active")){
                    $(".item").removeClass("active");
                }
                else{
                    $(".item").addClass("active");
                }
            })
        });
</script>