$("#signupForm1").validate({
    rules: {
        firstname1: "required",
        lastname1: "required",
        user_name: {
            required: true,
            minlength: 2
        },
        user_password: {
            required: true,
            minlength: 5
        },
        confirm_password1: {
            required: true,
            minlength: 5,
            equalTo: "#user_password"
        },
        user_email: "required",
        agree1: "required"
    },
    messages: {
        firstname1: "Please enter your firstname",
        lastname1: "Please enter your lastname",
        user_name: {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 2 characters"
        },
        user_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        confirm_password1: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        user_email: "Please enter a valid email address",
        agree1: "Please accept our policy"
    },
    errorElement: "em",
    errorPlacement: function(error, element) {
        // Add the `help-block` class to the error element
        error.addClass("help-block");

        // Add `has-feedback` class to the parent div.form-group
        // in order to add icons to inputs
        element.parents(".col-sm-5").addClass("has-feedback");

        if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
        } else {
            error.insertAfter(element);
        }

        // Add the span element, if doesn't exists, and apply the icon classes to it.
        if (!element.next("span")[0]) {
            $("<span class='fa fa-times form-control-feedback pr-2'></span>").insertAfter(element);
        }
    },
   
    highlight: function(element, errorClass, validClass) {
        $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        $(element).next("span").addClass("fa fa-times").removeClass("fa fa-check");
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        ($(element)).next("span").addClass("fa fa-check").removeClass("fa fa-times");
    },
    submitHandler:function(form,e){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        console.log("hello submitted");
        data=$("form").serialize();
        console.log(data);
        var form = $("#signupForm1");
        
        $.ajax({
            type: "POST",
            url: "store-data",
            data: form.serialize(),
            dataType:"json",
            success: function(data) {
                console.log(data.success);

                if(data.success==true){
                    swal({
                        type: 'success',
                        title: 'Submitted',
                        text: 'Submitted Successfully!',
                        timer: 3000,
                        
                    })

                }else{
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Information Not Saved!!!</a>',
                        timer: 5000,
                    })

                }
            }
        });
        
    },


});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table = $('#datatable').DataTable({
  processing: true,
  serverSide: true,
  
  responsive:true,
  
  ajax: "data-list",
  columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'user_name', name: 'name'},
      {data: 'user_email', name: 'email'},
      {data: 'action', name: 'action', orderable: false, searchable: false},
  ]
});
$('body').on('click', '.editPost', function () {
var id = $(this).data('id');
$.ajax({
    type:"POST",
    url: "edit-list",
    data: { id: id },
    dataType: 'json',
    success: function(res){
        $('#modelHeading').html("Edit Post");
        $('#savedata').val("edit-user");
        $('#ajaxModelexa').modal('show');
        $('#id').val(res.id);

        $('#user_name').val(res.user_name);
        $('#user_email').val(res.user_email);
   }
});
});




$('#savedata').click(function (e) {
  e.preventDefault();
  $(this).html('Sending..');

  $.ajax({
    data: $('#edit-form-data').serialize(),
    url: "store-data",
    type: "POST",
    dataType: 'json',
    success: function (data) {

        $('#edit-form-data').trigger("reset");
        $('#ajaxModelexa').modal('hide');
        table.draw();
   
    },
    error: function (data) {
        console.log('Error:', data);
        $('#savedata').html('Save Changes');
    }
});
});

$('body').on('click', '.deletePost', function () {

  var id = $(this).data("id");
  confirm("Are You sure want to delete this Post!");

  $.ajax({
      type: "post",
      url: "delete-data",
      data:{ id: id },
      success: function (data) {
          table.draw();
      },
      error: function (data) {
          console.log('Error:', data);
      }
  });
});

