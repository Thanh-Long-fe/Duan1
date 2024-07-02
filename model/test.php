<?php 

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




