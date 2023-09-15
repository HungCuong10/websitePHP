<?php
    $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die("Không thể kết nối CSDL");
    $conn -> set_charset("utf8");
   // Xử lý nút lưu
   if(isset($_POST['submit']))
   {           
       //   Tạo biến dữ liệu của bảng phieunhap
       $NgayXuat = $_POST['NgayXuat'];
       $MaNV = $_POST['cbNhanVien'];
       // Tạo biến dữ liệu bảng chitietphieunhap
       $SoLuong = $_POST['SoLuong'];
       $MaSP = $_POST['cbSanPham'];
      //  Nếu có đầy đủ thông tin
       if($NgayXuat && $MaNV && $SoLuong && $MaSP)
       {
             //UPDATE số lượng sản phẩm             
             $SoLuongCon = $conn->query("SELECT * FROM sanpham WHERE SP_MaSP = '$MaSP'") or die($conn->error);
               //  Số lượng còn
             while($row1 = $SoLuongCon -> fetch_assoc())
               {
                  $SLCon = $row1['SP_SLcon'];
               }   
               // Nếu số lượng muốn xuất lớn hơn số lượng còn lại
              if($SoLuong>$SLCon)
              {
               echo "<script> alert ('Số lượng trong kho không đủ để tạo đơn xuất') </script>";
               echo"<script> location.replace('../PhieuXuat.php')</script>"; 
              }     
            //  Ngược lại...
              else
              { 
               // UPDATE SoLuong trong sanpham
                $SLTong = $SLCon-$SoLuong;
                $conn->query("UPDATE sanpham SET SP_SLcon = '$SLTong' WHERE SP_MaSP = '$MaSP'");

                 //INSERT phieunhap
                 $conn->query("INSERT INTO `phieuxuat`(`PX_NgayLap`, `PX_ID`) 
                             VALUES('$NgayXuat', '$MaNV')") or die ($conn->error);
                 $MaPhieuNhap = $conn->query("SELECT * FROM phieuxuat WHERE PX_ID = '$MaNV'") or die($conn->error);
                 while($row = $MaPhieuNhap -> fetch_assoc())
                  {
                     $MaPX = $row['PX_MaPX'];             
                  }              
                 //INSERT chitietphieunhap
                   $conn->query("INSERT INTO `chitietphieuxuat`(`CTX_Soluong`, `CTX_MaSP`, `CTX_MaPX`) 
                                 VALUES('$SoLuong', '$MaSP', '$MaPX')") or die ($conn->error);  
               } 
               echo "<script> alert ('Tạo đơn xuất thành công') </script>";
               echo"<script> location.replace('../PhieuXuat.php')</script>";    
       }
       
      else
      {
          echo "<script> alert ('Tạo đơn xuất thất bại. Vui long kiểm tra lại thông tin của bạn') </script>";
          echo"<script> location.replace('../PhieuXuat.php')</script>"; 
      }
   }

?> 