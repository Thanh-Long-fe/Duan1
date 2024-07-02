<?php $max = 0 ?>
<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Product Page</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Product Page</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <form action="index.php?act=loc" method="post">
        <section class="product-area product-default-area">

            <div class="container">

                <div class="row flex-xl-row-reverse justify-content-between">
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-top-bar">
                                    <div class="shop-top-left">
                                        <p class="pagination-line">Danh sách sản phẩm</p>
                                    </div>
                                    <div class="shop-top-center">
                                        <nav class="product-nav">
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                                                <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-list"></i></button>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="shop-top-right">
                                        <div class="shop-sort">
                                            <span>Sort By :</span>
                                            <select class="form-select" aria-label="Sort select example">
                                                <option selected>Default</option>
                                                <option value="1">Popularity</option>
                                                <option value="2">Average Rating</option>
                                                <option value="3">Newsness</option>
                                                <option value="4">Price Low to High</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                        <div class="row" style="justify-content: unset;">
                                            <?php foreach ($product as $sp) : ?>
                                                <?php
                                                if (isset($dm) && !empty($dm)) {
                                                    foreach ($dm as $a) {
                                                        if (isset($th) && !empty($th)) {
                                                            foreach ($th as $b) {
                                                                if ($sp['id_danh_muc'] == $a && $sp['id_thuong_hieu'] == $b) {

                                                ?>
                                                                    <div class="col-sm-6 col-lg-4 box">
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
                                                                                            <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                            <span class="sep">-</span>
                                                                                        <?php } ?>

                                                                                        <?php $old = $sp['gia'];
                                                                                        $new = intval($old) - (intval($old) * intval($sp['sale']) / 100);
                                                                                        ?>
                                                                                        <span class="price"><?= number_format($new, 0, '.', '.') ?> VND</span>
                                                                                        <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                                        <?php $max = max($max, $new) ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--== End prPduct Item ==-->
                                                                    </div>
                                                                <?php
                                                                }
                                                            }
                                                        } else {
                                                            if ($sp['id_danh_muc'] == $a) {
                                                                // Sản phẩm thuộc danh mục được chọn
                                                                // Hiển thị mã HTML ở đây
                                                                ?>
                                                                <div class="col-sm-6 col-lg-4 box">
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
                                                                                        <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                        <span class="sep">-</span>
                                                                                    <?php } ?>

                                                                                    <?php $old = $sp['gia'];
                                                                                    $new = intval($old) - (intval($old) * intval($sp['sale']) / 100);
                                                                                    ?>
                                                                                    <span class="price"><?= number_format($new, 0, '.', '.') ?> VND</span>
                                                                                    <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                                    <?php $max = max($max, $new) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--== End prPduct Item ==-->
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    if (isset($th) && !empty($th)) {
                                                        foreach ($th as $b) {
                                                            if ($sp['id_thuong_hieu'] == $b) {
                                                                // Sản phẩm thuộc thương hiệu được chọn
                                                                // Hiển thị mã HTML ở đây
                                                            ?>
                                                                <div class="col-sm-6 col-lg-4 box">
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
                                                                                        <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                        <span class="sep">-</span>
                                                                                    <?php } ?>

                                                                                    <?php $old = $sp['gia'];
                                                                                    $new = intval($old) - (intval($old) * intval($sp['sale']) / 100);
                                                                                    ?>
                                                                                    <span class="price"><?= number_format($new, 0, '.', '.') ?> VND</span>
                                                                                    <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                                    <?php $max = max($max, $new) ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--== End prPduct Item ==-->
                                                                </div>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            <?php endforeach; ?>


                                            <div class="col-12">
                                                <div class="pagination-items">
                                                    <ul class="pagination justify-content-end mb--0">


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                        <div class="row">

                                            <?php foreach ($product as $sp) : ?>
                                                <?php
                                                if (isset($dm) && !empty($dm)) {
                                                    foreach ($dm as $a) {
                                                        if (isset($th) && !empty($th)) {
                                                            foreach ($th as $b) {
                                                                if ($sp['id_danh_muc'] == $a && $sp['id_thuong_hieu'] == $b) {
                                                                    // Sản phẩm thuộc cả danh mục và thương hiệu được chọn
                                                                    // Hiển thị mã HTML ở đây
                                                ?>
                                                                    <div class="col-md-12 box">
                                                                        <!--== Start Product Item ==-->
                                                                        <div class="product-item product-list-item">
                                                                            <div class="inner-content">
                                                                                <div class="product-thumb">
                                                                                    <a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">
                                                                                        <img src="../upload/<?= $sp['hinh_anh'] ?>" width="322" height="360" alt="Image-HasTech">
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
                                                                                    <h4 class="title"><a href="single-product.html"><?= $sp['ten_san_pham'] ?></a></h4>
                                                                                    <div class="prices">
                                                                                        <div class="prices">
                                                                                            <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                            <span class="sep">-</span>
                                                                                            <span class="price"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                            <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p><?= $sp['mota'] ?></p>
                                                                                    <a class="btn-theme btn-sm" href="index.php?act=add_to_cart&id_sp=<?= $sp['id'] ?>">Thêm vào giỏ</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--== End prPduct Item ==-->
                                                                    </div>
                                                                <?php
                                                                }
                                                            }
                                                        } else {
                                                            if ($sp['id_danh_muc'] == $a) {
                                                               
                                                                ?>
                                                                <div class="col-md-12 box">
                                                                    <!--== Start Product Item ==-->
                                                                    <div class="product-item product-list-item">
                                                                        <div class="inner-content">
                                                                            <div class="product-thumb">
                                                                                <a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">
                                                                                    <img src="../upload/<?= $sp['hinh_anh'] ?>" width="322" height="360" alt="Image-HasTech">
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
                                                                                <h4 class="title"><a href="single-product.html"><?= $sp['ten_san_pham'] ?></a></h4>
                                                                                <div class="prices">
                                                                                    <div class="prices">
                                                                                        <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                        <span class="sep">-</span>
                                                                                        <span class="price"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                        <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <p><?= $sp['mota'] ?></p>
                                                                                <a class="btn-theme btn-sm" href="index.php?act=add_to_cart&id_sp=<?= $sp['id'] ?>">Thêm vào giỏ</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--== End prPduct Item ==-->
                                                                </div>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    if (isset($th) && !empty($th)) {
                                                        foreach ($th as $b) {
                                                            if ($sp['id_thuong_hieu'] == $b) {
                                                                // Sản phẩm thuộc thương hiệu được chọn
                                                                // Hiển thị mã HTML ở đây
                                                            ?>
                                                                <div class="col-md-12 box">
                                                                    <!--== Start Product Item ==-->
                                                                    <div class="product-item product-list-item">
                                                                        <div class="inner-content">
                                                                            <div class="product-thumb">
                                                                                <a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">
                                                                                    <img src="../upload/<?= $sp['hinh_anh'] ?>" width="322" height="360" alt="Image-HasTech">
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
                                                                                <h4 class="title"><a href="single-product.html"><?= $sp['ten_san_pham'] ?></a></h4>
                                                                                <div class="prices">
                                                                                    <div class="prices">
                                                                                        <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                        <span class="sep">-</span>
                                                                                        <span class="price"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                                        <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <p><?= $sp['mota'] ?></p>
                                                                                <a class="btn-theme btn-sm" href="index.php?act=add_to_cart&id_sp=<?= $sp['id'] ?>">Thêm vào giỏ</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--== End prPduct Item ==-->
                                                                </div>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            <?php endforeach; ?>

                                            <div class="col-12">
                                                <div class="pagination-items">
                                                    <ul class="pagination justify-content-end mb--0">



                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <button class="mb-3 w-100 py-2">Lọc</button>
                        <div class="shop-sidebar">
                            <div class="shop-sidebar-category">
                                <h4 class="sidebar-title">Danh mục</h4>
                                <div class="sidebar-category">
                                    <ul class="category-list mb--0">
                                        <?php foreach ($dm_ as $sp) : ?>
                                            <li class="d-flex">
                                                <input type="checkbox" name="dm[<?= $sp['id_danh_muc'] ?>]" <?=isset($dm) && in_array($sp['id_danh_muc'], $dm) ? 'checked' : '' ?> value="<?= $sp['id_danh_muc'] ?>">
                                                <a href="#">
                                                    <?= $sp['ten_danh_muc'] ?>
                                                    <span>(<?= $sp['so_luong_san_pham'] ?>)</span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>

                            <div class="shop-sidebar-price-range">
                                <h4 class="sidebar-title">Lọc giá</h4>
                                <div class="range-slider-container">
                                    <input type="range" min="0" max="<?= $max ?>" step="50000" value="0" class="range-slider" id="range1" name="min">
                                    <input type="range" min="0" max="<?= $max ?>" value="<?= $max ?>" step="50000" class="range-slider" id="range2" name="max">
                                    <div class="range-value ">
                                        <span id="value1"></span>
                                        <span id="value2"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-sidebar-brand">
                                <h4 class="sidebar-title">Thương hiệu</h4>
                                <div class="sidebar-brand">
                                    <ul class="brand-list mb--0">
                                    <?php foreach ($th_ as $sp) : ?>
                                            <li class="d-flex">
                                                <input type="checkbox" name="th[<?= $sp['id_thuong_hieu'] ?>]" <?=isset($th) && in_array($sp['id_thuong_hieu'], $th) ? 'checked' : '' ?> value="<?= $sp['id_thuong_hieu'] ?>">
                                                <a href="#">
                                                    <?= $sp['ten_thuong_hieu'] ?>
                                                    <span>(<?= $sp['so_luong_san_pham'] ?>)</span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>
    <!--== End Product Area Wrapper ==-->
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let ranger1 = document.querySelector("#range1");
        let ranger2 = document.querySelector("#range2");
        let tien = document.querySelectorAll(".gia_tien");

        function handleRangeChange() {
            let value1 = parseInt(ranger1.value);
            let value2 = parseInt(ranger2.value);
            tien.forEach(function(element) {
                let value_ = parseInt(element.textContent);
                let block = getParent(element, '.box');
                if (value_ >= value1 && value_ <= value2) {
                    block.style.display = "block";
                } else {
                    block.style.display = "none";
                }
            });
        }

        function getParent(element, selector) {
            while (element.parentElement) {
                if (element.parentElement.matches(selector)) {
                    return element.parentElement;
                }
                element = element.parentElement
            }
        }


        ranger1.oninput = handleRangeChange;
        ranger2.oninput = handleRangeChange;


        handleRangeChange();
    });
    document.addEventListener("DOMContentLoaded", function() {
    let range1 = document.getElementById("range1");
    let range2 = document.getElementById("range2");
    let value1 = document.getElementById("value1");
    let value2 = document.getElementById("value2");

    // Cập nhật giá trị mỗi khi thanh trượt thay đổi
    range1.addEventListener("input", function() {
        value1.textContent = formatCurrency(this.value);
    });

    range2.addEventListener("input", function() {
        value2.textContent = formatCurrency(this.value);
    });

    // Hàm định dạng giá tiền
    function formatCurrency(value) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
    }

    // Khởi tạo giá trị ban đầu
    value1.textContent = formatCurrency(range1.value);
    value2.textContent = formatCurrency(range2.value);
});
</script>