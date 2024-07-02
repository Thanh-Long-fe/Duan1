<?php
if (is_array($suatk)) {
    extract($suatk);
}
$avatar = "../upload/" . $avatar;
if (is_file($avatar)) {
    $avatar = "<img src='" . $avatar . "' height='80'>";
} else {
    $avatar = "Không có hình";
}
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sửa tài khoản người dùng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin người dùng</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Họ
                                    tên</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ho_ten" class="form-control" id="fname" value="<?= $suatk['ho_ten'] ?>" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Địa
                                    chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" name="dia_chi" class="form-control" id="fname" value="<?= $suatk['dia_chi'] ?>" placeholder="Nhập nhập địa chỉ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Số điện
                                    thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sdt" class="form-control" id="fname" value="<?= $suatk['sdt'] ?>" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" id="fname" value="<?= $suatk['email'] ?>" placeholder="Nhập email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên đăng
                                    nhập</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ten_dang_nhap" class="form-control" id="fname" value="<?= $suatk['ten_dang_nhap'] ?>" placeholder="Nhập tên đăng nhập">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mật
                                    khẩu</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mat_khau" class="form-control" id="fname" value="<?= $suatk['mat_khau'] ?>" placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Quyền</label>
                                <div class="col-sm-9">
                                    <input type="text" name="quyen" class="form-control" id="fname" value="<?= $suatk['quyen'] ?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Avatar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="avatar" class="form-control" id="fname" placeholder="Nhập tên màu"><?= $suatk['avatar'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="id_nguoi_dung" value="<?= $suatk['id_nguoi_dung'] ?>">
                                <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật"></input>
                                <a href="index.php?act=dskh"><button type="button" class="btn btn-success">Danh sách
                                        khách hàng</button></a>
                            </div>
                        </div>
                        <?php
                        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                        ?>
                    </form>
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
