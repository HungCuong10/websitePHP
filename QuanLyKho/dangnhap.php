<?php
   $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die("Không thể kết nối CSDL");
   session_start();
  //  Xử lý nút đăng nhập
   if(isset($_POST['btn-DN']))
   {
       if($_POST['username'] == null || $_POST['password'] == null)
       {
           echo "<script> alert ('Vui lòng nhập tài khoản và mật khẩu của bạn') </script>";
       }
       else
       {
         $username = $_POST['username'];
         $password = $_POST['password'];
       }  
       if($username && $password)
       { 
         $sql = $conn -> query("SELECT * FROM dangnhap WHERE DN_ID = '".$username."' and DN_Matkhau = '".$password."'");
      
         if(mysqli_num_rows($sql) == 0)
         {
          echo "<script> alert ('Tài khoản hoặc mật khẩu không chính xác. Vui lòng thử lại') </script>";
         }   
         else
         {
          //  Phân quyền theo chức vụ
           $_SESSION['DN_ID'] = $username;
           $NV = $conn -> query("SELECT * FROM nhanvien WHERE NV_ID = '$username'");
           if(mysqli_num_rows($sql)>0)
           {
               $row = $NV->fetch_assoc();
              //  Nếu tài khoản của nhân viên hoặc quản lý nghỉ việc
               if($row['TrangThai'] == false)
               {
                   echo "<script> alert ('Tài khoản của bạn không còn hoạt động') </script>";
               }
               else
               {
                //  Chuyển trang theo chức vụ của từng người
                  if($row['NV_ChucVu'] == "Quản lý")
                  {
                    header('Location: index2.php', true);
                  }
                  else
                  {
                    header('Location: index3.php', true);
                  }
            }
          }      
         }
       }
   }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website quản lý kho</title>
    <link rel="stylesheet" type = "text/css" href="css/styleCSS.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">   
    <script>
      	  function myFunction() {
	  var x = document.getElementById("MK")
	  var y = document.getElementById("hide1");
	  var z = document.getElementById("hide2");

	if (x.type === "password")
    {
	    x.type = "text";
	    y.style.display = "block";
	    z.style.display = "none";

	   }
	   else{

       
	    x.type = "password";
	    y.style.display = "none";
	    z.style.display = "block";

   }
}
    </script>
</head>
<body>
 <form action = "dangnhap.php" method = "post">
    <div class="login">
        <h1>Đăng nhập</h1>
        <div class="group">
        	<input type="text" name = "username" placeholder="Mã truy cập"><i class="fa fa-user"></i>
        </div>
        <div class="group">
        	<input id="MK" type="password" name = "password" placeholder="Mật khẩu">
        	<span class="eye" onclick=" myFunction()">
        		<i id="hide1" class="fa fa-eye"></i>
        		<i id="hide2" class="fa fa-eye-slash"></i>       		
        	</span>
        	</a>
        </div>
        <input type = "submit" name = "btn-DN" Value = "Đăng nhập"/>
    </div>
 </form>
</body>
</html>
