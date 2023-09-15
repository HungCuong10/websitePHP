<?php
$conn = mysqli_connect("localhost", "root", "", "quanlykho") or die("Không thể kết nối CSDL");
$conn -> set_charset("utf8");

 $SP_MaSP = '';
 $SP_TenSP = '';
 $SP_Donvi = '';
 $SP_Price = '';
 $SP_TrangThai = '';


 //Hàm kiểm tra kí tự đặc biêt
 function KiemTra($my_string){
  $KiTu = preg_match('/[@_!#$%^&*()<>?|}{~:]/i', $my_string);
  if($KiTu){
     print ("<script> alert ('Thông tin có chứa kí tự đặc biệt. Vui lòng thử lại') </script>");
     return $my_string;
  }
}
//  NÚT SỬA
if(isset($_GET['edit']))
{
    $SP_MaSP = $_GET['edit'];
    $result = $conn->query("SELECT * FROM sanpham WHERE SP_MaSP = '$SP_MaSP'") or die($conn->error);

    if(mysqli_num_rows($result) > 0)
    {
        $row = $result->fetch_array();

        $SP_MaSP = $row['SP_MaSP'];
        $SP_TenSP = $row['SP_TenSP'];   
        $SP_Price = $row['SP_Price'];
        $SP_Donvi = $row['SP_Donvi'];
        $SP_TrangThai = $row['TrangThai'];     
    }
}
if(isset($_POST['Sua']))
{
        $MaSP = $_POST['SP_MaSP'];
        $TenSP = $_POST['SP_TenSP'];
        $Price = $_POST['SP_Price'];
        $Donvi = $_POST['SP_Donvi'];
        $TrangThai = $_POST['SP_TrangThai'];
     if($MaSP && $TenSP && $Price && $Donvi && $TrangThai)
     {
      if(KiemTra($MaSP) || KiemTra($TenSP) || KiemTra($Price)|| KiemTra($Donvi))
      {
        echo"<script> location.replace('../SanPham.php')</script>";
      }
      else
      {

       $result = $conn->query("UPDATE `sanpham` SET `SP_TenSP` = '$TenSP', `SP_Price` = '$Price' , `SP_Donvi` = '$Donvi',
                               `TrangThai` = $TrangThai WHERE  `SP_MaSP`  = '$MaSP'") or die($conn->error);
       echo "<script> alert ('Đã sửa thành công') </script>";
       echo"<script> location.replace('../SanPham.php')</script>";
     }
    }
     else
     {
        echo"<script> alert ('Bạn chưa chọn sản phẩm hoặc chưa nhập đủ thông tin. Vui lòng thử lại')</script>";
        echo"<script> location.replace('../SanPham.php')</script>";
     }
     

}


?>