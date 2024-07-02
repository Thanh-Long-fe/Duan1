<?php
if (is_array($sua_pttt)) {
    extract($sua_pttt);
}
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sửa phương thức thanh toán</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa phương thức thanh toán</li>
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
            <div class="col-md-6">
                <div class="card">
                    <form action="index.php?act=updatepttt" method="post" class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin phương thức thanh toán</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên
                                    phương thức thanh toán</label>
                                <div class="col-sm-9">
                                    <input type="text" rules="required" name="ten_thanh_toan" class="form-control" id="fname" value="<?php if (isset($ten_thanh_toan) && ($ten_thanh_toan != "")) echo $ten_thanh_toan; ?>" placeholder="Nhập tên màu">
                                </div>
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="id_thanh_toan" value="<?php if (isset($id_thanh_toan) && ($id_thanh_toan != "")) echo $id_thanh_toan; ?>">
                                <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật"></input>
                                <a href="index.php?act=pttt"><button type="button" class="btn btn-success">Danh sách
                                        phương thức thanh toán</button></a>
                            </div>
                        </div>

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