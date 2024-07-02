<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Bình luận</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Danh sách bình luận</li>
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
                        <h5 class="card-title">Danh mục</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Nội Dung</th>
                                        <th>Ngày Đăng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Tên người dùng</th>
                                        <th>Thao tác</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listbl as $binhluan) {
                                        extract($binhluan);
                                        $xoabl = "index.php?act=deletebinhluan&id=" . $id_binh_luan;
                                        echo '<tr>
                                           
                                            <td>' . $noi_dung. '</td>
                                            <td>' . $ngay_dang. '</td>
                                            <td>' . $ten_san_pham. '</td>
                                            <td>' . $ho_ten. '</td>
                                      
                                            <td><span><a href="'. $xoabl .'" class="btn btn-primary btn-sm" onclick="confirm(`Có xóa vĩnh viễn bình luận này`)">Xoá</a></span> </td>
                                        </tr>';
                                    }
                                    ?>

                                </tbody>
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
<!-- ============================================================== -->
