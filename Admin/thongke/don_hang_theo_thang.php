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
                        <h5 class="card-title">Đơn hàng theo ngày</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tháng</th>
                                        <th>Số lượng đơn</th>

                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($don_hang as $dh) {
                                    ?>
                                        <tr>
                                            <td><?= $dh['thang'] ?></td>
                                            <td><?= $dh['so_luong_hoa_don'] ?></td>

                                            <td><a class="btn btn-danger btn-sm" href="index.php?act=list_tk_dh_thang&thang=<?= $dh['thang'] ?>">Xem danh sách</a></td>

                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <canvas id="myChart" style="width:100%;"></canvas>



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
                                        label: 'Số đơn hàng',
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
                                                labelString: 'Số lượng'
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