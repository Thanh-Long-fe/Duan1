<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
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
            <div class="col-12">



                <div class="card">
                    <div class="card-body">
                        <div class="d-flex" style="justify-content: space-between;">
                            <h5 class="card-title">Biến thể sản phẩm</h5>
                        </div>
                        <div class="table-responsive">
                            <div class="row">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th>Người dùng</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Sản phẩm</th>
                                        <th>Hành động</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($report as $cmt) : ?>


                                        <tr>
                                            <td><?= $cmt['ho_ten'] ?></td>
                                            <td><?= $cmt['tieu_de'] ?></td>
                                            <td><?= $cmt['noi_dung'] ?></td>
                                            <td><?= $cmt['ngay_dang'] ?></td>
                                            <td><?= $cmt['ten_san_pham'] ?></td>


                                            <td>
                                                <div>
                                                    <a href="index.php?act=deletebinhluan&id=<?= $cmt['id_binh_luan'] ?>" class="btn btn-warning btn-sm">Xóa bình luận</a>
                                                    <a href="index.php?act=block&id=<?= $cmt['id_nguoi_dung'] ?>" class="btn btn-success btn-sm my-2">Khóa tài khoản</a>
                                                    <a href="index.php?act=next_bl&id=<?= $cmt['id_binh_luan'] ?>" class="btn btn-info btn-sm my-2">Bỏ qua</a>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>



                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Người dùng</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Sản phẩm</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>
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
<