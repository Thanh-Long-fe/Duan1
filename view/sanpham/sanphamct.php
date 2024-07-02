<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Product Details</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Product Details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Single Area Wrapper ==-->
    <section class="product-area product-single-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-single-item">
                        <div class="row">
                            <div class="col-xl-6">
                                <!--== Start Product Thumbnail Area ==-->
                                <div class="product-single-thumb">
                                    <div class="swiper-container single-product-thumb single-product-thumb-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a class="lightbox-image" data-fancybox="gallery" href="../upload/<?= $sp['hinh_anh'] ?>">
                                                    <img src="../upload/<?= $sp['hinh_anh'] ?>" width="570" height="541" alt="Image-HasTech">
                                                </a>
                                            </div>
                                            <?php if (is_array($img) && !empty($img)) :
                                                foreach ($img as $a) :
                                                    if (!empty($a['hinh_anh'])) :
                                            ?>
                                                        <div class="swiper-slide">
                                                            <a class="lightbox-image" data-fancybox="gallery" href="../upload/<?= $a['hinh_anh'] ?>">
                                                                <img src="../upload/<?= $a['hinh_anh'] ?>" width="570" height="541" alt="Image-HasTech">
                                                            </a>
                                                        </div>

                                            <?php endif;
                                                endforeach;
                                            endif; ?>

                                        </div>
                                    </div>
                                    <div class="swiper-container single-product-nav single-product-nav-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="../upload/<?= $sp['hinh_anh'] ?>" width="127" height="127" alt="Image-HasTech">
                                            </div>
                                            <?php if (is_array($img) && !empty($img)) :
                                                foreach ($img as $a) :
                                                    if (!empty($a['hinh_anh'])) :
                                            ?>
                                                        <div class="swiper-slide">
                                                            <img src="../upload/<?= $a['hinh_anh'] ?>" width="127" height="127" alt="Image-HasTech">
                                                        </div>
                                            <?php endif;
                                                endforeach;
                                            endif; ?>

                                        </div>
                                    </div>
                                </div>
                                <!--== End Product Thumbnail Area ==-->
                            </div>
                            <div class="col-xl-6">
                                <!--== Start Product Info Area ==-->
                                <div class="product-single-info">
                                    <h3 class="main-title"><?= $sp['ten_san_pham'] ?></h3>
                                    <div class="prices">
                                        <span class="price"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                    </div>
                                    <div class="product-info-footer py-2">
                                        <h6 class="code">Số lượng <span class="so_luong__"><?= shorten_number($sp['so_luong']) ?></span></h6>
                                    </div>

                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <?php
                                            $avg = intval($avg_sao['avg_rating']); // Chuyển đổi rating thành số nguyên


                                            // Hiển thị các ngôi sao đầy
                                            for ($i = 1; $i <= $avg; $i++) {

                                                echo "<li class='fa fa-star'></li>";
                                            }

                                            // Hiển thị các ngôi sao trống nếu cần
                                            for ($i = $avg + 1; $i <= 5; $i++) {

                                                echo "<li class='fa fa-star-o'></li>";
                                            }


                                            ?>
                                        </div>
                                        <div class="review-status">
                                            <a href="javascript:void(0)">(<?= $sl['sl'] ?> lượt đánh giá)</a>
                                        </div>
                                    </div>
                                    <p><?= $sp['mota'] ?></p>
                                    <form action="index.php?act=add_cart" method="post" id="form_ko_loi">
                                        <div class="product-color form-group">
                                            <h6 class="title">Color</h6>
                                            <select name="id_color" class="form-select form-color" aria-label="Default select example" id="colorSelect">
                                                <option selected value="">Chọn Màu</option>
                                                <?php
                                                $unique_color = [];
                                                foreach ($color as $s) :
                                                    if (!in_array($s, $unique_color)) :
                                                ?>
                                                        <option value="<?= $s['id_mau'] ?>"><?= $s['ten_mau'] ?></option>

                                                <?php
                                                        $unique_color[] = $s;
                                                    endif;
                                                endforeach;
                                                ?>

                                            </select>

                                            <span class="form-message-color"></span>
                                        </div>

                                        <div class="product-size form-group">
                                            <h6 class="title">Size</h6>
                                            <select name="id_size" class="form-select form-size" aria-label="Default select example" id="sizeSelect">
                                                <option selected value="">Chọn Size</option>
                                                <?php
                                                $unique_size = [];
                                                foreach ($size as $s) :
                                                    if (!in_array($s, $unique_size)) :
                                                ?>
                                                        <option value="<?= $s['id_size'] ?>"><?= $s['ten_size'] ?></option>

                                                <?php
                                                        $unique_size[] = $s;
                                                    endif;
                                                endforeach;
                                                ?>

                                            </select>

                                            <span class="form-message-size"></span>
                                        </div>
                                        <div class="product-quick-action">
                                            <div class="qty-wrap">
                                                <div class="pro-qty">
                                                    <input type="number" min="1" title="Quantity" value="1" name="so_luong" class="sl_">
                                                    <div class="d-flex" style="justify-content: space-evenly;border: 1px solid #e1e1e1;">
                                                        <div class="cong" style="font-weight: bold; ">+</div>
                                                        <div class="tru" style="font-weight: bold; ">-</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <input type="hidden" name="id" value="<?= $_GET['id_sp'] ?>">
                                            <button type="submit" id="add_" form="form_ko_loi" class="btn-theme">Thêm vào giỏ hàng</button>
                                        </div>
                                    </form>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            // Lấy phần tử input và select
                                            var so_luong_add = document.querySelector(".sl_");
                                            var so_luong = document.querySelector(".so_luong__");
                                            var form_select = document.querySelector(".form-color");
                                            var cong = document.querySelector(".inc");
                                            var tru = document.querySelector(".dec")
                                            var cong_ = document.querySelector('.cong');
                                            var tru_ = document.querySelector('.tru');
                                            // Hàm để chuyển đổi chuỗi sang số nguyên
                                            function parseNumber(str) {
                                                return parseInt(str.trim(), 10);
                                            }

                                            // Hàm để cập nhật giá trị max
                                            function updateMax() {
                                                so_luong_add.max = parseNumber(so_luong.textContent);
                                            }
                                            cong.style.pointerEvents = 'none';
                                            tru.style.pointerEvents = 'none';
                                            cong.style.display = 'none';
                                            tru.style.display = 'none';



                                            // Gọi hàm cập nhật giá trị max khi trang được tải
                                            updateMax();
                                            cong_.addEventListener('click', function() {
                                                var currentValue = parseNumber(so_luong_add.value);
                                                var maxValue = parseNumber(so_luong_add.max);
                                                if (currentValue < maxValue) {
                                                    so_luong_add.value = currentValue + 1;
                                                }
                                            });

                                            tru_.addEventListener('click', function() {
                                                var currentValue = parseNumber(so_luong_add.value);
                                                if (currentValue > 0) {
                                                    so_luong_add.value = currentValue - 1;
                                                }
                                            });




                                            // Lắng nghe sự kiện onchange của select
                                            form_select.onchange = function() {
                                                // Cập nhật giá trị max khi select thay đổi
                                                updateMax();
                                                console.log(so_luong_add.value)
                                            };

                                        });
                                    </script>

                                    <div class="product-info-footer py-2">
                                        <h6 class="code"><span>Lượt xem</span><?= shorten_number($sp['so_luot_xem']) ?></h6>




                                        <div class="social-icons">

                                            <span>Share</span>
                                            <a href="#/"><i class="fa fa-facebook"></i></a>
                                            <a href="#/"><i class="fa fa-dribbble"></i></a>
                                            <a href="#/"><i class="fa fa-pinterest-p"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Product Info Area ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-review-tabs-content">
                        <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
                            <li role="presentation">
                                <a id="information-tab" data-bs-toggle="pill" href="#information" role="tab" aria-controls="information" aria-selected="true">Mô tả</a>
                            </li>

                            <li role="presentation">
                                <a class="active" id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews <span>(<?= $sl['sl'] ?>)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content product-tab-content" id="ReviewTabContent">
                            <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                                <div class="product-information">
                                    <p><?= $sp['mota'] ?></p>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-review-content">
                                    <div class="review-content-header">
                                        <h3>Đánh giá khách hàng</h3>
                                        <div class="review-info">
                                            <ul class="review-rating">
                                                <?php
                                                $avg = intval($avg_sao['avg_rating']); // Chuyển đổi rating thành số nguyên


                                                // Hiển thị các ngôi sao đầy
                                                for ($i = 1; $i <= $avg; $i++) {

                                                    echo "<li class='fa fa-star'></li>";
                                                }

                                                // Hiển thị các ngôi sao trống nếu cần
                                                for ($i = $avg + 1; $i <= 5; $i++) {

                                                    echo "<li class='fa fa-star-o'></li>";
                                                }


                                                ?>
                                            </ul>
                                            <span class="review-caption">Có <?= $sl['sl'] ?> lượt review</span>
                                            <?php if (isset($_SESSION['user'])) {
                                                if (isset($check_buy) && !empty($check_buy)) {
                                                    echo "  <span class='review-write-btn'>Viết bình luận</span>";
                                                }
                                            } ?>
                                        </div>
                                    </div>


                                    <!--== Start Reviews Form Item ==-->
                                    <div class="reviews-form-area">
                                        <h4 class="title">Viết bình luận</h4>
                                        <div class="reviews-form-content">
                                            <form class="form-cmt" method="post" action="index.php?act=add_cmt">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="for_name">Name</label>
                                                            <input id="for_name" class="form-control" name="ho_ten" rules="required" type="text" placeholder="Họ tên" value="<?= $_SESSION['user']['ho_ten'] ?>">

                                                            <span class="form-message"></span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <span class="title">Rating</span>
                                                            <ul class="review-rating star">
                                                                <?php if ($check_unique) { ?>
                                                                    <li class="fa fa-star" data-value="1"></li>
                                                                    <li class="fa fa-star" data-value="2"></li>
                                                                    <li class="fa fa-star" data-value="3"></li>
                                                                    <li class="fa fa-star" data-value="4"></li>
                                                                    <li class="fa fa-star" data-value="5"></li>
                                                                    <input type="hidden" id="ratingInput" name="rating" value="5">
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                var stars = document.querySelectorAll('.review-rating li');
                                                                var ratingInput = document.getElementById('ratingInput');
                                                                stars.forEach(function(star) {
                                                                    star.addEventListener('click', function() {
                                                                        var value = this.getAttribute('data-value');
                                                                        ratingInput.value = value;
                                                                        console.log("Selected rating:", ratingInput.value);
                                                                    })
                                                                })

                                                                var form = document.querySelector(".form-cmt");
                                                                var rating = document.getElementById("rating");


                                                                $('.star li').click(function() {
                                                                    var index = $(this).index();


                                                                    $('.star li').each(function(i) {
                                                                        $(this).toggleClass('fa-star', i <= index);
                                                                        $(this).toggleClass('fa-star-o', i > index);
                                                                    });
                                                                });









                                                            });
                                                        </script>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="for_review-title">Tiêu đề</label>
                                                            <input id="for_review-title" class="form-control" rules="required" name="tieu_de" type="text" placeholder="Viết tiêu đề">
                                                            <span class="form-message"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="for_comment">Nội dung</label>
                                                            <textarea id="for_comment" class="form-control" rules="required" name="noi_dung" placeholder="Viết nội dung"></textarea>
                                                            <span class="form-message"></span>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_sp" value="<?= $_GET['id_sp'] ?>">

                                                    <div class="col-md-12">
                                                        <div class="form-submit-btn">
                                                            <button type="submit" class="btn-submit">Gửi đánh giá</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--== End Reviews Form Item ==-->

                                    <div class="reviews-content-body">
                                        <?php foreach ($comment as $cmt) : ?>

                                            <div class="review-item">
                                                <ul class="review-rating">
                                                    <?php
                                                    $rating = intval($cmt['rating']); // Chuyển đổi rating thành số nguyên

                                                    if ($rating !== 0) {
                                                        // Hiển thị các ngôi sao đầy
                                                        for ($i = 1; $i <= $rating; $i++) {

                                                            echo "<li class='fa fa-star'></li>";
                                                        }

                                                        // Hiển thị các ngôi sao trống nếu cần
                                                        for ($i = $rating + 1; $i <= 5; $i++) {

                                                            echo "<li class='fa fa-star-o'></li>";
                                                        }
                                                    }

                                                    ?>
                                                </ul>
                                                <h3 class="title"><?= $cmt['tieu_de'] ?></h3>
                                                <h5 class="sub-title"><span><?= $cmt['ten_nguoi_dung'] ?></span> Ngày <span><?= date("d/m/Y", strtotime($cmt['ngay_dang'])) ?></span>
                                                </h5>
                                                <p class="noi_dung"><?= $cmt['noi_dung'] ?></p>
                                                <form action="index.php?act=edit_cmt" method="post" class="form_nd">
                                                    <input type="hidden" name="noi_dung" class="form_cmt_nd">
                                                    <input type="hidden" name="id_cmt" value="<?=$cmt['id_binh_luan']?>">

                                                    <?php
                                                    $id =  $cmt['id_binh_luan'];
                                                    if (isset($_SESSION['user']['id_nguoi_dung'])) {
                                                        if ($_SESSION['user']['id_nguoi_dung'] == $cmt['id_nguoi_dung']) {
                                                            echo "<a href='index.php?act=deletebinhluan&id=$id'class='btn btn-danger mx-2' style='color:white;'>Xóa</a> <button type='submit' class='btn btn-primary mx-2 btn_edit' style='color:white;'>Sửa</button>";
                                                        } else {
                                                            echo "<a href='index.php?act=report&id_bl=$id'>Báo cáo</a>";
                                                        }
                                                    }
                                                    ?>
                                                </form>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <!--== Start Reviews Pagination Item ==-->
                                    <div class="review-pagination">

                                    </div>
                                    <!--== End Reviews Pagination Item ==-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Single Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-best-seller-area">
        <div class="container pt--0">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Sản phẩm cùng loại</h3>
                        <div class="desc">
                            <p>Bạn có thể mua sản phẩm cùng loại ở đây</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-wrap">
                        <div class="swiper-container product-slider-col4-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">

                                    <!--== Start Product Item ==-->
                                    <?php foreach ($san_pham_cung_loai as $sp) : ?>
                                        <div class="product-item">
                                            <div class="inner-content">
                                                <div class="product-thumb">
                                                    <a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">
                                                        <img src="../upload/<?= $sp['hinh_anh'] ?>" width="270" height="274" alt="Image-HasTech">
                                                    </a>
                                                    <div class="product-flag">
                                                        <ul>
                                                            <?php
                                                            if ($sp['sale'] !== 0) {
                                                                $price = $sp['sale'];
                                                                echo "<li class='discount'>-$price %</li>";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    
                                                    <a class="banner-link-overlay" href="shop.html"></a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="category">
                                                        <ul>
                                                            <li><a href="shop.html"><?= $sp['ten_thuong_hieu'] ?></a></li>
                                                            <li class="sep">/</li>
                                                            <li><a href="shop.html"><?= $sp['ten_danh_muc'] ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <h4 class="title"><a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_san_pham'] ?></a></h4>
                                                    <div class="prices">
                                                        <?php
                                                        if ($sp['sale'] !== 0) {
                                                        ?>
                                                            <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                            <span class="sep">-</span>
                                                        <?php } ?>

                                                        <?php $old = $sp['gia'];
                                                        $new = intval($old) - (intval($old) * intval($sp['sale']) / 100);
                                                        ?>
                                                        <span class="price"><?= number_format($new, 0, '.', '.') ?> VND</span>
                                                        <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <!--== End prPduct Item ==-->
                                </div>
                            </div>
                        </div>
                        <!--== Add Swiper Arrows ==-->
                        <div class="product-swiper-btn-wrap">
                            <div class="product-swiper-btn-prev">
                                <i class="fa fa-arrow-left"></i>
                            </div>
                            <div class="product-swiper-btn-next">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->
</main>
<script>
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement
        }
    }
    document.addEventListener("DOMContentLoaded", function() {
        let btnSuaList = document.querySelectorAll(".btn_edit");

        btnSuaList.forEach(function(btnSua) {
            btnSua.addEventListener("click", function() {
                let box = getParent(btnSua, ".review-item");
                let form = box.querySelector('.form_nd');
                let input = box.querySelector(".form_cmt_nd");
             
              

                let editableSpan = box.querySelector(".noi_dung");
              
                editableSpan.oninput = function(){
                    input.value = editableSpan.textContent
                }
                

                if (btnSua.textContent == "Sửa") {
                    btnSua.textContent = "Cập nhật";
                    editableSpan.contentEditable = true;
                    editableSpan.focus();
                    
                    form.onsubmit = function(e) {
                        e.preventDefault();


                    };
                } else if (btnSua.textContent == "Cập nhật") {

                    form.onsubmit = null;
                    form.submit();
                    btnSua.textContent = "Sửa";

                }
            });
        });


    });
</script>