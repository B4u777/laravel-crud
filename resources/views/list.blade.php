<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>list</title>
    <link rel="stylesheet" type="text/css" href="css/vendors.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    
    
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       
   
    <div class="modal fade" id="ajaxModelexa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit-form-data" name="postForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Name" value="" required>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter Email" value="" required>
                            </div>
                        </div>
        
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="savedata" value="create">Save Post
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="js/vendors.js"></script>

    <script src="js/app.js"></script>
</body>
</html>