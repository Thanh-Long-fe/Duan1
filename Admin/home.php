<div class="page-wrapper">
    
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Trang chủ</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            
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
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <!-- 
            
         -->
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
        
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
          <a href="index.php?act=don_hang_theo_ngay">  <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Đơn hàng theo ngày</h6>
                </div>
            </div></a>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
           <a href="index.php?act=don_hang_theo_thang"> <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                    <h6 class="text-white">Đơn hàng theo tháng</h6>
                </div>
            </div></a>
        </div>
        <!-- Column -->
       
        <!-- Column -->
     
        <!-- Column -->
  
        <!-- Column -->
   
    </div>
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Site Analysis</h4>
                                <h5 class="card-subtitle">Overview of Latest Month</h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-9">
                                <canvas id="myChart" style="width:100%;max-width:900px"></canvas>

                               

                                <script>
                                    // Sử dụng dữ liệu từ mảng PHP
                                    const data = <?php echo $json_data; ?>;

                                    const labels = [];
                                    const values = [];
                                    // Duyệt qua mảng và tách ra nhãn (tháng) và giá trị (tổng số tiền)
                                    for (const key in data) {
                                        if (data.hasOwnProperty(key)) {
                                            labels.push(key);
                                            values.push(data[key]);
                                        }
                                    }

                                    // Biểu đồ
                                    new Chart("myChart", {
                                        type: "line",
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: 'Tổng số tiền theo tháng',
                                                data: values,
                                                borderColor: 'rgb(75, 192, 192)',
                                                fill: false,
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: 'Tổng số tiền'
                                                    }
                                                }],
                                                xAxes: [{
                                                    scaleLabel: {
                                                        display: true,
                                                        labelString: 'Tháng'
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>

                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-user m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5"><?= $tong_so_nguoi_dung['total_users'] ?></h5>
                                            <small class="font-light">Tổng số khách hàng</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-plus m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5"><?= $user['so_luong_nguoi_dung'] ?></h5>
                                            <small class="font-light">Khách hàng mới</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5"><?= $tong_sp_dang_ban['total_products'] ?></h5>
                                            <small class="font-light">Số sản phẩm đang bán</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-tag m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5"><?= $tong_don_hang['a'] ?></h5>
                                            <small class="font-light">Số đơn hàng</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-table m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5"><?= $tong_don_tc['tong_so_don_thanh_cong'] ?></h5>
                                            <small class="font-light">Số đơn thành công</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-globe m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5"><?= $huy['tong_so_don_huy'] ?></h5>
                                            <small class="font-light">Số đơn bị hủy</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->

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