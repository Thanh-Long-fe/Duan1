<?php

require "../global.php";
require "../model/pdo.php";
require "../model/size.php";
require "../model/mau.php";
require "../model/sanpham.php";
require "../model/bienthe.php";
require "../model/danhmuc.php";
require "../model/thuonghieu.php";
$size = get_size();
$color = get_color();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $size = $_POST['size'];
    $color = $_POST['color'];

    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $anh_sp = $_FILES['anh_sp'];
    $status = $_POST['trangthai'];
    $id_sp = $_POST['is_sp'];
    $hinh_anh = uploadImage($anh_sp, '../upload/');

    add_bien_the($id_sp, $size, $color, $gia, $hinh_anh, $soluong, $status);
  }
  header("location:../Admin/index.php");

?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sản phẩm</h4>
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
                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <h4 class="card-title">Thêm biến thể sản phẩm</h4>
                            <div class="form-group row">
                                <label for="size" class="col-sm-3 text-right control-label col-form-label">Size</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="size">
                                        <option value="">Chọn size</option>
                                        <?php foreach ($size as $s) : ?>
                                            <option value="<?= $s['id_size'] ?>"><?= $s['ten_size'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="size" class="col-sm-3 text-right control-label col-form-label">Màu</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="color">
                                        <option value="">Chọn màu</option>
                                        <?php foreach ($color as $c) : ?>
                                            <option value="<?= $c['id_mau'] ?>"><?= $c['ten_mau'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Gia" class="col-sm-3 text-right control-label col-form-label">Giá</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="Gia" name="gia" placeholder="Giá ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="soluong" class="col-sm-3 text-right control-label col-form-label">Số lượng</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="soluong" name="soluong" placeholder="Số lượng">
                                </div>
                            </div>

                           
                           
                            <div class="form-group row">
                                <label for="anh_sp" class="col-sm-3 text-right control-label col-form-label">Ảnh sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="anh_sp" name="anh_sp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Trạng thái</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="trangthai">
                                        <option value="1">Ẩn</option>
                                        <option value="0"selected>Hiện</option>

                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="id_sp" value="10">




                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>

        </div>
        <!-- editor -->

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
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>