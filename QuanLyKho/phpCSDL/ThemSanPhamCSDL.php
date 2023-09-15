<?php
  $conn = mysqli_connect("localhost", "root", "", "quanlykho") or die("Không thể kết nối CSDL");
  $conn -> set_charset("utf8");
  //Hàm kiểm tra kí tự đặc biêt
  function KiemTra($my_string){
    $KiTu = preg_match('/[@_!#$%^&*()<>?|}{~:]/i', $my_string);
    if($KiTu){
       print ("<script> alert ('Thông tin có chứa kí tự đặc biệt. Vui lòng thử lại') </script>");
       return $my_string;
    }
  }
  // Xử lý nút thêm
if(isset($_POST['them']))
{
    $MaSP = $_POST['MaSanPham'];
    $TenSanPham = $_POST['TenSanPham'];
    $LoaiSP = $_POST['cbLoaiSP'];
    $NCC = $_POST['cbNCC'];
    $GiaBan = $_POST['GiaBan'];
    $DonVi = $_POST['DonVi'];
    $TrangThai = $_POST['TrangThai'];
  // Nếu thông tin không bị bỏ trống
    if($MaSP && $TenSanPham && $LoaiSP && $NCC && $GiaBan && $DonVi && $TrangThai)
    {

      if(KiemTra($MaSP) || KiemTra($TenSanPham))
        {
          echo"<script> location.replace('../ThemSanPham.php')</script>";
        }
        else
        {
        // INSERT vào bản sampham
         $conn -> query("INSERT INTO `sanpham`(`SP_MaSP`, `SP_TenSP`, `SP_Price`, `SP_Donvi`, 
                              `SP_SLcon`, `SP_MaloaiSP`, `SP_MaNCC`, `TrangThai`)
                                VALUES ('$MaSP', '$TenSanPham', '$GiaBan', '$DonVi', '0', '$LoaiSP','$NCC', '$TrangThai')");
         echo "<script> alert ('Thêm thành công') </script>";
         echo"<script> location.replace('../SanPham.php')</script>";
        }
        
    }
    else
    {
        echo "<script> alert ('Thất bại. Vui lòng kiểm tra lại thông tin') </script>";
        echo"<script> location.replace('../ThemSanPham.php')</script>";
    }
}
?>