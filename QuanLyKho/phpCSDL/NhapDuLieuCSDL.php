<?php
    $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die("Không thể kết nối CSDL");
    $conn -> set_charset("utf8");
    
    $PN_MaPN = '';
    $PN_NgayNhap = '';
    $PN_MaNV = '';
    $PN_TenSP = '';
    $PN_SoLuong = '';
    $update = false;
   // Xử lý nút lưu
   if(isset($_POST['submit']))
   {           
       // Tạo biến dữ liệu của bảng phieunhap
       $NgayNhap = $_POST['NgayNhap'];
       $MaNV = $_POST['cbNhanVien'];
       // Tạo biến dữ liệu bảng chitietphieunhap
       $SoLuong = $_POST['SoLuong'];
       $MaSP = $_POST['cbSanPham'];

     
       if($NgayNhap && $MaNV && $SoLuong && $MaSP)
       {
           //INSERT phieunhap
           $conn->query("INSERT INTO `phieunhap`(`PN_NgayLap`, `PN_ID`) 
           VALUES('$NgayNhap', '$MaNV')") or die ($conn->error);
         //   Lấy dữ liệu cột MaSP của phiếu nhập
           $MaPhieuNhap = $conn->query("SELECT * FROM phieunhap WHERE PN_ID = '$MaNV'") or die($conn->error);
           while($row = $MaPhieuNhap -> fetch_assoc())
           {
           $MaPN = $row['PN_MaPN'];             
           }              
            //INSERT chitietphieunhap
            $conn->query("INSERT INTO `chitietphieunhap`(`CTN_SoLuong`, `CTN_MaSP`, `CTN_MaPN`) 
            VALUES('$SoLuong', '$MaSP', '$MaPN')") or die ($conn->error);    
       
             //UPDATE số lượng sản phẩm             
             $SoLuongCon = $conn->query("SELECT * FROM sanpham WHERE SP_MaSP = '$MaSP'") or die($conn->error);
             $SoLuongNhap = $conn->query("SELECT * FROM chitietphieunhap WHERE CTN_MaSP = '$MaSP'") or die($conn->error);
            //  Số lượng sản phẩm còn
             while($row1 = $SoLuongCon -> fetch_assoc())
               {
                  $SLCon = $row1['SP_SLcon'];
               }
              //Số lượng sản phẩm nhập
              while($row2 = $SoLuongNhap -> fetch_assoc())
              {
               $SLNhap = $row2['CTN_SoLuong'];
              }          
            //   Cộng số lượng nhập vào số lượng còn lại của sản phẩm
               $SLTong = $SLCon+$SLNhap;   
               $conn->query("UPDATE sanpham SET SP_SLcon = '$SLTong' WHERE SP_MaSP = '$MaSP'");
                      
                echo "<script> alert ('Nhập thành công') </script>";
                echo"<script> location.replace('../PhieuNhap.php')</script>";    
       }
      else
      {
         echo "<script> alert ('Vui lòng xem lại thông tin của bạn') </script>"; 
         echo"<script> location.replace('../PhieuNhap.php')</script>";   
      } 
   }
?> 