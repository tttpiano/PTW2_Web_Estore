@extends('front.admins.layouts.master')
@section('admin-container')
    <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center" style="width: 100%;">
                <div class="nav-item d-flex align-items-center" style="width: 100%;">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" id="search_post" placeholder="Search..."
                           aria-label="Search..." style="width: 100%;" />
                </div>
            </div>
            <!-- /Search -->


        </div>
    </nav>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">POST</h5>
                <div class="add">

                    <a class="btn btn-success" href="{{route('post_add')}}">Add</a>
                </div>
                <div class="table-responsive text-nowrap content1">
                    <table class="table">
                        <thead>
                        <tr class="color_tr">
                            <th>STT</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Content</th>
                            <th>Meta_desc</th>
                            <th>Meta_keyword</th>
                            <th>Url_seo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0 alldata " >
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post -> id}}</td>
                                <td>

                                        <img style="width: 100px;"
                                             src="{{asset('storage/img/' . $post->image_post) }}"
                                             alt="Image">
                                </td>

                                <td>{{$post -> author}}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post -> title,10)}}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post->description, 10) }}
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($post->content, 10) }}
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($post-> meta_desc, 10)}}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post-> meta_keyword, 10)}}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post-> url_seo, 10)}}</td>
                                <td>{{$post-> status}} </td>
                                <td>
                                    <a href="{{route('post_edit', encrypt($post->id))}}" class="btn btn-outline-info"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <br><br>
                                    <form id="delete-form" action="{{ route('posts.destroy', $post->id) }}"
                                          method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{$post->id}}">Xoá
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{$post->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có muốn xoá bài viết này?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tbody id="Content" class="searchdata">

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
    <!-- Button trigger modal -->
    <!--  -->
    @if(session('success'))
        <div class="hidden" id="deleteSuccessMessage">{{ session('success') }}</div>
    @endif
    <script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script>
        // Sử dụng document.querySelectorAll để lấy tất cả các thẻ td chứa giá trị $post -> id
        var tdElements = document.querySelectorAll("td:nth-child(1)");

        // Duyệt qua từng thẻ td và thay đổi giá trị của nó từ 1 đến n
        for (var i = 0; i < tdElements.length; i++) {
            tdElements[i].textContent = i + 1;
        }
        var successMessage = document.getElementById('deleteSuccessMessage');
        if (successMessage) {
            swal(successMessage.innerText, "You clicked the button!", "success");
        }
    </script>
    <script>
        $(document).ready(function () {
            function loadPosts(page) {
                $.ajax({
                    url: '/ajax/posts?page=' + page,
                    type: 'get',
                    success: function (data) {
                        $('.content1').html(data);
                        // Rest of your code (e.g., update the STT column)
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Initial load
            loadPosts(1);

            // Handle pagination click
            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadPosts(page);
            });

            // ... Rest of your code (search functionality, etc.)
        });
    </script>
@endsection
