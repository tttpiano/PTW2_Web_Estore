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
    <tbody class="table-border-bottom-0 " >
    @foreach($posts as $post)
        <tr class="alldata"  data-post="{{$post->id}}">
            <td>{{$post->stt}}</td>
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
            <td><span class="s_h">{{$post->status }}</span></td>
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
                                    Bạn có muốn xoá bài viết " {{ \Illuminate\Support\Str::limit($post -> title,10)}} " này?
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
{{$posts->links('pagination::bootstrap-4')}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset">
                <div id="detalProduct"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100%;">Close</button>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.s_h').each(function() {
            // Lấy nội dung text của phần tử
            var contentText = $(this).text().trim();
            console.log(contentText)
            // Kiểm tra nội dung text và thêm lớp màu tương ứng
            if (contentText === 'show') {
                $(this).addClass('show1').removeClass('hidden1');
            } else if (contentText === 'hidden') {
                $(this).addClass('hidden1').removeClass('show1');
            }
        });
        // Lấy danh sách tất cả các hàng <tr> có lớp "alldata"
        const rows = $('tr.alldata');

        // Lặp qua từng hàng <tr>
        rows.each(function () {
            // Lấy tất cả các ô <td> trong hàng trừ <td> cuối cùng
            const tds = $(this).find('td:not(:last-child)');

            // Thêm thuộc tính data-bs-toggle và data-bs-target vào các ô <td> tương ứng
            tds.attr('data-bs-toggle', 'modal');
            tds.attr('data-bs-target', '#exampleModal');
        });
    });
    // Lấy nội dung thông báo "Xoá thành công" từ div ẩn
    var successMessage = document.getElementById('deleteSuccessMessage');
    if (successMessage) {
        swal(successMessage.innerText, "You clicked the button!", "success");
    }

    $('.alldata td').each(function () {
        // Thêm thuộc tính CSS vào các thẻ <td> này (ví dụ: thêm màu nền và màu chữ)
        $(this).css({
            'cursor': 'pointer'
        });
    });
    $('.alldata').on('click', 'td', function () {
        var productId = $(this).closest('.alldata').data('post');
        console.log('Product ID:', productId);
        $.ajax(
            {
                type: 'get',
                url: '{{route("detal.post")}}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                },
                success: function (data) {
                    console.log('Received data:', data);
                    $('#detalProduct').html(data);
                }
            }
        )
    });
</script>
