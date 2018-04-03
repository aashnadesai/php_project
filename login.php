<?php require_once("includes/header.php"); require_once("config.php"); ?>

<?php 
    if (isset($_POST['login']) && $_POST['login'] == 1)
    {
        $result = fetchThisUser($_POST['email'], $_POST['password']);

        if (!empty($result))
        {
            $_SESSION['user_id'] = $result[0]['user_id'];
            $_SESSION['user_name'] = $result[0]['user_username'];
            $_SESSION['user_phone'] = $result[0]['user_phone'];
            $_SESSION['user_email'] = $result[0]['user_email'];
            $_SESSION['user_password'] = $result[0]['user_password'];
            $_SESSION['user_status'] = $result[0]['user_status'];
            $_SESSION['user_date'] = $result[0]['user_date'];

            echo '<script>window.location = "http://localhost/ecomm/index.php";</script>';
        }
    }
    else if (isset($_POST['register']) && $_POST['register'] == 1)
    {
        $result1 = createNewUser($_POST);

        if($result1)
        {
            echo 'User Registered successfully!';

            $result = fetchThisUser($_POST['email'], $_POST['password']);

            if (!empty($result))
            {
                $_SESSION['user_id'] = $result[0]['user_id'];
                $_SESSION['user_name'] = $result[0]['user_username'];
                $_SESSION['user_phone'] = $result[0]['user_phone'];
                $_SESSION['user_email'] = $result[0]['user_email'];
                $_SESSION['user_password'] = $result[0]['user_password'];
                $_SESSION['user_status'] = $result[0]['user_status'];
                $_SESSION['user_date'] = $result[0]['user_date'];

                echo '<script>window.location = "http://localhost/ecomm/index.php";</script>';
            }
        }
    }
?>

        <section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Login / Register</li>
                        </ol>
                    </div><!-- end bread -->
                    <h1>Login / Register</h1>
                </div>
            </div>
        </section>

        <section class="section aboutsection">
            <div class="container">
                <div class="row promo-item">
                    <div class="col-md-6 col-sm-12">
                        <div class="shop-item-title clearfix">
                            <h4>Login Form</h4>

                            <div class="shop-desc-style">
                                <div class="contact_form">
                                    <div id="message"></div>
                                    <form id="contactform" class="row" action="" name="contactform" method="post">
                                        <div class="col-lg-12">

                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email"> 

                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">

                                            <input type="hidden" name="login" id="login" value="1" />

                                            <button type="submit" value="SEND" id="submit" class="btn custombutton button--isi btn-primary"> Login</button>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div><!-- end shop-item-title -->
                    </div><!-- end col -->

                    <div class="col-md-6 col-sm-12">
                        <div class="shop-item-title clearfix">
                            <h4>Register Form</h4>

                            <div class="shop-desc-style">
                                <div class="contact_form">
                                    <div id="message"></div>
                                    <form id="contactform" class="row" action="" name="contactform" method="post">
                                        <div class="col-lg-12">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"> 

                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email"> 

                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"> 

                                            <input type="text" name="password" id="password" class="form-control" placeholder="Password">

                                            <input type="hidden" name="register" id="register" value="1" /> 

                                            <button type="submit" value="Register" id="submit" class="btn custombutton button--isi btn-primary"> Register</button>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div><!-- end shop-item-title -->
                    </div>
                    </div><!-- end col -->
                </div><!-- end row promoitem -->
            </div><!-- end container -->
        </section><!-- end section -->
         
<?php require_once("includes/footer.php");?>
</body>

</html>