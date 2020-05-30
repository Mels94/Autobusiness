<div class="page-heading wow fadeIn mb-1" data-wow-duration="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
                    <div class="row">
                        <div class="heading-content col-md-12">
                            <p><a href="/">Homepage</a> / <em> My Profile</em></p>
                            <h2>My <em>Profile</em></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="page-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="bg-dark text-white h4 text-center">Profile</div>
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-30" style="text-align: center"> <img src="../../../assets/admin/assets/images/users/default-img.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10"><?= $data[1][0]['first_name'].' '.$data[1][0]['last_name']; ?></h4>
                        </div>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6><?= $data[1][0]['email']; ?></h6>
                    </div>
                </div>

                <button type="button" class="btn btn-danger mt-5" data-toggle="modal" data-target="#deleteProfileModal">
                    Delete profile
                </button>

                <div class="modal fade" id="deleteProfileModal" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete your profile</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    &times;
                                </button>
                            </div>
                            <form action="/user/delete" method="post">
                                <div class="modal-body">
                                    <input type="password" class="form-control" placeholder="Enter your password">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger delete_account"
                                            data-dismiss="modal">Delete
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="bg-dark text-white h4 text-center">Settings</div>
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="/user/profile" method="post">
                            <div class="form-group">
                                <label class="col-md-12">Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control form-control-line" value="<?= $data[1][0]['first_name']; ?>">
                                    <small><?php if (!empty($data) && isset($data[0]['name'])){ echo $data[0]['name'];} ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Surname</label>
                                <div class="col-md-12">
                                    <input type="text" name="surname" class="form-control form-control-line" value="<?= $data[1][0]['last_name']; ?>">
                                    <small><?php if (!empty($data) && isset($data[0]['surname'])){ echo $data[0]['surname'];} ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control form-control-line" name="email" value="<?= $data[1][0]['email']; ?>">
                                    <small><?php if (!empty($data) && isset($data[0]['email'])){ echo $data[0]['email'];} ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" class="form-control form-control-line">
                                    <small><?php if (!empty($data) && isset($data[0]['password'])){ echo $data[0]['password'];} ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">New password</label>
                                <div class="col-md-12">
                                    <input type="password" name="new_password" class="form-control form-control-line">
                                    <small><?php if (!empty($data) && isset($data[0]['new_password'])){ echo $data[0]['new_password'];} ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Confirm new password</label>
                                <div class="col-md-12">
                                    <input type="password" name="confirm_new_password" class="form-control form-control-line">
                                    <small><?php if (!empty($data) && isset($data[0]['confirm_new_password'])){ echo $data[0]['confirm_new_password'];} ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" name="submit" class="btn btn-success" value="Update Profile">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

