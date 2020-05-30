<!-- Login Page Content -->


<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
                    <div class="row">
                        <div class="heading-content col-md-12">
                            <p><a href="/">Homepage</a> / <em> Login</em></p>
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="section_form">
    <div class="wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
        <div class="container">
            <div class="section-heading">
                <div class="icon">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                </div>
                <div class="text-content">
                    <h2>Login</h2>
                </div>
            </div>
            <form action="/user/login" method="post" class="form_style">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-describedby="emailHelp">
                    <i class="fas fa-envelope"></i>
                    <small id="emailHelp" class="form-text text-muted"><?php if (!empty($data) && isset($data['email'])){ echo $data['email'];} ?></small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="passwordHelp">
                    <i class="fas fa-lock"></i>
                    <small id="passwordHelp" class="form-text text-muted"><?php if (!empty($data) && isset($data['password'])){ echo $data['password'];} ?></small>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="rememberMe" id="rememberMe">
                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                </div>
                <input type="submit" name="submit" class="btn btn-primary mt-3" value="Login">
            </form>
        </div>
    </div>
</section>






