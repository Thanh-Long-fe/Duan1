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
                            <h5 class="card-title">Basic Datatable</h5><a href="index.php?act=add_sanpham" class="btn btn-primary m-2">Thêm sản phẩm</a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Thương hiệu</th>
                                        <th>Giá</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Lượt xem</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                <?php foreach($product as $sp) :?>
                                    
                                    
                                    <tr>
                                                <td><?=$sp['ten_san_pham']?></td>
                                                <td><?=$sp['so_luong']?></td>
                                                <td><?=$sp['ten_danh_muc']?></td>
                                                <td><?=$sp['ten_thuong_hieu']?></td>
                                                <td><?=$sp['gia']?></td>
                                                <td><?=$sp['mota']?></td>
                                                <td><img src="../upload/<?=$sp['hinh_anh']?>" alt="" height="50px"></td>
                                                <td><?=$sp['status'] == 0 ? 'Hiện' : 'Ẩn'?></td>
                                                <td><?=$sp['so_luot_xem']?>0</td>
                                                <td><span><a href="index.php?act=list_bien_the&id=<?=$sp['id']?>" class="btn btn-primary btn-sm">Biến
                                                thể</a></span><span><a href="index.php?act=update_sanpham&id=<?=$sp['id']?>"
                                                class="btn btn-warning btn-sm">Sửa sản
                                                phẩm</a></span><span><a href="index.php?act=<?= $sp['status'] == 0 ? 'delete_sp':'view_sp'?>&id=<?=$sp['id']?>"
                                                class="btn btn-danger btn-sm" onclick="return confirm('<?= $sp['status'] == 0 ? 'Có muốn ẩn không ??':'Có muốn hiện không ?'?>')"><?= $sp['status'] == 0 ? 'Ẩn sản phẩm':'Hiện sản phẩm'?></a></span></td>
                                            </tr>
                                    <?php endforeach?>    

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Thương hiệu</th>
                                        <th>Giá</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Lượt xem</th>
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