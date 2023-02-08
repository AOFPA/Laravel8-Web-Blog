@extends('layouts.master')

{{-- @section('title')
    admin-dashboard
@endsection --}}
@section('title', 'Category')

@section('content')



    <div class="container-fluid px-4 mt-4">


        <div class="card">
            <div class="card-header">
                <h4>View Category <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add
                        Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ @session('message') }}</div>
                @endif

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img width="100px" src="{{ asset('uploads/category/' . $item->image) }}"
                                            alt="img">
                                    </td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'Show' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit-category/' . $item->id) }}"
                                            class="btn btn-success">Edit</a>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-danger deleteCategoryBtn"
                                            value="{{ $item->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/delete-category') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category with its Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="category_delete_id" id="category_delete_id" hidden>
                        <h5>Are you sure ? you want to delete this Category with all its posts. ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.deleteCategoryBtn').click(function() {
                var category_id = $(this).val();
                $('#category_delete_id').val(category_id);
                console.log('click');

                $('#deleteModal').modal('show')
            });
        });
    </script>

@endsection
