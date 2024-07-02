<main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area">
        <div class="swiper-container home-slider-container default-slider-container">
            <div class="swiper-wrapper home-slider-wrapper slider-default">
                <div class="swiper-slide">
                    <div class="slider-content-area slider-content-area-two" data-bg-img="assets/img/slider/slider-02.webp">
                        <div class="container">
                            <div class="slider-container">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-lg-5">
                                        <div class="slider-content">
                                            <div class="content">
                                                <div class="desc-box">
                                                    <p class="desc">Giảm lên tới 30%</p>
                                                </div>
                                                <div class="title-box">
                                                    <h2 class="title"><span class="font-weight-400">Giày<br>
                                                        </span>các loại</h2>
                                                </div>
                                                <div class="btn-box">
                                                    <a class="btn-slider" href="index.php?act=sanpham">Mua ngay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-content-area slider-content-area-two" data-bg-img="assets/img/slider/slider-04.webp">
                        <div class="container">
                            <div class="slider-container">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-lg-5">
                                        <div class="slider-content">
                                            <div class="content">
                                                <div class="desc-box">
                                                    <p class="desc">Giảm lên tới 30%</p>
                                                </div>
                                                <div class="title-box">
                                                    <h2 class="title"><span class="font-weight-400">Giày<br>
                                                        </span>các loại</h2>
                                                </div>
                                                <div class="btn-box">
                                                    <a class="btn-slider" href="index.php?act=sanpham">Mua ngay</a>
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

            <!--== Add Swiper Arrows ==-->
            <div class="swiper-btn-wrap">
                <div class="swiper-btn-prev">
                    <i class="pe-7s-angle-left"></i>
                </div>
                <div class="swiper-btn-next">
                    <i class="pe-7s-angle-right"></i>
                </div>
            </div>
        </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Product Category Area Wrapper ==-->
    <section class="product-area product-category-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <!--== Start Product Category Item ==-->
                    <div class="product-category">
                        <div class="inner-content">
                            <div class="product-category-content">
                                <div class="content">
                                    <h4 class="sub-title">>Giảm tới 30%</h4>
                                    <h3 class="title"><a href="index.php?act=sanpham">Giày sport</a></h3>
                                </div>
                            </div>
                            <div class="product-category-thumb" data-bg-img="assets/img/shop/category/1.webp"></div>
                            <a class="banner-link-overlay" href="index.php?act=sanpham"></a>
                        </div>
                    </div>
                    <!--== End Product Category Item ==-->
                </div>
                <div class="col-sm-6 col-lg-4">
                    <!--== Start Product Category Item ==-->
                    <div class="product-category mt-xs-30">
                        <div class="inner-content">
                            <div class="product-category-content">
                                <div class="content">
                                    <h4 class="sub-title">>Giảm tới 30%</h4>
                                    <h3 class="title"><a href="index.php?act=sanpham">Sản phẩm mới</a></h3>
                                </div>
                            </div>
                            <div class="product-category-thumb" data-bg-img="assets/img/shop/category/2.webp"></div>
                            <a class="banner-link-overlay" href="index.php?act=sanpham"></a>
                        </div>
                    </div>
                    <!--== End Product Category Item ==-->
                </div>
                <div class="col-sm-6 col-lg-4">
                    <!--== Start Product Category Item ==-->
                    <div class="product-category mt-md-30">
                        <div class="inner-content">
                            <div class="product-category-content">
                                <div class="content">
                                    <h4 class="sub-title">Giảm tới 30%</h4>
                                    <h3 class="title"><a href="index.php?act=sanpham">Sneakers</a></h3>
                                </div>
                            </div>
                            <div class="product-category-thumb" data-bg-img="assets/img/shop/category/3.webp"></div>
                            <a class="banner-link-overlay" href="index.php?act=sanpham"></a>
                        </div>
                    </div>
                    <!--== End Product Category Item ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Category Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-default-area product-featured-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Sản phẩm nổi bật</h3>
                        <div class="desc">
                            <p>Có rất nhiều sản phẩm ở đây</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- start -->
                <?php foreach ($product as $a) :
                ?>
                    <div class="col-sm-6 col-lg-3">
                        <!--== Start Product Item ==-->
                        <div class="product-item">
                            <div class="inner-content">
                                <div class="product-thumb">
                                    <a href="index.php?act=ctsp&id_sp=<?= $a['id'] ?>">
                                        <img src="../upload/<?=$a['hinh_anh']?>" width="270" height="274" alt="Image-HasTech">
                                    </a>
                                    <div class="product-flag">
                                        <ul>
                                        <?php
                                                            if ($a['sale'] !== 0) {
                                                                $price = $a['sale'];
                                                                echo "<li class='discount'>-$price %</li>";
                                                            }
                                                            ?>
                                        </ul>
                                    </div>
                                   

                                </div>
                                <div class="product-info">
                                    <div class="category">
                                        <ul>
                                            <li><a href="index.php?act=list&id_th=<?= $a['id_thuong_hieu'] ?>"><?= $a['ten_thuong_hieu'] ?></a></li>
                                            <li class="sep">/</li>
                                            <li><a href="index.php?act=list&id_dm=<?= $a['id_danh_muc'] ?>"><?= $a['ten_danh_muc'] ?></a></li>
                                        </ul>
                                    </div>
                                    <h4 class="title"><a href="single-product.html"><?= $a['ten_san_pham'] ?></a></h4>
                                    <div class="prices">

                                        <?php
                                        if ($a['sale'] !== 0) {
                                        ?>
                                            <span class="price-old"><?= number_format($a['gia'], 0, '.', '.') ?> </span>
                                            <span class="sep">-</span>
                                            <?php } ?>

                                            <?php $old = $a['gia'];
                                                        $new = intval($old) - (intval($old) * intval($a['sale']) / 100);
                                                        ?>
                                            <span class="price"><?= number_format($new, 0, '.', '.') ?> VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End prPduct Item ==-->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="parallax" data-speed="1.08" data-bg-img="assets/img/photos/bg2.webp">
        <div class="container pt--0 pb--0">
            <div class="row divider-wrap divider-style3">
                <div class="col-lg-6">
                    <div class="divider-thumb mousemove">
                        <div class="shape-one scene">
                            <span class="scene-layer" data-depth=".5">
                                <img src="assets/img/photos/divider1.webp" width="377" height="243" alt="Image-HasTech">
                            </span>
                        </div>
                        <div class="shape-two mousemove-layer" data-speed="1"><img src="assets/img/shape/4.webp" width="532" height="326" alt="Image-HasTech"></div>
                        <div class="shape-three"><img src="assets/img/shape/5.webp" width="280" height="339" alt="Image-HasTech"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="divider-content">
                        <h4 class="sub-title">Saving 50%</h4>
                        <h2 class="title">All Online Store</h2>
                        <p class="desc">Offer Available All Shoes & Products</p>
                        <a class="btn-theme" href="shop.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Feature Area Wrapper ==-->
    <div class="feature-area">
        <div class="container pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="feature-content-box">
                        <div class="feature-box-wrap">
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/1.webp" width="55" height="41" alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Free Home Delivary</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/2.webp" width="35" height="41" alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Secure Payment</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/3.webp" width="33" height="41" alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Order Discount</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-item">
                                <div class="feature-icon-box">
                                    <div class="inner-content">
                                        <div class="icon-box">
                                            <img class="icon-img" src="assets/img/icons/4.webp" width="43" height="41" alt="Icon-HasTech">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">24 x 7 Online Support</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shape-group-style1">
                            <div class="shape-group-one"><img src="assets/img/shape/6.webp" width="214" height="58" alt="Image-HasTech"></div>
                            <div class="shape-group-two"><img src="assets/img/shape/7.webp" width="136" height="88" alt="Image-HasTech"></div>
                            <div class="shape-group-three"><img src="assets/img/shape/8.webp" width="108" height="74" alt="Image-HasTech"></div>
                            <div class="shape-group-four"><img src="assets/img/shape/9.webp" width="239" height="69" alt="Image-HasTech"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Feature Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-best-seller-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">SẢN PHẨM GIẢM GIÁ</h3>
                        <div class="desc">
                            <p>Có rất nhiều sản phẩm giảm giá ở đây</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-wrap">
                        <div class="swiper-container product-slider-col4-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($sanpham_sale as $sp) : ?>
                                    <div class="swiper-slide">
                                        <!--== Start Product Item ==-->
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
                                                    <div class="product-action">

                                                        <a class="btn-product-cart" href="index.php?act=add_to_cart&id_sp=<?= $sp['id'] ?>"><i class="fa fa-shopping-cart"></i></a>
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
                                                            <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?></span>
                                                            <span class="sep">-</span>
                                                        <?php } ?>

                                                        <?php $old = $sp['gia'];
                                                        $new = intval($old) - (intval($old) * intval($sp['sale']) / 100);
                                                        ?>
                                                        <span class="price"><?= number_format($new, 0, '.', '.') ?> VND</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                <?php endforeach; ?>
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

    <!--== Start Product Collection Area Wrapper ==-->

    <!--== End Product Collection Area Wrapper ==-->

    <!--== Start Testimonial Area Wrapper ==-->
    <section class="testimonial-area">
        <div class="container pt--0">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h3 class="title">Nhận xét khách hàng</h3>
                        <div class="desc">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container testimonial-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-thumb">
                                            <img src="../upload/anhliem.jpg" style="width: 90px !important; height: 90px !important;" alt="Image-HasTech">
                                        </div>
                                        <div class="testi-content">
                                            <p>Tôi rất hài lòng với chất lượng của sản phẩm</p>
                                            <div class="testi-author">
                                                <div class="testi-info">
                                                    <span class="name"><a href="about-us.html">Cristiano Ronaldo</a></span>
                                                </div>
                                            </div>
                                            <div class="testi-quote"><img src="assets/img/icons/quote1.webp" width="62" height="44" alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="testi-inner-content">
                                        <div class="testi-thumb">
                                            <img src="../upload/r4.jpg" style="width: 90px !important; height: 90px !important;" alt="Image-HasTech">
                                        </div>
                                        <div class="testi-content">
                                            <p>Tôi rất thích giày ở đây, chúng rất thoải moái</p>
                                            <div class="testi-author">
                                                <div class="testi-info">
                                                    <span class="name"><a href="about-us.html">Sergio Ramos</a></span>
                                                </div>
                                            </div>
                                            <div class="testi-quote"><img src="assets/img/icons/quote1.webp" width="62" height="44" alt="Image-HasTech"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Testimonial Area Wrapper ==-->
</main>