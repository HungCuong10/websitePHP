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
?>

<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Sản phẩm</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="css/quanlykho.css">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <link rel="stylesheet" href="css/PhieuNhap1.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.11.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
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
        <h2 class="u-text u-text-1">DANH SÁCH SẢN PHẨM</h2>   
        
        <div class="u-table u-table-responsive u-table-1">
          <!-- Nút tìm kiếm -->         
          <input id="myInput" type="text" style="border-radius: 10px;" onkeyup = "MyFunction();" placeholder="Tìm kiếm...">  
          <!-- Bảng dữ liệu -->   
          <table class="u-table-entity" style="margin-top: 20px;" id="Bang1">
            <thead class="u-align-center u-palette-5-base u-table-header u-table-header-1">
              <tr style="height: 55px;">
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Nhà cung cấp </th>
                <th>Tên sản phẩm</th>
                <th> Loại sản phẩm </th>
                <th>Đơn vị </th>
                <th>Giá bán</th>
                <th> Số lượng còn </th>
              </tr>
              </thead>
              <?php
                 $STT = 1;
                 $result = $conn->query("SELECT sp.SP_MaSP, ncc.NCC_TenNCC, sp.SP_TenSP, lsp.LSP_TenloaiSP, sp.SP_Donvi, sp.SP_Price, sp.SP_SLcon
                                         FROM nhacungcap ncc, sanpham sp, loaisanpham lsp
                                         WHERE ncc.NCC_MaNCC = sp.SP_MaNCC AND sp.SP_MaloaiSP = lsp.LSP_MaloaiSP
                                         ORDER BY sp.SP_SLcon DESC ") or die($conn->error);
                //  Bắt đầu vòng lặp
                  while($row = $result ->fetch_assoc()): ?> 
                  <tbody id = "myTable" style = "text-align: center;">
                  <tr>
                     <td><?php echo $STT++;?> </td>
                     <td><?php echo $row['SP_MaSP'];?> </td>
                     <td><?php echo $row['NCC_TenNCC'];?> </td>
                     <td><?php echo $row['SP_TenSP'];?> </td>
                     <td><?php echo $row['LSP_TenloaiSP'];?> </td>
                     <td><?php echo $row['SP_Donvi'];?> </td>
                     <td><?php echo $row['SP_Price'];?> </td>
                     <td>
                        <?php 
                          $SoLuong = $row['SP_SLcon'];
                          if($SoLuong == 0)
                          {
                            echo "<span style='color:red;text-align:center;'> Hết hàng </span>";
                          }
                          else
                          {
                             echo $SoLuong;
                          }
                        ?> 
                     </td>
                  </tr>
                  </tbody>
                  <?php endwhile; ?>   
            <!-- Kết thúc vòng lặp -->
            </tbody>            
          </table>
        </div>
      </section>