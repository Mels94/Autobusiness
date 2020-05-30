<?php
$arrGearbox = ['Avtomat', 'Mexanikakan', 'Kisaavtomat', 'Variator'];
$arrMotor = ['Gaz', 'Benzin', 'Diezel', 'Hibrid', 'Elektrakan'];
?>

<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Create Product</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    <form class="text-center border border-light p-5" action="/admin/product/create" method="post" enctype="multipart/form-data">
                        <h2 class="mb-4">Add new product</h2>
                        <input type="text" name="name" class="form-control" placeholder="Name product">
                        <small><?php if (!empty($data) && isset($data[0]['name'])) {
                                echo $data[0]['name'];
                            } ?></small>
                        <select class="custom-select mt-4" name="categoryOption">
                            <option>All category</option>
                            <?php if (!empty($data) && isset($data[1])): ?>
                            <?php foreach ($data[1] as $value): ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <small><?php if (!empty($data) && isset($data[0]['category option'])) {
                                echo $data[0]['category option'];
                            } ?></small>
                        <input type="file" name="images" class="form-control-file mt-4 file">
                        <small><?php if (!empty($data) && isset($data[0]['images'])) {
                                echo $data[0]['images'];
                            } ?></small><br>
                        <div class="custom-control custom-radio custom-control-inline mt-4">
                            <input type="radio" id="new" name="radio" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="new">New</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline mt-4">
                            <input type="radio" id="old" name="radio" class="custom-control-input" value="0">
                            <label class="custom-control-label" for="old">Old</label>
                        </div>
                        <br>
                        <small><?php if (!empty($data) && isset($data[0]['radio'])) {
                                echo $data[0]['radio'];
                            } ?></small>
                        <div class="form-row">
                            <div class="form-group col-md-6 mt-4">
                                <select class="custom-select" name="dateOption">
                                    <option>Date</option>
                                    <?php for ($i = 1990; $i <= 2020; $i++): ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                <small><?php if (!empty($data) && isset($data[0]['date'])) {
                                        echo $data[0]['date'];
                                    } ?></small>
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <select class="custom-select" name="gearBoxOption">
                                    <option>Gear box</option>
                                    <?php foreach ($arrGearbox as $value): ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small><?php if (!empty($data) && isset($data[0]['gear box'])) {
                                        echo $data[0]['gear box'];
                                    } ?></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mt-4">
                                <select class="custom-select" name="motorOption">
                                    <option>Motor</option>
                                    <?php foreach ($arrMotor as $value): ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small><?php if (!empty($data) && isset($data[0]['motor'])) {
                                        echo $data[0]['motor'];
                                    } ?></small>
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <input type="number" name="run" class="form-control" placeholder="Run">
                                <small><?php if (!empty($data) && isset($data[0]['run'])) {
                                        echo $data[0]['run'];
                                    } ?></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mt-4">
                                <input type="number" name="horsepower" class="form-control" placeholder="Horsepower">
                                <small><?php if (!empty($data) && isset($data[0]['horsepower'])) {
                                        echo $data[0]['horsepower'];
                                    } ?></small>
                            </div>
                            <div class="form-group col-md-6 mt-4">
                                <input type="text" name="color" class="form-control" placeholder="Color">
                                <small><?php if (!empty($data) && isset($data[0]['color'])) {
                                        echo $data[0]['color'];
                                    } ?></small>
                            </div>
                        </div>
                        <textarea class="form-control mt-4" id="textarea" name="desc" rows="2"
                                  placeholder="Description..."></textarea>
                        <small><?php if (!empty($data) && isset($data[0]['description'])) {
                                echo $data[0]['description'];
                            } ?></small>
                        <input type="number" name="price" class="form-control mt-4" placeholder="Price">
                        <small><?php if (!empty($data) && isset($data[0]['price'])) {
                                echo $data[0]['price'];
                            } ?></small>
                        <input type="number" name="count" class="form-control mt-4" placeholder="Count">
                        <small><?php if (!empty($data) && isset($data[0]['count'])) {
                                echo $data[0]['count'];
                            } ?></small>
                        <input class="btn btn-info my-4 btn-block create_button" type="submit" name="submit"
                               value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>