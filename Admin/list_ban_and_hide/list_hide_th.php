<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Thương hiệu bị ẩn</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thương hiệu ẩn</li>
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
                       
                            <h5 class="card-title">Thương hiệu</h5>
                       
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>Tên thương hiệu</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                <?php foreach($th as $sp) :?>
                                    
                                    
                                    <tr>
                                            <td><?=$sp['ten_thuong_hieu']?></td>
                                                
                                                <td><span><a href="index.php?act=list_th_sp&id=<?=$sp['id_thuong_hieu']?>" class="btn btn-primary btn-sm">Sản phẩm</a></span><span><a href="index.php?act=update_th&id=<?=$sp['id_thuong_hieu']?>"
                                                class="btn btn-warning btn-sm">Sửa</a></span><span><a href="index.php?act=view_th&id=<?=$sp['id_thuong_hieu']?>"
                                                class="btn btn-danger btn-sm" onclick="return confirm('Có muốn hiện không ')"><?= $sp['status'] == 0 ? 'Ẩn':'Hiện'?></a></span></td>
                                            </tr>
                                    <?php endforeach?>    

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tên thương hiệu</th>
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