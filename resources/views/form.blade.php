<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/vendors.css"/>

</head>
<body>
    <div class="app-main" id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Form Submit</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="signupForm1" action="javascript:void(0)" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label" for="username1">Username</label>
                                    <div class="mb-2">
                                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email1">Email</label>
                                    <div class="mb-2">
                                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password1">Password</label>
                                    <div class="mb-2">
                                        <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="confirm_password1">Confirm password</label>
                                    <div class="mb-2">
                                        <input type="password" class="form-control" id="confirm_password1" name="confirm_password1" placeholder="Confirm password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agree1" name="agree1">
                                        <label class="form-check-label" for="agree1">
                                            Please agree to our policy
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Sign
                                    up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/vendors.js"></script>
    <script src="js/app.js"></script>
</body>
</html>