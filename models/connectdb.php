<?php
    function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=quan_ly_sach",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "thanh cong";
        } catch (PDOException $e){
            //echo "lỗi";
        }
        return $conn;
    }
    function get_time_present() {
        // hàm này để lấy thời gian hiện tại trên máy tính
        // Đặt múi giờ thành múi giờ của Việt Nam
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Lấy thời gian hiện tại
        $currentTime = time(); // nó sẽ chả về 1 dãy số
        return $currentTime;
    }
//    $timestamp = get_time_present(); // lấy dãy số thời gian hiện tại về
//    $currentDateTime = date("Y-m-d H:i:s", $timestamp);// chuyển đổi dãy số về dạng năm-tháng-ngày giờ-phút-giây
//    echo $currentDateTime; // có thể test ngay tại đây


    function getData($query, $params = [], $getAll = true) {
        // hàm này dùng để thêm sửa xóa select
        // nếu muốn thêm sử xóa thì chuyền false
        // nếu muốn select thì không cần chuyền gì
        $conn = connect();
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        if ($getAll) {
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }
function img(){
    if(isset($_FILES["hinhAnh"]) && $_FILES["hinhAnh"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "models/uploads/";
        $target_file = $target_dir . basename($_FILES["hinhAnh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra file ảnh là ảnh thật hay ảnh giả
        $check = getimagesize($_FILES["hinhAnh"]["tmp_name"]);
        if($check === false) {
            throw new Exception("File is not an image.");
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["hinhAnh"]["size"] > 5000000) {
            throw new Exception("Sorry, your file is too large.");
        }

        // Cho phép một số định dạng tệp nhất định
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

//            // Kiểm tra xem tập tin đã tồn tại chưa và ngăn ghi đè
//            if (file_exists($target_file)) {
//                $target_file = $target_dir . uniqid() . "." . $imageFileType; // thêm một ID duy nhất vào tên tệp
//            }

        // Tải tập tin lên
        if (!move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }

        return $target_file;
    } else {
        throw new Exception("No image file uploaded or an error occurred.");
    }
}
?>