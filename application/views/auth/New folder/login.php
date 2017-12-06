<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Warrantybazzaar</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/vendors/animate.css/animate.min.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/build/css/custom.min.css')?>" rel="stylesheet">
    <style type="text/css">
      .error{
        color:red;
      }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="forget_password"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php echo form_open("auth/login", 'class="login" data-toggle="validator"');  ?>
              <h1>Login Form</h1>
              <div><?php echo validation_errors();?></div>
              <div>
                <?php echo form_input(['name'=>'username', 'placeholder'=>'Username','required'=>"required", 'class'=>'form-control', 'value'=>set_value('username')]);?>
                 <?php echo form_error('userName'); ?> 
              </div>
              <div>
                <?php echo form_password(['name'=>'password', 'placeholder'=>'Password', 'class'=>'form-control', 'required'=>'required', 'value'=>set_value('password')]);?>
              </div>
              <div>
                <?php echo form_submit(['name'=>'submit', 'value'=>'Log in', 'class'=>'btn btn-default submit']);?>
                <a class="reset_pass" href="#forget_password">Forget password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Warrantybazaar</h1>
                  <p>&copy; <?= date('Y');?> All Rights Reserved. </p>
                </div>
              </div>
            <?php echo form_close(); ?>
          </section>
        </div>
      

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <?php echo form_open(); ?>
              <h1>Create Account</h1>
              <div>
                <?php echo form_input(['name'=>'username', 'placeholder'=>'Username','required'=>"required", 'class'=>'form-control', 'data-validate-length-range'=>'6', 'data-validate-words'=>'2']);?>
              </div>
              <div>
                <?php echo form_input(['name'=>'email','placeholder'=>'email', 'class'=>'form-control', 'required'=>'required']);?>
              </div>
              <div>
                <?php echo form_password(['name'=>'password', 'placeholder'=>'Password', 'class'=>'form-control', 'required'=>'required']);?>
                <?php echo form_error('password'); ?>
              </div>
              <div>
                <?php echo form_input(['name'=>'mobile', 'placeholder'=>'Mobile Number', 'class'=>'form-control', 'required'=>'required']);?>
              </div>
              <div>
                <?php echo form_submit(['name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-default submit']);?>
                <!--<a class="btn btn-default submit" href="index.html">Submit</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Warrantybazaar</h1>
                  <p>&copy; <?= date('Y');?> All Rights Reserved. </p>
                </div>
              </div>
            <?php echo form_close(); ?>
          </section>
        </div>
        <!-- NProgress -->
        <script src="<?= base_url('assets/vendors/nprogress/nprogress.js')?>"></script>
        <!-- validator -->
        <script src="<?= base_url('assets/vendors/validator/validator.js')?>"></script>

      </div>
    </div>
  </body>
</html>
