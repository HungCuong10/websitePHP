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
             if($username == $row['NV_ID'])
             {
                 $HoTen = $row['NV_HoTen'];
                 $ChucVu = $row['NV_ChucVu'];    
             }
         }
     }   
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>NHÀ CUNG CẤP</title>
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
    <!-- Lấy các sự kiện từ file NhaCungCapCSDL.php -->
  <?php require_once 'phpCSDL/NhaCungCapCSDL.php'; ?>
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
          <!-- Phần menu -->
      <header id="header" class="clear"> 
        <div id="logo" class="fl_left">
          <h1><a href="index2.html" style="font-size: 40px">Quản lý kho</a></h1>
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
      <!-- Kết thúc phần menu -->
    </div>
      </div>
<!-- Kết thúc phần header -->

      <!-- Phần body -->
    <section class="u-align-center u-border-1 u-border-grey-75 u-clearfix u-section-1" id="sec-4b4c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-1">NHÀ CUNG CẤP</h2>
        <div class="u-form u-form-1">
          <!-- Form nhà cung cấp -->
          <form method="POST" action="phpCSDL/NhaCungCapCSDL.php" style="padding: 10px;" source="custom" name="form">
            <div class="u-form-group u-form-partition-factor-2">
              <!-- Mã nhà cung cấp -->
              <label >Mã Nhà Cung Cấp</label>
              <input type="text" id="MaNCC" name="MaNhaCungCap" value = "<?php echo $NCC_ID; ?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
              <!-- Tên nhà cung cấp -->
            <div class="u-form-date u-form-group u-form-partition-factor-2">
              <label >Tên Nhà Cung Cấp</label>
              <input type="text" id="NameNCC" name="TenNCC" value = "<?php echo $NCC_TenNCC; ?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
              <!--Sđt -->
            <div class="u-form-group u-form-partition-factor-2 u-form-group-3">
              <label >Số điện thoại nhà cung cấp</label>
              <input type="text" id="phone" name="SdtNhaCungCap" value = "<?php echo $NCC_SdtNCC; ?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>   
            <!-- Trạng thái    -->
            <?php if($TrangThai == true): ?>
             <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-4">
              <label> Trạng thái</label>
              <select id="TrangThai" name="TrangThai" value = "<?php echo $NCC_TrangThai; ?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                        <option value='true'> Đang kinh doanh </option>";
                        <option value='false'> Ngừng kinh doanh </option>";             
                </select>             
              </div>
              <?php endif;?>  
            <span style='color:red;text-align:center;'> Lưu ý: Vui Lòng kiểm tra lại tất cả các thông tin trước khi thực hiện thao tác </span>
            <!-- Sự kiện nút nút lưu và sửa dữ liệu từ bảng -->       
            <div class="u-align-center u-form-group u-form-submit">
               <?php
               if($update == true):
               ?>
                  <button type = "submit" name = "Sua"class= "u-btn u-btn-submit"> Sửa </button>
               <?php else: ?>
                  <button type = "submit" name = "Luu"class= "u-btn u-btn-submit"> Lưu </button>
                <?php endif; ?>    
             </div>    
          </form>
        </div>

      <div class="u-table u-table-responsive u-table-1">
          <!-- Nút tìm kiếm -->
          <input id="myInput" type="text" style="border-radius: 10px;" onkeyup = "MyFunction();" placeholder="Tìm kiếm...">
          <!-- Bảng dữ liệu -->
          <table id = "dataTable" class="u-table-entity" style="margin-top: 20px;">
            <thead class="u-align-center u-palette-5-base u-table-header u-table-header-1">
              <tr style="height: 55px;">
                <th>STT</th>
                <th>Mã Nhà Cung Cấp</th>
                <th>Tên Nhà Cung Cấp</th>
                <th>Số Điện Thoại</th>
                <th> Trạng thái </th>
                <th> </th>        
              </tr>
              </thead>
              <!-- Hiển thị dữ liệu xuống bảng -->
              <?php        
                 $sql = "SELECT * FROM nhacungcap";
                 $result = $conn -> query ($sql) ;
                $conn->close();
                //  Bắt đầu vòng lặp
                  $STT = 1;
                  while($row = $result ->fetch_assoc()): ?> 
                  <tbody id = "myTable" style = "text-align: center;">
                  <tr>
                     <td><?php echo $STT++;?> </td>
                     <td><?php echo $row['NCC_MaNCC'];?> </td>
                     <td><?php echo $row['NCC_TenNCC'];?> </td>
                     <td><?php echo $row['NCC_SdtNCC'];?> </td>
                     <td>
                        <?php 
                          $TrangThai = $row['TrangThai'];
                          if($TrangThai == 1)
                          {
                            echo 'Đang kinh doanh';
                          }
                          else
                          {
                            echo "<span style='color:red;text-align:center;'> Ngừng kinh doanh </span>";
                          }
                        ?> 
                     </td>
                     <td> <a href="NhaCungCap.php?edit=<?php echo $row['NCC_MaNCC'];?>"
                           class="btn btn-info"> Sửa </a> 
                     </td>           
                  </tr>
                  </tbody>
                  <?php endwhile; ?>    
            <!-- Kết thúc vòng lặp -->             
          </table>
        </div>
    </section>
    <!-- Kết thúc phần body -->
  </body>
</html>