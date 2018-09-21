<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/bootstrap/favicon.ico') }}">

    <title>Test</title>
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
      <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
      <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/navbar-fixed-top.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>

  </head>

  <body>
    <div class="container">

      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Contact list
                        <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Contact</a>
                    </h4>
                </div>
                <div class="panel-body">
                    <table id="contact-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

      @include('data.form')

    </div>

    <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>

    <script type="text/javascript">
      var table = $('#contact-table').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: "{{ route('api') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ],
                      "lengthMenu": [[-1, 10, 5, 2], ["All", 10, 5, 2]]
                    });

      function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Contact');
      }
      $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('kontak') }}";
                    else url = "{{ url('kontak') . '/' }}" + id;
                    $.ajax({
                        url : url,
                        type : "POST",
                        data : $('#modal-form form').serialize(),
                        success: function($data){
                          $('#modal-form').modal('hide');
                          table.ajax.reload();
                        },
                        error: function(){
                          alert('Opps! Something Error!');
                        }
                      });
                    return false;
                  }
                });
          });

        //                 data: new FormData($("#modal-form form")[0]),
        //                 contentType: false,
        //                 processData: false,
        //                 success : function(data) {
        //                     $('#modal-form').modal('hide');
        //                     table.ajax.reload();
        //                     swal({
        //                         title: 'Success!',
        //                         text: data.message,
        //                         type: 'success',
        //                         timer: '1500'
        //                     })
        //                 },
        //                 error : function(data){
        //                     swal({
        //                         title: 'Oops...',
        //                         text: data.message,
        //                         type: 'error',
        //                         timer: '1500'
        //                     })
        //                 }
        //             });
        //             return false;
        //         }
        //     });
        // });
    </script>
  </body>
</html>