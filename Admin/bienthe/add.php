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
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Size</li>
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
                    <form class="form-horizontal" action="index.php?act=add_bt" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <h4 class="card-title">Thêm biến thể sản phẩm</h4>
                            <div class="form-group row">
                                <label for="size" class="col-sm-3 text-right control-label col-form-label">Size</label>
                                <div class="col-sm-9">
                                    <select rules="required" class="select form-control m-t-15" style="height: 36px;width: 100%;" name="size">
                                        <option value="">Chọn size</option>
                                        <?php foreach ($size as $s) : ?>
                                            <option value="<?= $s['id_size'] ?>"><?= $s['ten_size'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="form-message"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="size" class="col-sm-3 text-right control-label col-form-label">Màu</label>
                                <div class="col-sm-9">
                                    <select rules="required" class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="color">
                                        <option value="">Chọn màu</option>
                                        <?php foreach ($color as $c) : ?>
                                            <option value="<?= $c['id_mau'] ?>"><?= $c['ten_mau'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="form-message"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Gia" class="col-sm-3 text-right control-label col-form-label">Giá</label>
                                <div class="col-sm-9">
                                    <input rules="required" type="number" class="form-control" id="Gia" name="gia" placeholder="Giá ">
                                    <span class="form-message"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="soluong" class="col-sm-3 text-right control-label col-form-label">Số lượng</label>
                                <div class="col-sm-9">
                                    <input rules="required" type="number" class="form-control" id="soluong" name="soluong" placeholder="Số lượng">
                                    <span class="form-message"></span>
                                </div>
                            </div>

                           
                           
                            <div class="form-group row">
                                <label for="anh_sp" class="col-sm-3 text-right control-label col-form-label">Ảnh sản phẩm</label>
                                <div class="col-sm-9">
                                    <input rules="required" type="file" class="form-control" id="anh_sp" name="anh_sp">
                                    <span class="form-message"></span>
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
                            <input rules="required" type="hidden" name="id_sp" value="<?=$_GET['id']?>">




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