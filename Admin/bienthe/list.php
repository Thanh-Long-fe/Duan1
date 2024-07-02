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
                            <h5 class="card-title">Biến thể sản phẩm</h5><a href="index.php?act=add_bienthe&id=<?=$_GET['id']?>" class="btn btn-primary m-2">Thêm biến thể</a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Thuộc sản phẩm</th>
                                        <th>size</th>
                                        <th>color</th>
                                        <th>Giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($bienthe as $bt) : ?>


                                        <tr>
                                            <td><?= $bt['ten_san_pham'] ?></td>
                                            <td><?= $bt['ten_size'] ?></td>
                                            <td><?= $bt['ten_mau'] ?></td>
                                            <td><?= $bt['gia'] ?></td>


                                            <td><img src="../upload/<?= $bt['hinh_anh'] ?>" alt="" height="50"></td>
                                            <td><?= $bt['so_luong'] ?></td>
                                            <td><?= $bt['status'] == 0 ? 'Hiện' : 'Ẩn' ?></td>
                                            <td><span><a href="index.php?act=update_bt&id=<?= $bt['id_bien_the'] ?>" class="btn btn-warning btn-sm">Sửa sản
                                                        phẩm</a></span><span><a href="index.php?act=<?=$bt['status'] == 0 ? 'delete_bt' : 'view_bt' ?>&id_bt=<?= $bt['id_bien_the'] ?>&id=<?=$_GET['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('<?=$bt['status'] == 0 ? 'Có muốn xóa sản phẩm này không ?' : 'Có muốn hiện sản phẩm này không ?'?>')"><?=$bt['status'] == 0 ? 'Ẩn biến thể' : 'Hiện biến thể' ?></a></span></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Thuộc sản phẩm</th>
                                        <th>size</th>
                                        <th>color</th>
                                        <th>Giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
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