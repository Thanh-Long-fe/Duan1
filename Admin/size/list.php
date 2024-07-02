<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Size</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách size</li>
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
                    <h5 class="card-title">Size</h5><a href="index.php?act=addsize" class="btn btn-primary m-2">Thêm Size</a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                       
                                        <th>Tên size</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listsize as $size) {
                                        extract($size);
                                        $suasize = "index.php?act=suasize&id_size=" . $id_size;
                                        $xoasize = "index.php?act=xoasize&id_size=" . $id_size;
                                        echo '<tr>
                                            
                                            <td>' . $ten_size . '</td>
                                            <td><span><a href="' . $suasize . '" class="btn btn-primary btn-sm">Sửa size</a></span><span><a href="' . $xoasize . '" class="btn btn-danger btn-sm">Xóa size</a></span></td>
                                        </tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <h5 class="card-title">Hành động</h5>
                                <a href="index.php?act=addsize"><button type="button" class="btn btn-primary">Thêm
                                        mới</button></a>
                            </div>
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
