@extends('layouts.app')

@section('contents')

<div class="container">

    <div class="mt-5">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <table id="published-books-table" class="table my-3">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
       
    </div>

</div>

@endsection

@section('scripts')
<script>

    $('#published-books-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('published-books.table') }}",
        columns:[
            { data: 'title' },
            { data: 'name' },
            { data: 'actions' },
        ]
    });
</script>
@endsection