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

        <a class="btn btn-primary mb-2" href="{{ route('books.create') }}">Add Book</a>
        <form action="{{ route('sign-out') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Sign out</button>
        </form>

        <table id="books-table" class="table my-3">
            <thead>
                <tr>
                    <th scope="col">Title</th>
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

    function remove(id)
    {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    $form = $('<form id="delete-form" method="POST" action="/books/'+id+'"></form>')
                    $form.append('<input type="hidden" name="_method" value="DELETE">')
                    $form.append('<input type="hidden" name="_token" value="'+$("meta[name='csrf-token']").attr('content')+'">')
                    $('body').append($form)
                    $('#delete-form').submit();

                }
        })
    }

    $('#books-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('books.table') }}",
        columns:[
            { data: 'title' },
            { data: 'actions' },
        ]
    });
</script>
@endsection