<?php use application\components\Pagination; ?>

<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
                    <div class="row">
                        <div class="heading-content col-md-12">
                            <p><a href="/">Homepage</a> / <em> Product</em></p>
                            <h2>Product</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="on-grids wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
    <div class="container">
        <div class="recent-car-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php if (!empty($data) && isset($data[0])): ?>
                            <?php foreach ($data[0] as $value): ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="car-item">
                                        <div class="thumb-content">
                                            <div class="thumb-inner">
                                                <a href="/site/single_car/<?= $value['id']; ?>"><img src="<?= UPLOADS.$value['cat_name']; ?>/<?= $value['img_path']; ?>" alt="auto"></a>
                                            </div>
                                        </div>
                                        <div class="down-content">
                                            <a href="/site/single_car/<?= $value['id']; ?>"><h4><?= $value['cat_name'].' '.$value['name']; ?></h4></a>
                                            <span><?= $value['price']; ?> $</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <div class="col-md-12">
                            <div class="pagination">
                                <ul class="remove">
                                    <li>
                                            <?php
                                            $url = '';
                                            foreach ($_GET as $index => $item) {
                                                if ($index == 'pn'){
                                                    continue 1;
                                                }
                                                $url .= $index.'='.$item .'&';
                                            }
                                            if (strlen($url) !== 0){
                                                $url = '?'.$url;
                                            }
                                            if (!empty($data[1]) && isset($data[1])){
                                                $searchProduct_pn = new Pagination(20, "/site/product{$url}", 'product', $data[1]);
                                                echo $searchProduct_pn->getPaginationLink();
                                            }else{
                                                $product_pn = new Pagination(20, "/site/product{$url}", 'product');
                                                echo $product_pn->getPaginationLink();
                                            }
                                            ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>