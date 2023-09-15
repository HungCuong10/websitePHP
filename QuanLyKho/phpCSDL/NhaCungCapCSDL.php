<?php
$conn = mysqli_connect("localhost", "root", "", "quanlykho") or die("Không thể kết nối CSDL");
$conn -> set_charset("utf8");
// Tạo 2 biến sửa và trạng thái
$update = false;
$TrangThai = false;

$NCC_ID= '';
$NCC_TenNCC ='';
$NCC_SdtNCC ='';   
$NCC_TrangThai ='';

// Hàm check kí tự đặc biệt
function KiemTra($my_string){
  $KiTu = preg_match('/[@_!#$%^&*()<>?|}{~:]/i', $my_string);
  if($KiTu){
     print ("<script> alert ('Thông tin có chứa kí tự đặc biệt. Vui lòng thử lại') </script>");
     return $my_string;
  }
}
// Xử lý nút lưu
if (isset($_POST['Luu']))
{
    $MaNCC = $_POST['MaNhaCungCap'];
    $TenNCC = $_POST['TenNCC'];
    $SDT = $_POST['SdtNhaCungCap'];
//  Nếu như thông tin có chứa ký tự đặc biệt
      if(KiemTra($MaNCC) || KiemTra($TenNCC))
        {
          echo"<script> location.replace('../NhaCungCap.php')</script>";
        }
        else
        {
          if($MaNCC && $TenNCC && $SDT)
          {
              $conn->query ("INSERT INTO `nhacungcap`(`NCC_MaNCC`, `NCC_TenNCC`, `NCC_SdtNCC`, `TrangThai`) 
              VALUES ('$MaNCC','$TenNCC','$SDT', true)") or die($conn->error);
                echo "<script> alert ('Thêm thành công một nhà cung cấp') </script>";
                echo"<script> location.replace('../NhaCungCap.php')</script>";
         }
         else
         {
             echo "<script> alert ('Vui lòng nhập đầy đủ thông tin') </script>";
             echo"<script> location.replace('../NhaCungCap.php')</script>";
         }
        }
  
}

// Sự kiện khi ấn nút sửa trên bảng dữ liệu
if(isset($_GET['edit']))
  {
      $NCC_ID = $_GET['edit'];
      $update = true;
      $TrangThai = true;
      $result = $conn->query("SELECT * FROM nhacungcap WHERE NCC_MaNCC = '$NCC_ID'") or die($conn->error);

      if(mysqli_num_rows($result) > 0)
      {
          $row = $result->fetch_array();
          // Gán giá trị từ bảng dữ liệu lên textbox
          $NCC_TenNCC = $row['NCC_TenNCC'];
          $NCC_SdtNCC = $row['NCC_SdtNCC'];   
          $NCC_TrangThai = $row['TrangThai'];
      }
  }
  // Xử lý nút sửa
  if(isset($_POST['Sua']))
  {
    $ED_MaNCC = $_POST['MaNhaCungCap'];
    $ED_TenNCC = $_POST['TenNCC'];
    $ED_SDT = $_POST['SdtNhaCungCap'];
    $ED_TrangThai = $_POST['TrangThai'];
  // Nếu thông tin không bị để trống
    if($ED_MaNCC && $ED_TenNCC && $ED_TrangThai)
    {
      if(KiemTra($ED_MaNCC) || KiemTra($ED_TenNCC))
      {
        echo"<script> location.replace('../NhaCungCap.php')</script>";
      }
      else
      {
        $conn -> query("UPDATE nhacungcap SET NCC_TenNCC = '$ED_TenNCC', NCC_SdtNCC = '$ED_SDT',
                             TrangThai = $ED_TrangThai WHERE NCC_MaNCC = '$ED_MaNCC'");
      echo "<script> alert ('Đã cập nhật thông tin') </script>";
      echo"<script> location.replace('../NhaCungCap.php')</script>"; 
      }
    }
    else
    {
      echo "<script> alert ('Thất bại. Vui lòng kiểm tra lại thông tin') </script>";
      echo"<script> location.replace('../NhaCungCap.php')</script>";
    }
  }
?>