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
                            <div class="row"> <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="index.php?act=dang_cho"><div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"></i></h1>
                        <h6 class="text-white">Đơn hàng đang chờ (<?=$so_dc['so_luong_hoa_don']?>)</h6>
                    </div>
                </div></a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="index.php?act=dang_xu_ly">  <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"></i></h1>
                        <h6 class="text-white">Đơn hàng đang xử lý (<?=$so_xl['so_luong_hoa_don']?>)</h6>
                    </div>
                </div></a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="index.php?act=van_chuyen">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"></i></h1>
                        <h6 class="text-white">Đang vận chuyển (<?=$so_dvc['so_luong_hoa_don']?>)</h6>
                    </div>
                </div>
                </a>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="index.php?act=da_giao">    <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"></i></h1>
                        <h6 class="text-white">Đơn hàng đã hoàn thành (<?=$da_giao['so_luong_hoa_don']?>)</h6>
                    </div>
                </div></a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="index.php?act=huy_don">  <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"></i></h1>
                        <h6 class="text-white">Đơn hàng bị hủy (<?=$da_huy['so_luong_hoa_don']?>)</h6>
                    </div>
                </div></a>
            </div></div>
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>Mã đơn</th>
                                        <th>Người dùng</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                       
                                        <th>Số điện thoại</th>
                                        <th>Thanh toán</th>
                                        <th>Ghi chú</th>
                                        
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Cập nhật trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($hoadon as $bt) : ?>


                                        <tr><td><?= $bt['id_hoa_don'] ?></td>
                                            <td><?= $bt['ho_ten'] ?></td>
                                            <td><?= $bt['dia_chi'] ?></td>
                                            <td><?= $bt['ngay_dat'] ?></td>
                                            <td><?= $bt['sdt'] ?></td>

                                            <td><?= $bt['ten_thanh_toan'] ?></td>
                                            <td><?= $bt['ghi_chu'] ?></td>
                                            <td><form action="index.php?act=update_dh" class="form_update" method="post">
                                                <select name="trang_thai" class="tt">
                                                <?php 
                                                $tt = ['Đang chờ','Đang xử lý','Đang vận chuyển','Hủy đơn','Đã giao'];
                                                foreach($tt as $a) :
                                                    
                                                ?>
                                                <option <?=$a == $bt['trang_thai'] ? 'selected' :''?> <?=$a == 'Hủy đơn' || $a == 'Đã giao' ? 'disabled' : ''?> value="<?=$a?>"><?=$a?></option>
                                                  
                                                <?php
                                                
                                                 endforeach?>
                                                

                                                    
                                                </select>
                                                <input type="hidden" name="id_hd" value="<?=$bt['id_hoa_don']?>">
                                                </td>
                                            <td><?=number_format( $bt['tong_tien'],0,'.','.') ?></td>
                                            
                                            <td><button type="submit" class="btn btn-warning btn-sm">Cập nhật</button><a href="index.php?act=list_chitiet&id=<?= $bt['id_hoa_don'] ?>" class="btn btn-success btn-sm my-2">Chi tiết</a></td>
                                            </form>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Người dùng</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                       
                                        <th>Số điện thoại</th>
                                        <th>Ghi chú</th>
                                        <th>Thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng tiền</th>
                                        <th>Cập nhật trạng thái</th>
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
<script>
  var selects = document.querySelectorAll('.tt');

selects.forEach(function(select) {
    if (select.value == 'Đã giao' || select.value == 'Hủy đơn') {
        select.disabled = true;
    } else {
        select.disabled = false;
    }

    if (select.value == "Đang vận chuyển") {
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].value == "Đang chờ" || select.options[i].value == "Đang xử lý") {
                select.options[i].disabled = true;
            }
        }
    }
    if (select.value == "Đang chờ") {
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].value == "Hủy đơn") {
                select.options[i].disabled = false;
            }
        }
    }


    if (select.value == "Đang xử lý") {
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].value == "Đang chờ") {
                select.options[i].disabled = true;
            }
        }
    }
});

</script>