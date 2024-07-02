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
                            <h5 class="card-title">Chi tiết đơn hàng</h5>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>size</th>
                                        <th>color</th>
                                        <th>Giá</th>
                                        <th>Giá khi mua</th>
                                        
                                        <th>Số lượng</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($chi_tiet as $bt) : ?>


                                        <tr>
                                            <td><?= $bt['ten_san_pham'] ?></td>
                                            <td><?= $bt['ten_size'] ?></td>
                                            <td><?= $bt['ten_mau'] ?></td>
                                            <td><?= number_format( $bt['gia'] ,0,'.','.') ?></td>
                                            <td><?= number_format($bt['gia_khi_mua'],0,'.','.') ?></td>


                                            
                                            <td><?= $bt['soluong'] ?></td>
                                            
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> Sản phẩm</th>
                                        <th>size</th>
                                        <th>color</th>
                                        <th>Giá</th>
                                        
                                        <th>Số lượng</th>
                                        
                                        
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