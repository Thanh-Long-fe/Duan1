<?php

function is_admin_logged_in() {
    return isset($_SESSION['user']) && $_SESSION['user']['quyen'] === 1;
}
function exist_param($fieldname){
    return array_key_exists($fieldname,$_REQUEST);
}

function maxString($inputString, $maxLength = 100)
{
    // Kiểm tra độ dài chuỗi
    if (strlen($inputString) <= $maxLength) {
        return $inputString; // Trả về nguyên gốc nếu độ dài không vượt quá maxLength
    } else {
        // Cắt chuỗi và thêm dấu 3 chấm đằng sau
        return substr($inputString, 0, $maxLength - 3) . '...';
    }
}

/**
* Tạo cookie
* @param string $name là tên cookie
* @param string $value là giá trị cookie
* @param int $day là số ngày tồn tại cookie
*/
function add_cookie($name, $value, $day){
    setcookie($name, $value, time() + (86400 * $day), "/");
    }
    /**
    * Xóa cookie
    * @param string $name là tên cookie
    */
    function delete_cookie($name){
    add_cookie($name, "",-1);
    }
    /**
    * Đọc giá trị cookie
    * @param string $name là tên cookie
    * @return string giá trị của cookie
    */
    function get_cookie($name){
    return $_COOKIE[$name] ?? '';
    }



function uploadImage($file, $uploadPath) {
    // Lấy thông tin về file
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];

    // Lấy phần mở rộng của tên file
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Tạo tên file mới với timestamp
    $newFileName = "image_" . time() . "." . $fileExtension;

    // Đường dẫn đầy đủ đến thư mục lưu trữ ảnh trên server
    $fullPath = $uploadPath . $newFileName;

    // Di chuyển file tạm thời đến đường dẫn lưu trữ với tên mới
    move_uploaded_file($fileTmp, $fullPath);

    return $newFileName; // Trả về tên file mới để lưu vào cơ sở dữ liệu hoặc thực hiện các xử lý khác
}
function shorten_number($number) {
    if ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M';
    } elseif ($number >= 10000) {
        return round($number / 1000, 1) . 'K';
    } else {
        return $number;
    }
}

function random_pass($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
function kiem_tra_tu_khoa_cam($comment) {
    // Danh sách từ khóa cấm
    $tu_khoa_cam = array("cặc", "lồn", "boài", "cứt","địt","Địt","cc","qq","dit","cak","lon","chó","fuck","bicth");

    // Chuyển đổi bình luận thành chữ thường để đảm bảo tính nhạy cảm
    $comment_lower = strtolower($comment);

    // Kiểm tra xem từ khóa cấm có xuất hiện trong bình luận hay không
    foreach ($tu_khoa_cam as $tu_khoa) {
        if (strpos($comment_lower, $tu_khoa) !== false) {
            return 1; // Tồn tại từ khóa cấm trong bình luận
        }
    }

    return 0; // Không có từ khóa cấm nào trong bình luận
}

function generate_id($user_id) {
    // Lấy giờ, phút, giây, ngày, tháng, năm hiện tại
    $current_time = date("HisdmY");
    // Kết hợp chuỗi ID với mã người dùng và thời gian hiện tại
    $id = "DH_" . $user_id . "_" . $current_time;
    return $id;
}

// Sử dụng hàm để tạo ID
