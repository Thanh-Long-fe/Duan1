<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Account</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Account</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start My Account Wrapper ==-->
    <section class="my-account-area">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <nav>
                                    <div class="myaccount-tab-menu nav nav-tabs " id="nav-tab" role="tablist">

                                        <button class="nav-link active" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false"> Đơn hàng</button>



                                        <button class="nav-link" id="account-info-tab" data-bs-toggle="tab" data-bs-target="#account-info" type="button" role="tab" aria-controls="account-info" aria-selected="false">Thông tin tài khoản</button>
                                        <button class="nav-link" id="doi_mk-tab" data-bs-toggle="tab" data-bs-target="#doi_mk" type="button" role="tab" aria-controls="doi_mk" aria-selected="false">Đổi mật khẩu</button>
                                        <button class="nav-link" onclick="window.location.href='index.php?act=out'" type="button">Logout</button>
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            if ($_SESSION['user']['quyen'] == 1) {
                                                echo "<a class='nav-link' href='../Admin/index.php'>Quản trị</a>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="nav-tabContent">

                                    <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Mã đơn hàng</th>
                                                            <th>Họ tên</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Địa chỉ</th>
                                                            <th>Số điện thoại</th>
                                                            <th>Trạng thái</th>
                                                            <th>Tổng tiền</th>
                                                            <th>Thanh toán</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($don_hang as $dh) :
                                                            $date = new DateTime($dh['ngay_dat']);
                                                            $format_date = $date->format('d/m/Y');
                                                        ?>
                                                            <tr>
                                                                <td><?= $dh['id_hoa_don'] ?></td>
                                                                <td><?= $dh['ho_ten'] ?></td>
                                                                <?php $id = $dh['id_hoa_don'] ?>
                                                                <td><?= $format_date ?></td>
                                                                <td><?= $dh['dia_chi'] ?></td>
                                                                <td><?= $dh['sdt'] ?></td>
                                                                <td><?= $dh['trang_thai'] ?></td>
                                                                <td><?= number_format($dh['tong_tien'], 0, '.', '.') ?></td>
                                                                <td><?= $dh['ten_thanh_toan'] ?></td>
                                                                <td><a href="index.php?act=view_hd&id=<?= $dh['id_hoa_don'] ?>" class="btn btn-danger ">View</a>
                                                                    <?= $dh['trang_thai'] == 'Đang vận chuyển'  ? "<a onclick='return confirm(`Có muốn xác nhận đã giao không`)' href='index.php?act=da_nhan&id=$id' class='btn btn-danger'>Đã nhận</a>" : '' ?>


                                                                    <?= $dh['trang_thai'] == 'Đang chờ'  ? "<a onclick='return confirm(`Có muốn hủy đơn hàng này`)' href='index.php?act=huy&id=$id' class='btn btn-danger'>Hủy</a>" : '' ?>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                                        <div class="myaccount-content">
                                            <div class="account-details-form">
                                                <?php
                                                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                                                    extract($_SESSION['user']);
                                                ?>
                                                    <form action="index.php?act=update" method="post" enctype="multipart/form-data" class="form_update">
                                                        <div class="single-input-item form-group">
                                                            <label for="display-name" class="required">Họ
                                                                và tên</label>
                                                            <input type="text" id="display-name" rules="required" name="ho_ten" value="<?= $ho_ten ?>" />
                                                            <span class="form-message"></span>
                                                        </div>
                                                        <div class="single-input-item form-group">
                                                            <label for="display-name" class="required">Địa
                                                                chỉ nhận
                                                                hàng</label>
                                                            <input type="text" id="display-name" rules="required" name="dia_chi" value="<?= $dia_chi ?>" />
                                                            <span class="form-message"></span>
                                                        </div>
                                                        <div class="single-input-item form-group">
                                                            <label for="display-name" class="required">Số
                                                                điện thoại</label>
                                                            <input type="text" id="display-name" rules="required" name="sdt" value="<?= $sdt ?>" />
                                                            <span class="form-message"></span>
                                                        </div>
                                                        <div class="single-input-item form-group">
                                                            <label for="email" class="required">Email</label>
                                                            <input type="email" id="email" name="email" rules="required|email" value="<?= $email ?>" />
                                                            <span class="form-message"></span>
                                                        </div>
                                                        <div class="single-input-item form-group">
                                                            <label for="display-name" class="required">Tên
                                                                đăng nhập</label>
                                                            <input type="text" id="display-name" value="<?= $ten_dang_nhap ?>" disabled rules="required" />
                                                            <span class="form-message"></span>
                                                        </div>

                                                        <div class="single-input-item form-group">
                                                            <label for="display-name">Ảnh</label>
                                                            <input type="file" name="avatar" id="display-name">
                                                        </div>
                                                        <input type="hidden" name="id_nguoi_dung" value="<?= $_SESSION['user']['id_nguoi_dung'] ?>">
                                                        <div class="single-input-item form-group">
                                                            <button class="check-btn sqr-btn" type="submit"> Lưu</button>
                                                        </div>

                                                    </form>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="doi_mk" role="tabpanel" aria-labelledby="doi_mk">
                                        <div class="myaccount-content">
                                            <div class="account-details-form">

                                                <form action="index.php?act=doi_mk" method="post" enctype="multipart/form-data" class="form_mk" id="doi_mk">
                                                    <fieldset>
                                                        <legend>Đổi mật khẩu</legend>
                                                        <div class="single-input-item form-group">
                                                            <label for="current-pwd" class="required">Mật khẩu cũ</label>
                                                            <input type="password" id="current-pwd" rules="required" name="mat_khau" />
                                                            <span class="form-message"></span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item form-group">
                                                                    <label for="new-pwd" class="required" rules="required">Mật khẩu mới</label>
                                                                    <input type="password" id="new-pwd" name="mat_khau_new" rules="required|min:6" />
                                                                    <span class="form-message"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item form-group">
                                                                    <label for="confirm-pwd" class="required" rules="required">Nhập lại mật khẩu mới</label>
                                                                    <input type="password" id="confirm-pwd" name="mat_khau_confirm" rules="required|min:6|confirm_pass" />
                                                                    <span class="form-message"></span>
                                                                    <span style="color: red;"><?php if (isset($_SESSION['toast']) && $_SESSION['toast'] == 'ko_khop') echo "Không trùng mật khẩu" ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </fieldset>
                                                    <div class="single-input-item form-group">
                                                            <button class="check-btn sqr-btn" type="submit">Đổi mật khẩu</button>
                                                        </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End My Account Wrapper ==-->
</main>