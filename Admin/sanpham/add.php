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
                                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
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
                            <form class="form-horizontal" action="index.php?act=add_sp" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm sản phẩm</h4>
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-sm-3 text-right control-label col-form-label">Tên sản phẩm</label>
                                        <div class="col-sm-9">
                                            <input rules="required" type="text" class="form-control" id="name"
                                                placeholder="Tên sản phẩm " name="name">
                                                <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Gia"
                                            class="col-sm-3 text-right control-label col-form-label">Giá</label>
                                        <div class="col-sm-9">
                                            <input rules="required" type="number" class="form-control" id="Gia" name="gia"
                                                placeholder="Giá ">
                                                <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="soluong"
                                            class="col-sm-3 text-right control-label col-form-label">Số lượng</label>
                                        <div class="col-sm-9">
                                            <input rules="required" type="number" class="form-control" id="soluong" name="soluong"
                                                placeholder="Số lượng">
                                                <span class="form-message"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="mota"
                                            class="col-sm-3 text-right control-label col-form-label">Mô tả</label>
                                        <div class="col-sm-9">
                                            <textarea rules="required" class="form-control" name="mota"></textarea>
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Thương hiệu</label>
                                        <div class="col-md-9">
                                            <select rules="required" class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="thuonghieu">
                                                <option value="">Chọn thương hiệu</option>
                                                
                                                <?php foreach($thuonghieu as $th):?>
                                                    <option value="<?=$th['id_thuong_hieu']?>"><?=$th['ten_thuong_hieu']?></option>
                                                <?php endforeach?>
                                               
                                            </select>
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Danh mục</label>
                                        <div class="col-md-9">
                                            <select rules="required" class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="danhmuc">
                                                <option value="">Chọn danh mục</option>
                                                <?php foreach($danhmuc as $dm):?>
                                                    <option value="<?=$dm['id_danh_muc']?>"><?=$dm['ten_danh_muc']?></option>
                                                <?php endforeach?>
                                            </select>
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="anh_sp"
                                            class="col-sm-3 text-right control-label col-form-label">Ảnh sản phẩm</label>
                                        <div class="col-sm-9">
                                            <input rules="required" type="file" class="form-control" id="anh_sp" name="anh_sp">
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Trạng thái</label>
                                        <div class="col-md-9">
                                            <select rules="required" class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="trangthai">
                                                <option value="NC">Ẩn</option>
                                                <option value="OH" selected>Hiện</option>
                                                
                                            </select>

                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Sale</label>
                                        <div class="col-md-9">
                                            <select rules="required" class="select2 form-control m-t-15" style="height: 36px;width: 100%;" name="sale">
                                                <option selected value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                                <option value="40">40%</option>
                                                <option value="50">50%</option>
                                                <option value="60">60%</option>
                                                <option value="70">70%</option>
                                                <option value="80">80%</option>
                                                <option value="90">90%</option>
                                                
                                            </select>

                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    
                                  
                                  
                                 
                                   
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
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>