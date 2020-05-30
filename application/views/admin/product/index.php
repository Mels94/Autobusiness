
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Product</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                        <a class="btn btn-success btn_table" href="/admin/product/create">Create Product</a>
                        <button class="btn btn-danger remove_allProduct btn_table">Remove All Product</button>
                    </div>
                    <div class="table-responsive">
                        <table id="paginationFullNumbers" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">Id</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Category name</th>
                                <th class="border-top-0">Img path</th>
                                <th class="border-top-0">IsNew</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Gear box</th>
                                <th class="border-top-0">Motor</th>
                                <th class="border-top-0">Run</th>
                                <th class="border-top-0">Horsepower</th>
                                <th class="border-top-0">Color</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Count</th>
                                <th class="border-top-0">Create time</th>
                                <th class="border-top-0">Update time</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($data) && isset($data)): ?>
                                <?php foreach ($data as $key => $value): ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><?= $value['cat_name']; ?></td>
                                        <td><?= $value['img_path']; ?></td>
                                        <td><?= $value['isNew']; ?></td>
                                        <td><?= $value['date']; ?></td>
                                        <td><?= $value['gear_box']; ?></td>
                                        <td><?= $value['motor']; ?></td>
                                        <td><?= $value['run']; ?></td>
                                        <td><?= $value['horsepower']; ?></td>
                                        <td><?= $value['color']; ?></td>
                                        <td><?= $value['description']; ?></td>
                                        <td><?= $value['price']; ?></td>
                                        <td><?= $value['count']; ?></td>
                                        <td><?= $value['create_time']; ?></td>
                                        <td><?= $value['update_time']; ?></td>
                                        <td>
                                            <a href="/admin/product/view/<?= $value['id']; ?>" title="View"
                                               class="icon_actions view"><i class="fas fa-eye"></i></a>
                                            <a href="/admin/product/update/<?= $value['id']; ?>" title="Update"
                                               class="icon_actions update"><i class="fas fa-edit"></i></a>
                                            <button class="icon_actions delete_product delete_btn" title="Delete"
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


