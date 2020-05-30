<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">View Product</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="/admin/product/index">Product</a>
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
                        <a class="btn btn-primary" href="/admin/product/update/<?= $data[0]['id']; ?>">Update</a>
                        <button class="btn btn-danger delete_product" data-id="<?= $data[0]['id']; ?>">Delete</button>
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
                                    <th>Category name</th>
                                    <td><?= $data[0]['cat_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Img path</th>
                                    <td><?= $data[0]['img_path']; ?></td>
                                </tr>
                                <tr>
                                    <th>IsNew</th>
                                    <td><?= $data[0]['isNew']; ?></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td><?= $data[0]['date']; ?></td>
                                </tr>
                                <tr>
                                    <th>Gear box</th>
                                    <td><?= $data[0]['gear_box']; ?></td>
                                </tr>
                                <tr>
                                    <th>Motor</th>
                                    <td><?= $data[0]['motor']; ?></td>
                                </tr>
                                <tr>
                                    <th>Run</th>
                                    <td><?= $data[0]['run']; ?></td>
                                </tr>
                                <tr>
                                    <th>Horsepower</th>
                                    <td><?= $data[0]['horsepower']; ?></td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td><?= $data[0]['color']; ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= $data[0]['description']; ?></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td><?= $data[0]['price']; ?></td>
                                </tr>
                                <tr>
                                    <th>Count</th>
                                    <td><?= $data[0]['count']; ?></td>
                                </tr>
                                <tr>
                                    <th>Create time</th>
                                    <td><?= $data[0]['create_time']; ?></td>
                                </tr>
                                <tr>
                                    <th>Update time</th>
                                    <td><?= $data[0]['update_time']; ?></td>
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
