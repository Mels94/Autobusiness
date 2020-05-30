<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">View Order</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">View</li>
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
                    <div class="card-body">
                        <a class="btn btn-primary" href="/admin/order/update/<?= $data[0]['id']; ?>">Update</a>
                        <button class="btn btn-danger delete_order" data-id="<?= $data[0]['id']; ?>">Delete</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <?php if (!empty($data) && isset($data)): ?>
                                <tr>
                                    <th>Id</th>
                                    <td><?= $data[0]['id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?= $data[0]['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?= $data[0]['phone']; ?></td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td><?= $data[0]['message']; ?></td>
                                </tr>
                                <tr>
                                    <th>Name on Card</th>
                                    <td><?= $data[0]['name_card']; ?></td>
                                </tr>
                                <tr>
                                    <th>Card number</th>
                                    <td><?= $data[0]['card_num']; ?></td>
                                </tr>
                                <tr>
                                    <th>Product Order</th>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                            Order
                                        </button>

                                        <?php $productOrder = json_decode($data[0]['product_order']); ?>

                                        <div class="modal fade" id="myModal" role="dialog">
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
                                </tr>
                                <tr>
                                    <th>Order time</th>
                                    <td><?= $data[0]['order_time']; ?></td>
                                </tr>
                                <tr>
                                    <th>Shipping date</th>
                                    <td><?= $data[0]['shipping_date']; ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

