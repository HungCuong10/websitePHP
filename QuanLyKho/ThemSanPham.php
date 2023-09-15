  <?php
   session_start();
   $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die($conn->error); 
   $conn -> set_charset("utf8");
    // Liên kết tài khoản đã đăng nhập thành công 
   $username = $_SESSION['DN_ID'];
   $sql = $conn -> query("SELECT * FROM nhanvien WHERE NV_ID = '$username'");
   if(mysqli_num_rows($sql)>0)
   {
       while($row = $sql->fetch_assoc())
       {
            // Lấy họ tên và chức vụ của người đăng nhập
           $username = $row['NV_ID'];
           $HoTen = $row['NV_HoTen'];
           $ChucVu = $row['NV_ChucVu'];              
       }
   }   

    // Lấy dữ liệu ra combobox bảng Nhà cung cấp
      $CbNhaCC = $conn -> query("SELECT * FROM nhacungcap");
    // Lấy dữ liệu ra combobox bảng loại sản phẩm
      $CbLoaiSP = $conn -> query("SELECT * FROM loaisanpham");
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Thêm thông tin sản phẩm</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="css/quanlykho.css">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/PhieuNhap.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
     <!-- Chức năng tìm kiếm -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script>
            $(document).ready(function MyFunction(){
            $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
           });
         });
         </script> 
  </head>
  <body class="u-body u-overlap">

    <!-- Phần header -->
    <div class="bgded" style="background-image:url('https://img.freepik.com/free-vector/elegant-white-background-with-shiny-lines_1017-17580.jpg?size=626&ext=jpg');">
      <div class="overlay"> 
        <div class="wrapper row0">
          <div id="topbar" class="clear"> 
            <div class="fl_left">
              <ul class="nospace inline pushright">
                <li><i class="fa fa-phone"></i> 0939 295 759</li>
                <li><i class="fa fa-envelope-o"></i> khotong123@.com</li>
              </ul>
            </div >
            <div class="fl_right">
           <ul><a href="index.html">Đăng xuất</a></ul>
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
       <!-- Truy cập vào trang theo chức vụ của người đăng nhập -->
            <?php
            // Quản lý
               if($ChucVu == 'Quản lý')
               {
                  echo"<li class='active'><a href='index2.php'>Trang Chủ</a></li>";
                  echo "<li><a class='drop' href='#'>Quản Lý</a>";
                  echo "<ul>";
                  echo "<li><a class='drop' href='#'>Quản Lý Kho</a>";
                  echo "<ul>";
                  echo "<li><a href='PhieuNhap.php'>Nhập Kho</a></li>";
                  echo "<li><a href='PhieuXuat.php'>Xuất Kho</a></li>";
                  echo "</ul>";
                  echo "</li>";
                  echo "<li><a href='QuanLyNV.php'>Nhân Viên</a></li>";
                  echo "<li><a href='NhaCungCap.php'>Nhà Cung Cấp</a></li>";
                  echo "</ul>";
                  echo "</li>";
                  echo "<li><a href='SanPham.php'>Sản Phẩm</a></li>";
                  echo "<li><a href='TonKho.php'>Tồn Kho</a></li>";
                  echo "<li><a class='drop' href='#'>Thống kê</a>";
                  echo "<ul>";
                  echo "<li><a href='THONGKE_PN.php'>Phiếu nhập kho</a></li>";
                  echo "<li><a href='THONGKE_PX.php'>Phiếu xuất kho</a></li>";
                  echo "</ul>";
                  echo "</li>";
               }
               //Nhân viên
               else
               {
                  echo"<li class='active'><a href='index3.php'>Trang Chủ</a></li>";
                  echo "<li><a class='drop' href='#'>Quản Lý</a>";
                  echo "<ul>";
                  echo "<li><a class='drop' href='#'>Quản Lý Kho</a>";
                  echo "<ul>";
                  echo "<li><a href='PhieuNhap.php'>Nhập Kho</a></li>";
                  echo "<li><a href='PhieuXuat.php'>Xuất Kho</a></li>";
                  echo "</ul>";
                  echo "</li>";
                  echo "</ul>";
                  echo "</li>";
                  echo "<li><a href='SanPham.php'>Sản Phẩm</a></li>";
                  echo "<li><a href='TonKho.php'>Tồn Kho</a></li>";
                  echo "<li><a class='drop' href='#'>Thống kê</a>";
                  echo "<ul>";
                  echo "<li><a href='THONGKE_PN.php'>Phiếu nhập kho</a></li>";
                  echo "<li><a href='THONGKE_PX.php'>Phiếu xuất kho</a></li>";
                  echo "</ul>";
                  echo "</li>";
               }
            ?>

          </ul>
        </nav>
      </header>
    </div>
      </div>
<!-- Kết thúc phần header -->
  <!-- Phần body -->
  <section class="u-align-center u-border-1 u-border-grey-75 u-clearfix u-section-1" id="sec-4b4c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-1">THÊM THÔNG TIN SẢN PHẨM</h2>
        <div class="u-form u-form-1">
          <!-- Form nhập phiếu -->
          <form method="POST" action="phpCSDL/ThemSanPhamCSDL.php" style="padding: 10px;" source="custom" name="form">
            <!-- Mã sản phẩm -->
            <div class="u-form-group u-form-partition-factor-2">         
              <label>Mã sản phẩm</label>
              <input type="text" id="txtMaPhieuNhap" name="MaSanPham" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
            <!-- Tên sản phẩm -->
            <div class="u-form-group u-form-partition-factor-2">         
              <label>Tên sản phẩm</label>
              <input type="text" id="txtTenSanPham" name="TenSanPham" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
            <!-- Loại sản phẩm -->
            <div class="u-form-group u-form-group-7">
              <label>Loại sản phẩm</label>
              <select id="txtLoaiSP" name="cbLoaiSP" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                    <?php
                    while($row = $CbLoaiSP -> fetch_assoc())
                    {
                      $TenLoaiSP = $row['LSP_TenloaiSP'];
                      $ID_LoaiSP = $row['LSP_MaloaiSP'];
                      echo "<option value='$ID_LoaiSP'> $TenLoaiSP </option>";
                    }           
                    ?>
                </select>
            </div>
              <!-- Nhà cung cấp -->
             <div class="u-form-group u-form-partition-factor-2 u-form-group-3">
              <label>Nhà cung cấp</label>
              <select id="txtNCC" name="cbNCC" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                    <?php
                    while($row = $CbNhaCC -> fetch_assoc())
                    {
                      $NCC = $row['NCC_TenNCC'];
                      $id_NCC = $row['NCC_MaNCC'];
                      echo "<option value='$id_NCC'> $NCC </option>";
                    } 
                    ?>
                </select>
            </div>  
               <!-- Đơn giá  -->
               <div class="u-form-group u-form-partition-factor-2 u-form-group-10">
              <label>Giá bán</label>
              <input type="text" id="txtGiaBan" name="GiaBan" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
               <!-- Đơn vị -->
            <div class="u-form-group u-form-partition-factor-2 u-form-group-10">
              <label>Đơn vị</label>
              <input type="text" id="txtDonVi" name="DonVi" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
            <!-- Trạng thái -->
            <div class="u-form-group u-form-partition-factor-2 u-form-group-10">
              <label>Trạng thái</label>
              <select id="TrangThai" name="TrangThai" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                      <option value='true'> Còn kinh doanh </option>
                      <option value='false'> Ngừng kinh doanh </option>
              </select>
            </div>
            <div class="u-align-center u-form-group u-form-submit">
              <!-- Nút Lưu -->     
              <input type = "submit" name = "them" value = "Thêm" class= "u-btn u-btn-submit"/>     
            </div>   
          </form>
        </div>
  </body>
</html>