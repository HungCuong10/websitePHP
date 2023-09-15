<?php
  $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die($conn->error);
  $conn -> set_charset("utf8");
  
  $update = false;
  $TrangThai = false;
 
  $NV_ID = '';
  $NV_HoTen = '';
  $NV_GioiTinh = '';
  $NV_NgaySinh = '';

// Hàm check kí tự đặc biệt
  function KiemTra($my_string){
    $KiTu = preg_match('/[@_!#$%^&*()<>?|}{~:]/i', $my_string);
    if($KiTu){
       print ("<script> alert ('Thông tin có chứa kí tự đặc biệt. Vui lòng thử lại') </script>");
       return $my_string;
    }
  }
// Xử lý nút lưu
  if(isset($_POST['Luu']))
  {
      $MaNhanVien = $_POST['MaNV'];
      $HoTen = $_POST['HoTen'];
      $GT = $_POST['GioiTinh'];
      $ChucVuNV = $_POST['ChucVu'];
      $NgaySinhNV = $_POST['NgaySinh'];
  
// Nếu có ký tự đặc biệt
      if(KiemTra($MaNhanVien) || KiemTra($HoTen))
      {
        echo"<script> location.replace('../QuanLyNV.php')</script>";
      }
      else
      {
         if($MaNhanVien && $HoTen && $GT && $ChucVuNV && $NgaySinhNV)
         {
          // Thêm vào bảng đăng nhập với tài khoản là mã nhân viên và mật khẩu 0123
          $conn -> query("INSERT INTO `dangnhap`(`DN_ID`,`DN_Matkhau`)
                          VALUES ('$MaNhanVien','0123')") or die($conn->error);
          // Thêm vào bảng nhân viên
           $conn -> query("INSERT INTO `nhanvien`(`NV_ID`, `NV_HoTen`, `NV_Sex`, `NV_ChucVu`, `NV_NamSinh`, `TrangThai`) 
                           VALUES ('$MaNhanVien','$HoTen','$GT','$ChucVuNV','$NgaySinhNV',true)") or die($conn->error);
           echo "<script> alert ('Thêm thành công') </script>";
           echo"<script> location.replace('../QuanLyNV.php')</script>";
         }      
          else
           {
             echo "<script> alert ('Thất bại. Vui lòng kiểm tra lại thông tin') </script>";
             echo"<script> location.replace('../QuanLyNV.php')</script>";
           }
       }   
  }
// Sự kiện khi ấn nút sửa
  if(isset($_GET['btnsua']))
  {
      $NV_ID = $_GET['btnsua'];
      $update = true;
      $TrangThai = true;
      $result = $conn->query("SELECT * FROM nhanvien WHERE NV_ID = '$NV_ID'") or die($conn->error);

      if(mysqli_num_rows($result) > 0)
      {
          $row = $result->fetch_array();
  
          $NV_HoTen = $row['NV_HoTen'];
          $NV_GioiTinh = $row['NV_Sex'];   
          $NV_ChucVu = $row['NV_ChucVu'];
          $NV_NgaySinh = $row['NV_NamSinh'];
          $NV_TrangThai = $row['TrangThai'];
      }
  }
// Xử lí nút sửa
  if(isset($_POST['Sua']))
  {
    $ED_MaNV = $_POST['MaNV'];
    $ED_HoTen = $_POST['HoTen'];
    $ED_GioiTinh = $_POST['GioiTinh'];
    $ED_ChucVu = $_POST['ChucVu'];
    $ED_NgaySinh = $_POST['NgaySinh'];
    $ED_TrangThai = $_POST['TrangThai'];

    // Khi thông tin không bị bỏ trống
       if($ED_HoTen && $ED_GioiTinh && $ED_NgaySinh && $ED_TrangThai && $ED_ChucVu)
       {   
        if(KiemTra($ED_MaNV) || KiemTra($ED_HoTen))
        {
          echo"<script> location.replace('../QuanLyNV.php')</script>";
        }
        else 
        {
               $conn -> query("UPDATE nhanvien SET NV_HoTen = '$ED_HoTen', NV_Sex = '$ED_GioiTinh',
                              NV_ChucVu = '$ED_ChucVu', NV_NamSinh= '$ED_NgaySinh', TrangThai = $ED_TrangThai WHERE NV_ID = '$ED_MaNV'");
                echo "<script> alert ('Đã cập nhật thông tin') </script>";
                echo"<script> location.replace('../QuanLyNV.php')</script>";     
       }  
      }
       else
       {
          echo "<script> alert ('Thất bại. Vui lòng kiểm tra lại thông tin') </script>";
          echo"<script> location.replace('../QuanLyNV.php')</script>";
       }
    
  }
?>