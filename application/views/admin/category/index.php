<?php
use application\components\Pagination;
?>

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Category</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                        <a class="btn btn-success btn_table" href="/admin/category/create">Create Category</a>
                        <button class="btn btn-danger remove_allCategory btn_table">Remove All Categories</button>
                    </div>
                    <div class="table-responsive">
                        <table id="paginationFullNumbers" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">id</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Create time</th>
                                <th class="border-top-0">Update time</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($data) && isset($data)): ?>
                                <?php foreach ($data as $key => $value): ?>
                                    <tr class="remove">
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><?= $value['create_time']; ?></td>
                                        <td><?= $value['update_time']; ?></td>
                                        <td>
                                            <a href="/admin/category/view/<?= $value['id']; ?>" class="icon_actions view" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="/admin/category/update/<?= $value['id']; ?>" class="icon_actions update" title="Update"><i class="fas fa-edit"></i></a>
                                            <button class="icon_actions delete delete_btn" data-id="<?= $value['id']; ?>" title="Delete"><i class="fas fa-trash"></i></button>
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

