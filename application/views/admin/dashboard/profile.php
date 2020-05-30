

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-30" style="text-align: center"> <img src="../../../../assets/admin/assets/images/users/default-img.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10"><?= $data[1][0]['first_name'].' '.$data[1][0]['last_name']; ?></h4>
                            <h6 class="card-subtitle">Accounts Manager Amix corp</h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6><?= $data[1][0]['email']; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                        <h6>+374 77 24 77 87</h6> <small class="text-muted p-t-30 db">Address</small>
                        <h6>Armenia, Gyumri, Paronyan 34</h6>
                        <div class="map-box">
                            <iframe src="https://maps.google.com/maps?width=100%&amp;height=440&amp;hl=en&amp;q=Gyumri+(Armenia)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed"
                                    width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted p-t-30 db">Social Profile</small>
                        <br/>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-facebook"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-youtube-play"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" action="/admin/dashboard/profile" method="post">
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