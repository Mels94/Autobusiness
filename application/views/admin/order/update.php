
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Update Order</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="/admin/order/index">Order</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card form_card">
                    <form class="text-center border border-light p-5" action="" method="post">
                        <h2 class="mb-4">Update order</h2>
                        <input type="text" name="name" class="form-control" placeholder="Name*"
                               value="<?php if (!empty($data) && isset($data[1][0]['name'])) {
                                   echo $data[1][0]['name'];
                               } ?>">
                        <small><?php if (!empty($data) && isset($data[0]['name'])) {
                                echo $data[0]['name'];
                            } ?></small>
                        <input type="text" name="phone" class="form-control mt-4" placeholder="Phone*"
                               value="<?php if (!empty($data) && isset($data[1][0]['phone'])) {
                                   echo $data[1][0]['phone'];
                               } ?>">
                        <small><?php if (!empty($data) && isset($data[0]['phone'])) {
                                echo $data[0]['phone'];
                            } ?></small>
                        <textarea class="form-control mt-4" id="textarea" name="message" rows="2"
                                  placeholder="Message"><?php if (!empty($data) && isset($data[1][0]['message'])) {
                                echo $data[1][0]['message'];
                            } ?></textarea>


                        <?php if (!empty($data) && isset($data[1][0]['product_order'])): ?>
                        <?php $productOrder = json_decode($data[1][0]['product_order']); ?>
                        <?php foreach ($productOrder as $item): ?>
                        <div class="form-row">
                            <div class="form-group col-md-6 mt-4">
                                <input type="number" name="product_id[]" class="form-control" placeholder="Product ID*"
                                       value="<?php if (!empty($item) && isset($item->product_id)) {
                                           echo $item->product_id;
                                       } ?>">
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <input type="number" name="count[]" class="form-control" placeholder="Count*"
                                       value="<?php if (!empty($item) && isset($item->count)) {
                                           echo $item->count;
                                       } ?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <small class="small_productError"><?php if (!empty($data) && isset($data[0]['product'])) {
                                echo $data[0]['product'];
                            } ?></small>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn-sm btn-danger border-0 mr-2 delete_productField" title="delete product field">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn-sm btn-success btn-number border-0 add_productField" title="add product field">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <input type="text" name="name_card" class="form-control mt-4" placeholder="Name on Card*"
                               value="<?php if (!empty($data) && isset($data[1][0]['name_card'])) {
                                   echo $data[1][0]['name_card'];
                               } ?>">
                        <small><?php if (!empty($data) && isset($data[0]['name_card'])) {
                                echo $data[0]['name_card'];
                            } ?></small>
                        <input type="text" name="card_number" class="form-control mt-4" placeholder="Card Number*"
                               value="<?php if (!empty($data) && isset($data[1][0]['card_num'])) {
                                   echo $data[1][0]['card_num'];
                               } ?>">
                        <small><?php if (!empty($data) && isset($data[0]['card_number'])) {
                                echo $data[0]['card_number'];
                            } ?></small>
                        <!-- Sign up button -->
                        <input class="btn btn-info my-4 btn-block bnt" type="submit" name="submit"
                               value="Update">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
