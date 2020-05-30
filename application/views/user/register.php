<!-- Register Page Content -->




<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
                    <div class="row">
                        <div class="heading-content col-md-12">
                            <p><a href="/">Homepage</a> / <em> Registration</em></p>
                            <h2>Registration</h2>
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
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="text-content">
                    <h2>Registration</h2>
                </div>
            </div>
            <form action="/user/register" method="post" class="form_style">
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" aria-describedby="nameHelp">
                    <i class="fas fa-user"></i>
                    <small id="nameHelp" class="form-text text-muted"><?php if (!empty($data) && isset($data['first_name'])){ echo $data['first_name'];} ?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" aria-describedby="surnameHelp">
                    <i class="fas fa-user"></i>
                    <small id="surnameHelp" class="form-text text-muted"><?php if (!empty($data) && isset($data['last_name'])){ echo $data['last_name'];} ?></small>
                </div>
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
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password" aria-describedby="conf_passwordHelp">
                    <i class="fas fa-lock"></i>
                    <small id="conf_passwordHelp" class="form-text text-muted"><?php if (!empty($data) && isset($data['confirm_password'])){ echo $data['confirm_password'];} ?></small>
                </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Send">
            </form>
        </div>
    </div>
</section>
