@extends('template')
@section('title')
Pegawai
@endsection
@push('pegawai')
active
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Data Pegawai</h4>
            </div>
            <div class="panel-body">
                <table id="tablePegawai" class="table table-striped">
                <thead>
                    <tr>
                        <th style="position: center"><button type="button" class="btn btn-primary btn-xs addPegawai" data-toggle="modal"><i class="fa fa-pencil"></i></button></th>
                        <th>Nama Pegawai</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>Jabatan</th>
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
            $('#tablePegawai').DataTable({
                processing:true,
                serverSide:true,
                ordering: false,
                ajax: "{{ route('table-pegawai') }}",
                columns : [
                    {data: 'action',searchable:false},
                    {data: 'nama_pgw'},
                    {data: 'gender'},
                    {data: 'alamat'},
                    {data: 'no_hp'},
                    {data: 'jabatan.nama_jabatan'}
                ]
            });
        });

        $('.addPegawai').click(function(e){
            $.ajax({
                type:"GET",
                url:"{{ url('/modal/add-pegawai') }}",
                success : function(data){
                    console.log(data);
                    $('#myModal').modal('show');
                    $('.modal-title').html(data.modal_header);
                    $('.modal-body').html(data.modal_body);
                    $('.modal-footer').html(data.modal_footer);
                    $('.modal-dialog').addClass(data.modal_size)
                },
                error : function(respon){
                    console.log(data)
                }
            });
        });

        function editPegawai(id) {
            $.ajax({
              url: "{{ url('/modal/edit-pegawai') }}" + '/' + id ,
              type: "GET",
              dataType: "JSON",
              success: function(data) {
                console.log(data);
                    $('#myModal').modal('show');
                    $('.modal-title').html(data.modal_header);
                    $('.modal-body').html(data.modal_body);
                    $('.modal-footer').html(data.modal_footer);
                    $('.modal-dialog').addClass(data.modal_size);
                    $('#id').val(data.pegawai.id);
                    $('#nama_pgw').val(data.pegawai.nama_pgw);
                    $('#gender').val(data.pegawai.jenis_kelamin);
                    $('#alamat').val(data.pegawai.alamat);
                    $('#no_hp').val(data.pegawai.no_hp);
                    $('#jabatan_id').val(data.pegawai.jabatan_id);
                },
                error: function(response){
                    console.log('error');
                }
            });
        }

        $("#form").submit(function(e){
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var state = $('#btn-save').val();
            if(state = 'add'){
                $.ajax({
                    type : "POST",
                    url : "{{ url('post/pegawai') }}",
                    data: $('#form').serialize(),
                    dataType : "json",
                    success : function(data){
                        console.log(data);
                        $('#myModal').modal('hide');
                        $('#tablePegawai').DataTable().ajax.reload();
                        swal({
                            title: 'Success!',
                            type : 'success',
                            text : data.message,
                            timer: 1500,
                        }).catch(swal.noop);
                    },
                    error: function (data) {
                        console.log(data);
                            $('#myModal').modal('hide');
                            // hideLoading();
                            swal({
                                type : 'error',
                                title: 'Maaf',
                                text: 'Gagal Menambah data Divisi.',
                            });
                    }
                });
            }
        });
    </script>
@endpush