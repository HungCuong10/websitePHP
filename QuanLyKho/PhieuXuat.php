<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die($conn->error); 
  $conn -> set_charset("utf8");
  // Lấy thông tin của người đăng nhập
  $username = $_SESSION['DN_ID'];
  $sql = $conn -> query("SELECT * FROM nhanvien WHERE NV_ID = '$username'");
  if(mysqli_num_rows($sql)>0)
  {
      while($row = $sql->fetch_assoc())
      {
        // Gán vào biến
          $username = $row['NV_ID'];
          $HoTen = $row['NV_HoTen'];
          $ChucVu = $row['NV_ChucVu'];              
      }
  }   
    // Lấy dữ liệu ra combobox bảng Nhân viên
    $CbNV = $conn -> query("SELECT * FROM nhanvien");
    // Lấy dữ liệu ra combobox bảng Sản phẩm
    $CbSanPham = $conn -> query("SELECT * FROM sanpham");

?>

<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Phiếu xuất kho</title>
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
          <!-- Header -->
          <header id="header" class="clear"> 
            <div id="logo" class="fl_left">
              <h1><a href="" style="font-size: 40px">Quản lý kho</a></h1>
            </div>
        <nav id="mainav" class="fl_right">
          <ul class="clear">
            <!-- Truy cập trang theo chức vụ của người đăng nhập -->
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
               //  Nhân viên
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
        <h2 class="u-text u-text-1">PHIẾU XUẤT KHO</h2>
        <div class="u-form u-form-1">
          <!-- Form nhập phiếu -->
          <form method="POST" action="phpCSDL/XuatDuLieuCSDL.php" style="padding: 10px;" source="custom" name="form">
              <!-- Ngày nhập -->
            <div class="u-form-date u-form-group u-form-partition-factor-2">
              <label>Ngày xuất</label>
              <input type="date" id="dtNgayXuat" name="NgayXuat" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
              <!-- Nhân viên -->
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-4">
              <label> Nhân viên</label>
              <div class="u-form-select-wrapper">
                <select id="txtNhanVien" name="cbNhanVien" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                   <!-- Kiểm tra trạng thái của nhân viên -->
                    <?php
                    while($row = $CbNV -> fetch_assoc())
                    {
                      $HoTen = $row['NV_HoTen'];
                      $id = $row['NV_ID'];
                      $TrangThaiNV = $row['TrangThai'];
                      if($TrangThaiNV == true)
                      {
                        echo "<option value='$id'> $HoTen </option>";
                      }                     
                    } 
                    ?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
               </div> 
              </div>  
               
               <!-- Tên sản phẩm -->
               <div class="u-form-group u-form-group-8 ">
              <label>Tên sản phẩm </label>
              <div class="u-form-select-wrapper">
              <select id="txtSanPham" name="cbSanPham" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                    <!-- Kiểm tra trạng thái của sản phẩm -->
                    <?php
                    while($row = $CbSanPham -> fetch_assoc())
                    {
                      $TenSP = $row['SP_TenSP'];
                      $ID_SP = $row['SP_MaSP'];
                      $TrangThaiSP = $row['TrangThai'];
                      if($TrangThaiSP)
                      {
                      echo "<option value='$ID_SP'> $TenSP </option>";
                      }
                    } 
                    ?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
               </div> 
            </div>        
            <!-- Số lượng -->
            <div class="u-form-group u-form-group-9">
              <label>Số lượng</label>
              <input type="number" min="0" id="SoLuong" name="SoLuong" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>              
            <span style='color:red;text-align:center;'> Lưu ý: Vui Lòng kiểm tra lại tất cả các thông tin trước khi thực hiện thao tác </span>       
            <div class="u-align-center u-form-group u-form-submit">
              <!-- Nút Lưu -->     
              <input type = "submit" name = "submit" value = "Xuất" class= "u-btn u-btn-submit"/>     
            </div>   
          </form>
        </div>

        <div class="u-table u-table-responsive u-table-1">

        <h2 class="u-text u-text-1">THÔNG TIN PHIẾU XUẤT</h2>
          <!-- Nút tìm kiếm -->
          <input id="myInput" type="text" style="border-radius: 10px;" onkeyup = "MyFunction();" placeholder="Tìm kiếm...">
          <!-- Bảng dữ liệu -->
          <table id = "dataTable" class="u-table-entity" style="margin-top: 20px;">
            <thead class="u-align-center u-palette-5-base u-table-header u-table-header-1">
              <tr style="height: 55px;">
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn vị</th>
                <th>Số lượng</th>
                <th>Giá bán (VNĐ)</th>
                <th>Ngày xuất</th>
                <th>Người xuất</th>
              </tr>
              </thead>
              <!-- Hiển thị dữ liệu xuống bảng -->
              <?php
                 $STT = 1;
                 $result = $conn->query("SELECT ct.CTX_MaSP, lsp.LSP_TenloaiSP, sp.SP_TenSP, sp.SP_Donvi, ct.CTX_SoLuong, sp.SP_Price, px .PX_Ngaylap ,nv.NV_HoTen 
                                          FROM phieuxuat px, chitietphieuxuat ct, sanpham sp, nhanvien nv, loaisanpham lsp
                                          WHERE px.PX_MaPX = ct.CTX_MaPX 
                                                AND ct.CTX_MaSP = sp.SP_MaSP 
                                                AND px.PX_ID = nv.NV_ID 
                                                AND sp.SP_MaloaiSP = lsp.LSP_MaloaiSP");

                //  Bắt đầu vòng lặp
                  $STT = 1;
                  while($row = $result ->fetch_assoc()): ?> 
                  <tbody id = "myTable" style = "text-align: center;">
                  <tr>
                     <td><?php echo $STT++;?> </td>
                     <td><?php echo $row['CTX_MaSP'];?> </td>
                     <td><?php echo $row['LSP_TenloaiSP'];?> </td>
                     <td><?php echo $row['SP_TenSP'];?> </td>
                     <td><?php echo $row['SP_Donvi'];?> </td>
                     <td><?php echo $row['CTX_SoLuong'];?> </td>
                     <td><?php echo $row['SP_Price'];?> </td>
                     <td>
                          <?php 
                               $NgayLapPX = $row['PX_Ngaylap'];
                           //  Thay đổi format ngày lập 
                               $newDate = date("d-m-Y", strtotime($NgayLapPX));
                               echo $newDate;
                          ?> 
                     </td>
                     <td><?php echo $row['NV_HoTen'];?> </td>
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