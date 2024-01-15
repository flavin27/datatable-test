<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable com Bootstrap e Ajax</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    
</head>
<body>
    @include('create_modal')

<div class="container mt-5">
    <button type="button" id="botaoModal" class="btn btn-success mb-4">New</button>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <!-- Aqui será preenchido pelos dados via Ajax -->
        </tbody>
    </table>
</div>

<script>
    $(function () {
    //ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })});

    var table = $('#example').DataTable({
        processing: true,
        info: true,
        serverSide: true,
        ajax: "{{ route('data.dashboard') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
        ]
    });

    $(document).on('click','#botaoModal', function(){
        $('#exampleModal').modal('show');
    });
    $(document).on('click','#closeModal', function(){
        $('#exampleModal').modal('hide');
    });

    $('#createModal').click(function(e){
        e.preventDefault();
        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();
        var confirm_password = $("input[name=confirm_password]").val();
        var _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('create.user') }}",
            type:'POST',
            data: {_token:_token, name:name, email:email, password:password, confirm_password:confirm_password},
            success: function(data) {
                $('#exampleModal').modal('hide');
                table.draw();
            }
        });
    });
</script>

</body>
</html>
