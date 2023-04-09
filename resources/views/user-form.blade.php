@include('layouts.master')
<link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
</head>
<body>


    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Insert Data</h3>
                        <div class="list-button pull-right">
                            <a href="{{ url('user-list') }}" class="btn btn-success">List</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="signupForm" action="javascript:void(0)"  method="post" class="form-horizontal" enctype="multipart/form-data" >
                            <div class="form-group mb-2">
                                <label for="email">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter email" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group mb-2">
                                <label for="pwd">Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="pwd" name="pwd"placeholder="Enter password">
                            </div>
                            <div class="form-group mb-2">
                                <label for="img">Image<span class="text-danger">*</span></label><br>
                                <input type="file"  name="image" >
                            </div>
                            <div class="form-group mb-2">
                                <label for="language">Languages<span class="text-danger">*</span></label><br>
                                <div class="controls form-check">
                                    <fieldset>
                                        <label class="custom-control custom-checkbox">
                                            <input class="form-check-input" type="checkbox"  name="language" value="Hindi"> Hindi
                                        </label>
                                    </fieldset>
                                    <fieldset>
                                        <label class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="language" value="English"> English
                                        </label>
                                    </fieldset>
                                    <fieldset>
                                        <label class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="language" value="French"> French
                                        </label>
                                    </fieldset>
                                </div>
                                <span class="error ui red pointing label transition" id="errorCheck"></span>
                                
                            </div>
                            <div class="form-group form-check mb-2">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    @include('layouts.footer')
    <script src="{{ asset('frontend/js/app.js') }}"></script>

</body>
</html>




</body>
</html>


