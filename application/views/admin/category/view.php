<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">View Category</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="/admin/category/index">Category</a>
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
                        <a class="btn btn-primary" href="/admin/category/update/<?= $data[0]['id']; ?>">Update</a>
                        <button class="btn btn-danger delete" data-id="<?= $data[0]['id']; ?>">Delete</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <?php if (!empty($data) && isset($data)): ?>
                                <?php foreach ($data[0] as $key => $value): ?>
                                    <tr>
                                        <th><?= $key; ?></th>
                                        <td><?= $value; ?></td>
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