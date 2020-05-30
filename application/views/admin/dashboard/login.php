<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->getTitle(); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../../../assets/admin/admin_form/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../../../assets/admin/admin_form/css/main.css">
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(../../../../assets/admin/admin_form/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
            </div>
            <form class="login100-form validate-form" action="/admin/dashboard/login" method="post">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" placeholder="Enter email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="rememberMe">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                </div>
                <div class="container-login100-form-btn">
                    <input class="login100-form-btn" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>


<script src="../../../../assets/admin/admin_form/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../../../../assets/admin/admin_form/vendor/animsition/js/animsition.min.js"></script>
<script src="../../../../assets/admin/admin_form/vendor/bootstrap/js/popper.js"></script>
<script src="../../../../assets/admin/admin_form/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../assets/admin/admin_form/vendor/select2/select2.min.js"></script>
<script src="../../../../assets/admin/admin_form/vendor/daterangepicker/moment.min.js"></script>
<script src="../../../../assets/admin/admin_form/vendor/daterangepicker/daterangepicker.js"></script>
<script src="../../../../assets/admin/admin_form/vendor/countdowntime/countdowntime.js"></script>
<script src="../../../../assets/admin/admin_form/js/main.js"></script>

</body>
</html>