@extends('admin.layout.template')
@section('css')

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.css" />



@endsection

@section('title')
    POST
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Posts</h1>
                <div class="section-header-button">
                    <a href="/posts/create" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/posts">Posts</a></div>
                    <div class="breadcrumb-item">All Posts</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Posts</h2>
                <p class="section-lead">
                    You can manage all posts, such as editing, deleting and more.
                </p>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>

                            </div>
                            <div class="card-body">
                                @if (Session::has('post_success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('post_success') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Title</th>
                                                <th>Genre</th>
                                                <th>Tags</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($post as $item)
                                                <tr id="{{ $item->id }}">
                                                    <td class="align-middle">
                                                        {{ $loop->index + 1 }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->title }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->genre->genre_name }}
                                                    </td>
                                                    <td class="align-middle">
                                                        @foreach (explode(',', $item->tags) as $tag)
                                                            <div class="badge badge-info">{{ $tag }}</div>
                                                        @endforeach

                                                    </td>
                                                    <td class="align-middle">
                                                        @if ($item->status == 'Publish')
                                                            <div class="badge badge-success">Publish</div>
                                                        @elseif($item->status == 'Draft')
                                                            <div class="badge badge-warning">Draft</div>
                                                        @elseif($item->status == 'Pending')
                                                            <div class="badge badge-danger">Pending</div>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        @php
                                                        echo
                                                        \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans()
                                                        @endphp

                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="/posts/edit/{{ $item->slug }}" class="btn btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger delete">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.23/b-1.6.5/r-2.2.7/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>
    <script src="{{ asset('stisla-master/assets/js/page/modules-datatables.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".delete").click(function() {
                var id = $(this).parents("tr").attr("id");
                swal({
                        title: 'Are you sure?',
                        text: 'Once deleted, you will not be able to recover this post!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            console.log('id :' + id);
                            $.ajax({
                                type: 'DELETE',
                                url: "/posts/" + id,
                                data: {
                                    _token: '{{ csrf_token() }}',
                                },
                                success: function(response) {
                                    if (response.success) {
                                        swal({
                                            title: "Deleted!",
                                            text: response.success,
                                            buttonsStyling: false,
                                            confirmButtonClass: "btn btn-success",
                                            icon: "success"
                                        }).then((result) => {
                                            location.reload();
                                        });
                                    }
                                }
                            });
                        } else {
                            swal('Data anda tidak jadi dihapus');
                        }
                    });

            });
        });

    </script>
@endsection
