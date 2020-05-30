<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
                    <div class="row">
                        <div class="heading-content col-md-12">
                            <p><a href="/">Homepage</a> / <em> Car Details</em></p>
                            <h2>Car <em>Details</em></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recent-car single-car wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
    <div class="container">
        <div class="recent-car-content">
            <div class="row">
                <div class="col-md-6">
                    <div id="single-car" class="slider-pro">
                        <div class="sp-slides">
                            <div class="sp-slide">
                                <img class="sp-image"
                                     src="<?= UPLOADS.$data[0][0]['cat_name']; ?>/<?= $data[0][0]['img_path']; ?>"
                                     alt="auto">
                            </div>

                            <!--                            <div class="sp-slide">
                                                            <img class="sp-image" src="../../../assets/images/singleImages/max/auto_2.jpg" alt="auto_2" />
                                                        </div>

                                                        <div class="sp-slide">
                                                            <img class="sp-image" src="../../../assets/images/singleImages/max/auto_3.jpg" alt="auto_3" />
                                                        </div>

                                                        <div class="sp-slide">
                                                            <img class="sp-image" src="../../../assets/images/singleImages/max/auto_4.jpg" alt="auto_4" />
                                                        </div>

                                                        <div class="sp-slide">
                                                            <img class="sp-image" src="../../../assets/images/singleImages/max/auto_5.jpg" alt="auto_5" />
                                                        </div>-->

                        </div>
                        <div class="sp-thumbnails">
                            <img class="sp-thumbnail"
                                 src="<?= UPLOADS.$data[0][0]['cat_name']; ?>/<?= $data[0][0]['img_path']; ?>"
                                 alt="auto">
                            <!--                            <img class="sp-thumbnail" src="../../../assets/images/singleImages/min/auto_2.jpg" alt="auto_2" />
                                                        <img class="sp-thumbnail" src="../../../assets/images/singleImages/min/auto_3.jpg" alt="auto_3" />
                                                        <img class="sp-thumbnail" src="../../../assets/images/singleImages/min/auto_4.jpg" alt="auto_4" />
                                                        <img class="sp-thumbnail" src="../../../assets/images/singleImages/min/auto_5.jpg" alt="auto_5" />-->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="car-details">
                        <h4><?= $data[0][0]['cat_name'] . ' ' . $data[0][0]['name']; ?></h4>
                        <span><?= $data[0][0]['price']; ?> $</span>
                        <div class="container mt-5">
                            <div class="row">
                                <ul class="car-info col-md-6">
                                    <li><i class="flaticon flaticon-calendar"></i>
                                        <p><?= $data[0][0]['date']; ?></p></li>
                                    <li><i class="flaticon flaticon-road"></i>
                                        <p><?= $data[0][0]['run']; ?> km</p></li>
                                    <li><i class="flaticon flaticon-fuel"></i>
                                        <p><?= $data[0][0]['motor']; ?></p></li>
                                </ul>
                                <ul class="car-info col-md-6">
                                    <li><i class="flaticon flaticon-art"></i>
                                        <p><?= $data[0][0]['color']; ?></p></li>
                                    <li><i class="flaticon flaticon-shift"></i>
                                        <p><?= $data[0][0]['gear_box']; ?></p></li>
                                    <li><i class="flaticon flaticon-speed"></i>
                                        <p><?= $data[0][0]['horsepower']; ?> p/h</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-action-wrap">
                            <div class="prodict-statas">
                                <span>Quantity :</span>
                            </div>
                            <div class="product-quantity quantityDesc">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" disabled>
                                    <input type="button" class="dec qtybutton" value="-">
                                    <input type="button" class="inc qtybutton" value="+" data-id="<?= $data[0][0]['count']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="similar-info">
                            <div class="primary-button">
                                <button class="buy_now" data-id="<?= $data[0][0]['id']; ?>">buy now <i
                                            class="fa fa-dollar"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="more-details">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="item wow fadeInUp" data-wow-duration="0.5s">
                        <div class="sep-section-heading">
                            <h2>More <em>Description</em></h2>
                        </div>
                        <p><em><?= $data[0][0]['description']; ?></em></p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="item">
                        <div class="sep-section-heading">
                            <h2>Contact <em>Informations</em></h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati accusamus a iure nulla,
                            sed non ex nobis eius esse
                            distinctio imps sunt quia sint quis quisquam odio repellat.</p>
                        <div class="contact-info">
                            <div class="row">
                                <div class="phone col-md-12 col-sm-6 col-xs-6">
                                    <i class="fa fa-phone"></i><span>+1 123 489-5748</span>
                                </div>
                                <div class="mail col-md-12 col-sm-6 col-xs-6">
                                    <i class="fa fa-envelope"></i><span>youremail@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="recent-car similar-car wow fadeIn" data-wow-duration="1s">
        <div class="container">
            <div class="recent-car-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <div class="icon">
                                <i class="fa fa-car"></i>
                            </div>
                            <div class="text-content">
                                <h2>Similar Cars</h2>
                                <span>You may like this too</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="owl-similar" class="owl-carousel owl-theme">
                    <?php if (!empty($data[1]) && isset($data[1])): ?>
                        <?php foreach ($data[1] as $value): ?>
                            <div class="item car-item">
                                <div class="thumb-content">
                                    <div class="car-banner">
                                        <a href="/site/single_car/<?= $value['id']; ?>">New</a>
                                    </div>
                                    <a href="/site/single_car/<?= $value['id']; ?>"><img
                                                src="<?= UPLOADS.$value['cat_name']; ?>/<?= $value['img_path']; ?>"
                                                alt="auto_1"></a>
                                </div>
                                <div class="down-content">
                                    <a href="/site/single_car/<?= $value['id']; ?>">
                                        <h4><?= $value['cat_name'] . ' ' . $value['name']; ?></h4></a>
                                    <span>$<?= $value['price']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>