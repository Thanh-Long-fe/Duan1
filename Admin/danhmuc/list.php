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
                    <h5 class="card-title">Danh mục</h5><a href="index.php?act=adddm" class="btn btn-primary m-2">Thêm danh mục</a>
                        </div>
                       
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id danh mục</th>
                                        <th>Tên danh mục</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao tác</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listdm as $danhmuc) {
                                        extract($danhmuc);
                                        $suadm = "index.php?act=suadm&id=".$id_danh_muc;
                                        $xoadm = "index.php?act=deletedanhmuc&id=".$id_danh_muc;
                                        $themdm = "index.php?act=themdanhmuc" . $id_danh_muc;
                                       
                                        echo '<tr>
                                            <td>' . $id_danh_muc . '</td>
                                            <td>' . $ten_danh_muc. '</td>
                                            <td>' . ($trangthai == 0 ? 'Hiện' : 'Ẩn'). '</td>
                                            
                                            <td><span><a href="'.$suadm.'" class="btn btn-primary btn-sm">Sửa</a></span><span><a href="'.$xoadm.'" onclick="return confirm(`Chú ý nếu ẩn danh mục này thì tất cả các sản phẩm thuộc danh mục sẽ vào mục CHUNG`)" class="btn btn-danger btn-sm">Ẩn danh mục</a></span></td>
                                        </tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="border-top">
                            
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
