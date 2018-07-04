@extends('template')
@section('title')
Jabatan
@endsection
@push('jabatan')
active
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Data Jabatan</h4>
            </div>
            <div class="panel-body">
                <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th style="position: center"><button type="button" class="btn btn-primary btn-xs addJabatan" data-toggle="modal"><i class="fa fa-pencil"></i></button></th>
                        <th>Nama Jabatan</th>
                    </tr>
                </thead>
                <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page_js')
    <script>
        $(function(){
            $.LoadingOverlay("show", {
                image            : "",
                fontawesome      : "fa fa-cog fa-spin",
                fontawesomeColor : "#008B8B",
            });
            $('#table').DataTable({
                lengthMenu    : [[20, 30, 50, -1], [20, 30, 50, "All"]],
                processing    :false,
                serverSide    :true,
                ordering      : false,
                ajax          : "{{ route('table-jabatan') }}",
                columns: [
                    {data:'action',searchable: false},
                    {data:'nama_jabatan'}
                ]
            });
            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 1000);
        });

        $('.addJabatan').click(function(e){
            $.ajax({
                type : "GET",
                url : "{{ url('/modal/add-jabatan') }}",
                success : function(data){
                    console.log(data);
                    $('#myModal').modal('show');
                    $('.modal-title').html(data.modal_header);
                    $('.modal-body').html(data.modal_body);
                    $('.modal-footer').html(data.modal_footer);
                    $('.modal-dialog').addClass(data.modal_size);
                },
                error: function(response){
                    console.log('error');
                },
            });
        });

        function editJabatan(id) {
            $.ajax({
              url: "{{ url('/modal/edit-jabatan') }}" + '/' + id ,
              type: "GET",
              dataType: "JSON",
              success: function(data) {
                console.log(data);
                    $('#myModal').modal('show');
                    $('.modal-title').html(data.modal_header);
                    $('.modal-body').html(data.modal_body);
                    $('.modal-footer').html(data.modal_footer);
                    $('.modal-dialog').addClass(data.modal_size);
                    $('#id').val(data.jabatan.id);
                    $('#nama_jabatan').val(data.jabatan.nama_jabatan);
                },
                error: function(response){
                    console.log('error');
                }
            });
        }

        function deleteData(id){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('delete/jabatan') }}" + '/' + id,
                    type : "GET",
                    dataType : "JSON",
                    success : function(data) {
                        console.log(data);
                        $('#table').DataTable().ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }
        $('#form').submit(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var state = $('#btn-save').val();
            switch(state){
                case 'add' :
                $.ajax({
                    type: "POST",
                    url: "{{ url('tambah/jabatan') }}",
                    data: $('#form').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#myModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: 1500,
                        }).catch(swal.noop);
                    },
                    error: function (data) {
                        console.log(data.responseJSON.errors);
                        $.each(data.responseJSON.errors, function(name,value){
                            console.log(name);
                            $('#' + name).parent().addClass('has-error');
                            $('.' + name + '_error').html(value);
                        })
                            
                    }
                });
                break;
                
                case 'edit' :
                var id = $('#id').val();
                $.ajax({
                    type :"POST",
                    url : "{{ url('/edit/jabatan') }}" + '/' + id,
                    data : $('#form').serialize(),
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        $('#myModal').modal('hide');
                        $('#table').DataTable().ajax.reload();
                        swal({
                            type : 'success',
                            title : 'Success!',
                            text : data.message,
                            timer : 1500,
                        }).catch(swal.noop);
                    },
                    error: function (data) {
                        console.log(data.responseJSON.errors);
                        $.each(data.responseJSON.errors, function(name,value){
                            console.log(name);
                            $('#' + name).parent().addClass('has-error');
                            $('.' + name + '_error').html(value);
                        })
                            
                    }
                });
            }  
        });


    </script>
@endpush