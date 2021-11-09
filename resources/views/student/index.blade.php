@extends('layouts.app')

@section('content')

{{-- add modal --}}
<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddStudentModalLabel">Add Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="saveform_msg_list"></ul>

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" required class="name form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" required class="course form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" required class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" required class="phone form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success store_student">Store</button>
            </div>

        </div>
    </div>
</div>
{{-- end add modal --}}

{{-- start delete modal --}}
<div class="modal fade" id="DeleteStudentModal" tabindex="-1" aria-labelledby="DeleteStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteStudentModalLabel">Delete Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="" id="delete_student_id"> 
                <h4>Are Yor Sure? You Want To Delete this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger delete_student_confirm">Yes, Delete</button>
            </div>

        </div>
    </div>
</div>
{{-- end delete modal --}}




{{-- index preview --}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            {{-- <div id="success_message"></div> --}}
            <div id="success_msg"></div>    

            <div class="card">
                <div class="card-header">
                    <h4>
                        Student Data
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                            data-bs-target="#AddStudentModal">Add Student</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           {{-- getting value from script fetchStudent function --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end - index preview --}}
@endsection



@section('scripts')
    <script>

        
       
        $(document).ready(function () {
             // script to  fetch all student data
            fetchStudent()          // calling the function defined below

            function fetchStudent() {

                $.ajax({
                    type: "GET",
                    url: "student/fetch_student",
                    // data: "data",    // fetching data from db, no data being sent
                    dataType: "json",
                    success: function (response) {
                        // console.log(response.students);
                        $('tbody').html('');    // empties the table time function is called - avoids reapeatation
                        $.each(response.students, function (key, student) { 
                            $('tbody').append('<tr>\
                                                    <td>'+student.id+'</td>\
                                                    <td>'+student.name+'</td>\
                                                    <td>'+student.email+'</td>\
                                                    <td>'+student.phone+'</td>\
                                                    <td>'+student.course+'</td>\
                                                    <td><button type="button" value="' + student.id + '" class="btn btn-primary edit_student btn-sm">Edit</button></td>\
                                                    <td><button type="button" value="' + student.id + '" class="btn btn-danger delete_student btn-sm">Delete</button></td>\
                                                </tr>'); // important to do - tr are inside the quote and each lineends with backslash
                        });
                    }
                });
            };
            // start script for delete student
            $(document).on('click', '.delete_student', function(e) {
                e.preventDefault();
                // alert('del');
                var student_id = $(this).val(); 
                // $('#delete_student_id').val(student_id);
                // // console.log(student_id);
                // $('#DeleteStudentModal').modal('show');

                swal.fire({
                    title: "Delete?",
                    icon: 'question',
                    text: "Please ensure and then confirm!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function (e) {

                    if (e.value === true) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            type: 'DELETE',
                            url: "student/"+student_id,
                            data: {_token: CSRF_TOKEN},
                            dataType: 'JSON',
                            success: function (results) {
                                if (results.success === true) {
                                    swal.fire("Done!", results.message, "success"); // text: done! icon: sucess 
                                    // refresh page after 2 seconds
                                    setTimeout(function(){
                                        location.reload();
                                    },1500);
                                } else {
                                    swal.fire("Error!", results.message, "error");
                                }
                            }
                        });

                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                        return false;
                })
            });
            // delete confirmation
            // $(document).on('click', '.delete_student_confirm', function (e) {
            //     e.preventDefault();
            //     $(this).text('Deleting');
            //     var student_id = $('#delete_student_id').val();
            //     // alert(student_id);
            //     swal.fire({
            //         title: "Delete?",
            //         icon: 'question',
            //         text: "Please ensure and then confirm!",
            //         type: "warning",
            //         showCancelButton: !0,
            //         confirmButtonText: "Yes, delete it!",
            //         cancelButtonText: "No, cancel!",
            //         reverseButtons: !0
            //     }).then(function (e) {

            //         if (e.value === true) {
            //             var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            //             $.ajax({
            //                 type: 'DELETE',
            //                 url: "student/"+student_id,
            //                 data: {_token: CSRF_TOKEN},
            //                 dataType: 'JSON',
            //                 success: function (results) {
            //                     if (results.success === true) {
            //                         swal.fire("Done!", results.message, "success");
            //                         // refresh page after 2 seconds
            //                         setTimeout(function(){
            //                             location.reload();
            //                         },2000);
            //                     } else {
            //                         swal.fire("Error!", results.message, "error");
            //                     }
            //                 }
            //             });

            //         } else {
            //             e.dismiss;
            //         }

            //     }, function (dismiss) {
            //             return false;
            //     })
            //     // $.ajaxSetup({
            //     //     headers: {
            //     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     //     }
            //     // });
            //     // $.ajax({
            //     //     type: "DELETE",
            //     //     url: "student/"+student_id,
            //     //     // data: "data",
            //     //     // dataType: "dataType",
            //     //     success: function (response) {
            //     //         // console.log(response.success);
            //     //             $('#success_msg').text('');
            //     //             $('#success_msg').addClass('alert alert-success');
            //     //             $('#success_msg').text(response.message);
            //     //             $('#DeleteStudentModal').modal('hide');
            //     //             $('.delete_student_confirm').text('Yes, Delete');
            //     //             fetchStudent()   
            //     //     }
            //     // });
            // });
            // end script for delete student
            // start script for edit student
             $(document).on('click', '.edit_student', function (e) {
                //  alert('clicked');
                e.preventDefault();
                var student_id = $(this).val();
                // console.log(student_id);
                $('#EditStudentModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "student/"+student_id+"/edit",
                    // data: "data",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if(response.status == 404) {
                            $('#success_msg').text('');
                            $('#success_msg').addClass('alert alert-danger');
                            $('#success_msg').text(response.messages);

                        }else {
                            $('#updateform_msg_list').html('');
                            $('#updateform_msg_list').removeClass('alert alert-danger');

                            $('#edit_name').val(response.messages.name);
                            $('#edit_email').val(response.messages.email);
                            $('#edit_phone').val(response.messages.phone);
                            $('#edit_course').val(response.messages.course);
                            $('#edit_student_id').val(student_id);
                        }
                    }
                });
                 
             });
            // end script for edit student
            // start script for update student
            $(document).on('click', '.update_student', function (e) {
                e.preventDefault();        // page will not load
                $(this).text('Updating');
                var student_id = $('#edit_student_id').val();   
                    // console.log(student_id);
                var data = {
                    'name' : $('#edit_name').val(),
                    'email' : $('#edit_email').val(),
                    'phone' : $('#edit_phone').val(),
                    'course' : $('#edit_course').val(),
                };
                    // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "student/"+student_id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response.status);
                        if(response.status == 400) {
                            $('#updateform_msg_list').html('');    // empty all messages 
                            $('#updateform_msg_list').addClass('alert alert-danger');
                            $.each(response.messages, function (key, error_value) {      // foreach loop for jquery 
                                 $('#updateform_msg_list').append('<li>'+error_value+'</li>');
                            });
                            $('.update_student').text('Update');
                        }else if(response.status == 404) {
                            $('#updateform_msg_list').html('');
                            $('#success_msg').text('');
                            $('#success_msg').addClass('alert alert-danger');
                            $('#success_msg').text(response.messages);
                            $('.update_student').text('Update');
                        }else{
                            $('#updateform_msg_list').html('');
                            $('#success_msg').text('');
                            $('#success_msg').addClass('alert alert-success');
                            $('#success_msg').text(response.messages);
                            $('#EditStudentModal').modal('hide');
                            $('.update_student').text('Update');
                            fetchStudent()          
                        }
                    }
                });

            });
            // end script for update student
            // start script for add student
            $(document).on('click', '.store_student', function (e) {
                $(this).text('Storing');
                e.preventDefault();  // prevents page form reloading
                // console.log('store_student button works');      // check if add button works 

                var data = {
                    'name' : $('.name').val(),
                    'course' : $('.course').val(),
                    'email' : $('.email').val(),
                    'phone' : $('.phone').val(),
                }  

                // console.log(data_json);              // check if variables gets the input values
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "student",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response)   // significant check - status and message from the controller functions
                        if(response.status == 400) {
                            $('#saveform_msg_list').html('');    // empty all messages 
                            $('#saveform_msg_list').addClass('alert alert-danger');
                            $.each(response.messages, function (key, error_value) {      // foreach loop for jquery 
                                 $('#saveform_msg_list').append('<li>'+error_value+'</li>');
                            });
                            $('.store_student').text('Store');
                        }else {
                            $('#saveform_msg_list').html('');
                            $('#success_msg').addClass('alert alert-success');
                            $('#success_msg').text(response.messages);
                            $('#AddStudentModal').modal('hide');            // modal will close
                            $('#AddStudentModal').find('input').val('');    // all previous input value will be gone
                            $('.store_student').text('Store');
                            fetchStudent()          

                        }
                    }
                });

            });
        // end script for add student



        });
            


    </script>
@endsection

