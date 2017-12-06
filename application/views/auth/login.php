<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Warrantybazaar | User Login </title>

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="resetPassword"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <?php if(!empty($message)){ ?>
          <div class="alert alert-danger">
              <button data-dismiss="alert" class="close" type="button">×</button>
               <p><?php echo $message;?></p>                            
           </div>

           <?php } ?>
          <section class="login_content">
            <?php echo form_open("auth/login", 'class="login" id="login" data-toggle="validator" ');  ?>
              <h1>Login Form</h1>
              <p><?php echo lang('login_subheading');?></p>
              <div id="infoMessage" class="danger"><?php echo validation_errors(); ?></div>
              <div>
                <?php echo form_error('identity'); ?> 
                <?php echo form_input(['name'=>'identity', 'placeholder'=>'Username','required'=>"required", 'class'=>'form-control', 'value'=>set_value('identity'), 'novalidate'=>'', 'data-validate-length-range'=>'6', 'data-validate-words'=>'2']);?>
                
              </div>
              <div>
                <?php echo form_error('password'); ?> 
                <?php echo form_password(['name'=>'password', 'placeholder'=>'Password', 'class'=>'form-control', 'data-parsley-required'=>'true', 'value'=>set_value('password')]);?>
              </div>
              <div>
                <?php echo form_submit(['name'=>'submit', 'value'=>'Log in', 'class'=>'btn btn-default submit']);?>
                <!--<a class="reset_pass" href="#"></a>-->
                <a href="#resetPassword" class="to_register"> Lost your password? </a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Warrantybazaar</h1>
                  <p>&copy; <?php echo date('Y');?> All Rights Reserved. Warrantybazaar</p>
                </div>
              </div>
            </form>
          </section>
        </div>
          
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <?php echo form_open("auth/forgot_password", 'class="registration" id="login" data-toggle="validator" ');  ?>
              <h1>Reset Password</h1>
              <p>Please enter your Email so we can send you an email to reset your password.</p>
              <?php if(!empty($message)) : ?>
              <div id="infoMessage"><?php echo $message;?></div>
              <?php endif; ?>
              <div>
                  
                <?php echo form_input(['name'=>'identity','id'=>'identity', 'placeholder'=>'Email','required'=>"required", 'class'=>'form-control', 'data-validate-length-range'=>'6', 'data-validate-words'=>'2']);?>
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
                  <p>&copy; <?php echo date('Y');?> All Rights Reserved. Warrantybazaar</p>
                </div>
              </div>
            <?php echo form_close(); ?>
          </section>
        </div>
      </div>
    </div>


    <!-- jQuery -->
    <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- parsley validator -->
    <!--<script src="<?=base_url('assets/vendors/parsleyjs/dist/parsley.min.js')?>"></script>-->
    <!-- validator -->
    <script src="<?= base_url('vendors/validator/validator.js')?>"></script>
  </body>
</html>
