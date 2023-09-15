<?php
 $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die("Không thể kết nối CSDL");
 $CbNhanVien = $conn -> query("SELECT * FROM nhanvien") or die ($conn ->error);
 $conn -> set_charset("utf8");
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Quản lý nhân viên</title>
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
<!-- Lấy các sự kiện từ file ThemNhanVienCSDL.php -->
  <?php require_once 'phpCSDL/ThemNhanVienCSDL.php'; ?>
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
    </div>
      </div>
<!-- Kết thúc phần header -->

<!-- Phần body -->
<section class="u-align-center u-border-1 u-border-grey-75 u-clearfix u-section-1" id="sec-4b4c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2>THÊM NHÂN VIÊN</h2>
        <div class="u-form u-form-1">
          <!-- Form nhập phiếu -->
          <form method="POST" action="phpCSDL/ThemNhanVienCSDL.php" style="padding: 10px;" source="custom" name="form">
          <!-- Mã nhân viên -->
           <div class="u-form-date u-form-group u-form-partition-factor-2">
              <label>Mã nhân viên</label>
              <input type="text" id="txtMaNV" name="MaNV" value ="<?php echo $NV_ID;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
           </div> 
           <!-- Họ và tên -->
           <div class="u-form-date u-form-group u-form-partition-factor-2">
              <label>Họ và tên</label>
              <input type="text" id="txtHoTen" name="HoTen" value ="<?php echo $NV_HoTen;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
           <!-- Giới tính -->
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-4">
              <label> Giới tính</label>
                <div class="u-form-select-wrapper">
                <select id="GioiTinh" name="GioiTinh" value ="<?php echo $NV_GioiTinh;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                   <option value = "Nam"> Nam </option>
                   <option value = "Nữ"> Nữ </option>
                </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                </div>
            </div>
            <!-- Chức vụ -->
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-4">
              <label> Chức vụ</label> 
                <div class="u-form-select-wrapper">         
                <select id="ChucVu" name="ChucVu" value ="<?php echo $NV_ChucVu;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                   <option value = "Quản lý"> Quản lý </option>
                   <option value = "Nhân viên"> Nhân viên </option>
                </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                 </div>
            </div> 
            <!-- Ngày sinh -->
            <div class="u-form-date u-form-group u-form-partition-factor-2">
              <label>Ngày sinh</label>
              <input type="date" id="dtNgaySinh" name="NgaySinh" value ="<?php echo $NV_NgaySinh; ?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
            <?php if($TrangThai == true): ?>
             <!-- Trạng thái -->
             <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-4">
              <label> Trạng thái</label>
               <div class="u-form-select-wrapper">
              <select id="TrangThai" name="TrangThai" value = <?php echo $NV_TrangThai; ?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                        <option value='true'> Đang làm việc </option>";
                        <option value='false'> Đã nghỉ việc </option>";             
              </select>  
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                 </div>
                <?php endif;?>      
              </div>
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

        <div class="u-table u-table-responsive u-table-1">
          <!-- Nút tìm kiếm -->         
          <input id="myInput" type="text" style="border-radius: 10px;" onkeyup = "MyFunction();" placeholder="Tìm kiếm...">  
          <!-- Bảng dữ liệu -->   
           <table id = "dataTable" class="u-table-entity" style="margin-top: 20px;">
            <thead class="u-align-center u-palette-5-base u-table-header u-table-header-1">
              <tr style="height: 55px;">
                <th>STT</th>
                <th>Mã nhân viên</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Chức vụ</th>
                <th>Ngày sinh</th>
                <th>Trạng thái</th>
                <th> </th>
                </tr>
              </thead>
              <!-- Hiển thị dữ liệu xuống bảng -->
              <?php
                 $STT = 1;
                 $result = $conn->query("SELECT * FROM nhanvien");
                //  Bắt đầu vòng lặp
                  $STT = 1;
                  while($row = $result ->fetch_assoc()): ?> 
                  <tbody id = "myTable" style = "text-align: center;">
                  <tr>
                     <td><?php echo $STT++;?> </td>
                     <td><?php echo $row['NV_ID'];?> </td>
                     <td><?php echo $row['NV_HoTen'];?> </td>
                     <td><?php echo $row['NV_Sex'];?> </td>
                     <td><?php echo $row['NV_ChucVu'];?> </td>
                     <td>
                          <?php 
                               $NamSinh = $row['NV_NamSinh'];
                           //  Thay đổi format ngày lập 
                               $newDate = date("d-m-Y", strtotime($NamSinh));
                               echo $newDate;
                          ?> 
                     </td>
                     <td>
                        <?php 
                          $TrangThai = $row['TrangThai'];
                          if($TrangThai == 1)
                          {
                            echo 'Đang làm việc';
                          }
                          else
                          {
                            echo "<span style='color:red;text-align:center;'> Đã nghỉ việc </span>";
                          }
                        ?> 
                     </td>
                     <td> <a href="QuanLyNV.php?btnsua=<?php echo $row['NV_ID'];?>"
                           class="btn btn-info"> Sửa </a> 
                     </td>
                  </tr>
                  </tbody>
                  <?php endwhile; ?>
                  </table>
        </div>
    </section>
    </body>
</html>




 