<?php
        session_start();
        $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die($conn->error);
        $conn -> set_charset("utf8"); 
        // Lấy thông tin của người đăng nhập
        $username = $_SESSION['DN_ID'];
        $sql = $conn -> query("SELECT * FROM nhanvien WHERE NV_ID = '$username'");
        if(mysqli_num_rows($sql)>0)
        {
          // Gán vào biến
            while($row = $sql->fetch_assoc())
            {
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
    <!-- Lấy các sự kiện từ file SuaSP.php -->
    <?php require_once 'phpCSDL/SuaSP.php' ?>
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
               // Nhân viên
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
        <h2 class="u-text u-text-1">Danh sách sản phẩm</h2>   
        
        <div class="u-table u-table-responsive u-table-1">
          <!-- Nút tìm kiếm -->         
          <input id="myInput" type="text" style="border-radius: 10px;" onkeyup = "MyFunction();" placeholder="Tìm kiếm...">  
          <!-- Bảng dữ liệu -->   
          <table class="u-table-entity" style="margin-top: 20px;" id="Bang1">
            <thead class="u-align-center u-palette-5-base u-table-header u-table-header-1">
              <tr style="height: 55px;">
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn vị </th>
                <th>Giá bán</th>
                <th> Trạng thái </th>
                <th>Thao tác</th>
              </tr>
              </thead>
              <?php
                 $STT = 1;
                 $result = $conn->query("SELECT * FROM sanpham ORDER BY SP_MaSP") or die($conn->error);
                //  Bắt đầu vòng lặp
                  while($row = $result ->fetch_assoc()): ?> 
                  <tbody id = "myTable" style = "text-align: center;">
                  <tr>
                     <td><?php echo $STT++;?> </td>
                     <td><?php echo $row['SP_MaSP'];?> </td>
                     <td><?php echo $row['SP_TenSP'];?> </td>
                     <td><?php echo $row['SP_Donvi'];?> </td>
                     <td><?php echo $row['SP_Price'];?> </td>
                     <td>
                        <?php 
                         // Trạng thái
                          $TrangThai1 = $row['TrangThai'];
                          if($TrangThai1 == true)
                          {
                            echo 'Còn kinh doanh';
                          }
                          if($TrangThai1 == false)
                          {
                            echo "<span style='color:red;text-align:center;'> Ngừng kinh doanh </span>";
                          }
                        ?> 
                     </td>
                     <td> 
                       <a href="SanPham.php?edit=<?php echo $row['SP_MaSP']; ?>" class="btn btn-info" > Sửa </a>                      
                     </td>

                  </tr>
                  </tbody>
                  <?php endwhile; ?>   
            <!-- Kết thúc vòng lặp -->
            </tbody>            
          </table>
        </div>
        <!-- Nút Thêm Sản Phẩm -->
        <div class="u-form u-form-2">
              <a href="ThemSanPham.php" class="u-btn u-button-style" style="margin-left: 500px;">Thêm sản phẩm<br></a>
          </form>    
        </div>
      </section>
      <!-- Form sửa -->
        <section class="u-align-center u-border-1 u-border-grey-75 u-clearfix u-section-1">
        <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-form u-form-1">   
          <form method="POST" action="phpCSDL/SuaSP.php" style="padding: 10px; " source="custom" name="form">
            <div class="u-form-group">
              <!-- Mã sản phẩm -->
              <label>Mã sản phẩm (Không thể sửa được mã sản phẩm)</label>
              <input type="text" id="txtMaSP" name="SP_MaSP" value="<?php echo $SP_MaSP;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>
              <!-- Tên sản phẩm -->
            <div class="u-form-group u-form-partition-factor-2">
              <label>Tên sản phẩm</label>
              <input type="text" id="txtTenSP" name="SP_TenSP" value="<?php echo $SP_TenSP;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div>

              <!-- Giá bán -->
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-4">
              <label> Giá bán</label>
              <input type="text" id="txtGiaBan" name="SP_Price" value="<?php echo $SP_Price;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div> 
            <!-- Giá bán -->
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-4">
              <label> Đơn vị</label>
              <input type="text" id="txtDonvi" name="SP_Donvi" value="<?php echo $SP_Donvi;?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
            </div> 
            <div class="u-form-group u-form-group-8 ">
            <!-- Trạng thái -->
            <div class="u-form-group u-form-partition-factor-2 u-form-group-10">
              <label>Trạng thái</label>
              <select id="TrangThai" name="SP_TrangThai" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10">
                      <option> </option>
                      <option value= true> Còn kinh doanh </option>
                      <option value= false> Ngừng kinh doanh </option>
              </select>
            </div>
             </div> 
            <div class="u-align-center u-form-group u-form-submit">
              <!-- Nút Lưu -->     
              <input type = "submit" name = "Sua" value = "Sửa" class= "u-btn u-btn-submit"/>
            </div> 
         </form>
        </div> 
      </div>
    </section>
    <!-- Kết thúc phần body -->
  </body>
</html>