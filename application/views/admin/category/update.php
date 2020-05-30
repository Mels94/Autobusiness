

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Update Category</h4>
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
                        <h2 class="mb-4">Update category</h2>
                        <input type="text" name="name" class="form-control" placeholder="Name category"
                               value="<?php if (!empty($data) && isset($data[0]['name'])){ echo $data[0]['name'];} ?>">
                        <small><?php if (!empty($data) && isset($data['name'])){ echo $data['name'];} ?></small>

                        <!-- Sign up button -->
                        <input class="btn btn-info my-4 btn-block" type="submit" name="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>