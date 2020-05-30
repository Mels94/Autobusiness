
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Contact</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                //var_dump($data);
                ?>
                <div class="card">
                    <div class="table-responsive">
                        <table id="paginationFullNumbers" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="border-top-0">id</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Subject</th>
                                <th class="border-top-0">Message</th>
                                <th class="border-top-0">Create time</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="tbody_contact">
                            <?php if (!empty($data) && isset($data)): ?>
                                <?php foreach ($data as $key => $value): ?>
                                    <tr <?php if ($value['isNew'] == 1){ ?> style="background-color: #B8B8B8" <?php } ?>>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td><?= $value['subject']; ?></td>
                                        <td><?= $value['message']; ?></td>
                                        <td><?= $value['create_time']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info open_isNewContact" data-id="<?= $value['id']; ?>" data-toggle="modal" data-target="#myContact<?= $value['id']; ?>">
                                                to answer
                                            </button>
                                            <button class="icon_actions delete_contact delete_btn" title="Delete"
                                                    data-id="<?= $value['id']; ?>"><i class="fas fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="myContact<?= $value['id']; ?>" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">To answer</h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <form action="" method="post">
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" placeholder="text...">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success send_mail"
                                                                        data-dismiss="modal">Send
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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

