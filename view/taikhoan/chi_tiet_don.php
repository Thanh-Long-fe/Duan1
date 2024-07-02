<main class="main-content">
    <!--== Start Faq Area Wrapper ==-->
    <section class="page-not-found-area">
        <div class="container pt--0 pb--0">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <h3 style="text-align: center;" class="py-5">Chi tiết hóa đơn <?= $_GET['id'] ?></h3>
                    <div class="myaccount-table table-responsive text-center" style="overflow: unset;">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Size</th>
                                    <th>Màu</th>
                                    <th>Số lượng</th>
                                    <th>Giá khi mua</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($don_hang as $dh) :

                                ?>
                                    <tr>
                                        <th><?= $dh['id_hoa_don'] ?></th>
                                        <th><?= $dh['ten_san_pham'] ?></th>
                                        <th><?= $dh['ten_size'] ?></th>
                                        <th><?= $dh['ten_mau'] ?></th>
                                        <th><?= $dh['soluong'] ?></th>
                                        <th><?= $dh['gia_khi_mua'] ?></th>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--== End Faq Area Wrapper ==-->
</main>