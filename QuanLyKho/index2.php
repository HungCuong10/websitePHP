<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die($conn->error); 
    $conn -> set_charset("utf8");
    // Liên kết tài khoản đã đăng nhập thành công
    $username = $_SESSION['DN_ID'];
    $sql = $conn -> query("SELECT * FROM nhanvien WHERE NV_ID = '$username'");
    if(mysqli_num_rows($sql)>0)
    {
      // Lấy họ tên và chức vụ của người đăng nhập
        while($row = $sql->fetch_assoc())
        {
            $username = $row['NV_ID'];
            $HoTen = $row['NV_HoTen'];
            $ChucVu = $row['NV_ChucVu'];    
        }
    }
?>
<html>
<head>
<title>Quản lý kho</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="quanlykho.css">
</head>
<body id="top" >
<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('https://static1.bigstockphoto.com/8/4/1/large1500/148054529.jpg');">
  <div class="overlay"> 
    <div class="wrapper row0">
      <div id="topbar" class="clear"> 
        <div class="fl_left">
          <!-- Hiển thị họ tên của người đã đăng nhập -->
            <p> Xin chào <?php ;echo $HoTen ?></p>
        </div >
        <div class="fl_right">
          <!-- Nút đăng xuất -->
            <button style="margin-top: 20px;" >
              <a href="index.html" style="font-size: 15px; color: black; " >Đăng xuất</a>
            </button>   
        </div>
      </div>
    </div>
    <div class="wrapper row1">
      <header id="header" class="clear"> 
        <div id="logo" class="fl_left">
          <h1><a href="" style="font-size: 40px">Quản lý kho</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
          <ul class="clear">
            <li class="active"><a href="index2.php">Trang Chủ</a></li>
            <li><a class="drop" href="#">Quản Lý</a>
              <ul>
                <li><a class="drop" href="#">Quản Lý Kho</a>
                  <ul>
                    <li><a href="PhieuNhap.php">Nhập Kho</a></li>
                    <li><a href="PhieuXuat.php">Xuất Kho</a></li>
                  </ul>
                </li>
                <li><a href="QuanLyNV.php">Nhân Viên</a></li>
                <li><a href="NhaCungCap.php">Nhà Cung Cấp</a></li>
              </ul>
            </li>
            <li><a href="SanPham.php">Sản Phẩm</a></li>
            <li><a href="TonKho.php">Tồn Kho</a></li>
            <li><a class="drop" href="#">Thống kê</a>
                      <ul>
                        <li><a href="THONGKE_PN.php">Phiếu nhập kho</a></li>
                        <li><a href="THONGKE_PX.php">Phiếu xuất kho</a></li>
                      </ul>
            </li>
          </ul>
        </nav>
      </header>
    </div>
    <div class="wrapper row1">
      <section id="pageintro" class="clear"> 
        <p class="font-x2 capitalise">QUẢN LÝ NHẬP XUẤT KHO </p>
        <i class="fa fa-5x fa-pagelines"></i>
        <h2 class="font-x2 uppercase">Giải Pháp Giúp Doanh Nghiệp Của Bạn Hoạt Động Một Cách Tối Ưu Và Tiện Lợi Hơn!<br>
          </h2>
      </section>
    </div>
  </div>
</div>
<!-- End Top Background Image Wrapper -->
  </footer>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

        <div style = "font-size: 95%; border-top: 1px solid #E6E6E6; color: #838383; padding: 1em 3em;">  
            <ul class="nospace inline pushright">
                <li><i class="fa fa-phone"></i> 0939 295 759</li>
                <li><i class="fa fa-envelope-o"></i> khotong123@.com</li>
            </ul>
        </div>
</body>
</html>