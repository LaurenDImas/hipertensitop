
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/app.css">
</head>

<style type="text/css">
    #auth {
        background: #6c757d;
        min-height: 100vh;
        padding-top: 100px;\
    }
</style>
<body>
    <div id="auth">
        
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                           <img src="/assets/frontend/img/logo_2.png" uk-img style="height: 100px; "
                                       alt="">       
                                <h3>Login</h3>
                                <p>Harap masukkan username dan password.</p>
                            </div>

                            <?=$this->fetch('content');?>
                           
                            <!-- <div class="divider">
                                <div class="divider-text">OR</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i> Github</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="/assets/js/feather-icons/feather.min.js"></script>
    <script src="/assets/js/app.js"></script>
    
    <script src="/assets/js/main.js"></script>
</body>

</html>
