<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Order</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table id="paginationFullNumbers" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">id</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Phone</th>
                                <th class="border-top-0">Message</th>
                                <th class="border-top-0">Name on Card</th>
                                <th class="border-top-0">Card number</th>
                                <th class="border-top-0">Product Order</th>
                                <th class="border-top-0">Order time</th>
                                <th class="border-top-0">Shipping date</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($data) && isset($data)): ?>
                                <?php foreach ($data as $key => $value): ?>
                                    <tr <?php if ($value['isNew'] == 1){ ?> style="background-color: #B8B8B8" <?php } ?>>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><?= $value['phone']; ?></td>
                                        <td><?= $value['message']; ?></td>
                                        <td><?= $value['name_card']; ?></td>
                                        <td><?= $value['card_num']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info open_isNewOrder" data-toggle="modal" data-id="<?= $value['id']; ?>" data-target="#myModal<?= $value['id']; ?>">
                                                Order
                                            </button>

                                            <?php $productOrder = json_decode($value['product_order']); ?>

                                            <div class="modal fade" id="myModal<?= $value['id']; ?>" role="dialog">
                                                <div class="modal-dialog">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Product Order</h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-hover w-75 text-center m-auto">
                                                                <tr>
                                                                    <th><b>Product ID</b></th>
                                                                    <th><b>Count</b></th>
                                                                </tr>
                                                                <?php if (!empty($productOrder) && isset($productOrder)): ?>
                                                                <?php foreach ($productOrder as $item): ?>
                                                                    <tr>
                                                                        <td><?= $item->product_id; ?></td>
                                                                        <td><?= $item->count . '<br>'; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </td>
                                        <td><?= $value['order_time']; ?></td>
                                        <td><?= $value['shipping_date']; ?></td>
                                        <td>
                                            <a href="/admin/order/view/<?= $value['id']; ?>" title="View"
                                               class="icon_actions view"><i class="fas fa-eye"></i></a>
                                            <a href="/admin/order/update/<?= $value['id']; ?>" title="Update"
                                               class="icon_actions update"><i class="fas fa-edit"></i></a>
                                            <button class="icon_actions delete_order delete_btn" title="Delete"
                                                    data-id="<?= $value['id']; ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

