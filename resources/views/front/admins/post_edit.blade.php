@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">


                    <div class="card-body">
                        <form id="formAccountSettings" action="{{route('post.edit',$post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if($post->image_post)
                                        <img src="{{asset('storage/img/'.$post->image_post)  }}" alt="user-avatar"
                                             class="d-block rounded img_edit" height="100" width="100" id="fileUpload"/>
                                    @else
                                        <img src="{{ asset('storage/img/uptoload.jpg')}}" alt="user-avatar"
                                             class="d-block rounded img_edit" height="100" width="100" id="fileUpload"/>
                                    @endif

                                    <div class="button-wrapper">

                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="avatar" class="account-file-input"
                                                   hidden accept="image/png, image/jpeg, image/jpg"/>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Author</label>
                                    <input class="form-control"
                                           type="text" id="author1"
                                           name="author"
                                           placeholder="author"
                                           autofocus
                                           value="{{$post->author}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Title</label>
                                    <input class="form-control"
                                           type="text" name="title"
                                           id="title"
                                           placeholder="title"
                                           value="{{$post->title}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Description</label>
                                    <input class="form-control"
                                           type="text"
                                           id="description1"
                                           name="description"
                                           placeholder="description"
                                           value="{{$post->description}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Content</label>
                                    <textarea

                                        style="resize: none"
                                        rows="8"
                                        class="form-control"
                                        id="content1"
                                        name="content">{{$post->content}}</textarea>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Meta
                                        Desc</label>
                                    <input class="form-control"
                                           type="text"
                                           id="meta_desc1"
                                           name="meta_Desc"
                                           placeholder="meta_Desc"
                                           value="{{$post->meta_desc}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Meta
                                        Keyword</label>
                                    <input class="form-control"
                                           type="text"
                                           id="meta_keyword1"
                                           name="meta_Keyword"
                                           placeholder="meta_keyword"
                                           value="{{$post->meta_keyword}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Status</label>
                                    <select id="status1" name="status" class="select1 form-select">
                                        <option value="show" @if($post->status === 'show') selected @endif>
                                            Show
                                        </option>
                                        <option value="hidden"
                                                @if($post->status === 'hidden') selected @endif>Hidden
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Url
                                        Seo</label>
                                    <input class="form-control"
                                           type="text" id="Url_Seo"
                                           name="url_Seo"
                                           placeholder="url_seo"
                                           value="{{$post->url_seo}}"/>
                                </div>
                            </div>
                            <div class="mt-2"
                                 style="text-align: right">

                                <a href="{{route('admin_post')}}">
                                    <button type="button"
                                            class="btn btn-outline-danger"
                                    >
                                        Close
                                    </button>
                                </a>
                                <button type="submit"
                                        class="btn btn-outline-success me-2 edit_post">
                                    Save
                                </button>

                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->

    <script>
        CKEDITOR.replace('content1', {

        });

    </script>

@endsection
