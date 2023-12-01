<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopDetailController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');
Route::get('/introduce', function () {
    return view('front.introduce');
})->name('introduce');

Route::get('/history', function () {
    return view('front.history');
})->name('history');
Route::delete('/chat/delete/{id}', [ProductController::class, 'deleteChat'])->name('delete.chat');
Route::post('/chat/addChat', [ProductController::class, 'addChat'])->name('add.chat');
Route::get('history', [HistoryController::class, 'historyShow'])->name('history');
Route::post('/admin/product/insert', [AdminController::class, 'insertProduct'])->name('insert_product');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/users/{id}', [CustomAuthController::class, 'show'])->name('show');
Route::get('pages', [CustomAuthController::class, 'phanTrang'])->name('abc');

Route::get('', [ProductController::class, 'showProduct'])->name('home');
Route::get('/shop', [ShopController::class, 'show'])->name('shop');
Route::get('/search', [SearchProductController::class, 'search'])->name('search');
Route::get('/shopdetail/{product}&code={id}', [ShopDetailController::class, 'showId'])->name('shopId');



Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart/show', [CartController::class, 'CartShow'])->name('cart.show');
Route::get('/cart/add/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::get('/cart/edit/{id}', [CartController::class, 'editCart'])->name('cart.edit');
Route::post('/shopdetail/{id}', [ReviewController::class, 'store'])->name('ratings.store')->middleware('auth');
Route::get('/favourite/add', [FavouriteController::class, 'favouriteAdd'])->name('favourite.add');
Route::get('/favourite/show', [FavouriteController::class, 'FavouriteShow'])->name('favourite.show');
Route::get('/favourite/{id}', [FavouriteController::class, 'Favouritedelete'])->name('favourite.delete');

Route::get('/blog', [PostController::class, 'getAllBlogs'])->name('blog');
Route::get('/blog/{url_seo}', [PostController::class, 'show'])->name('posts.show');
Route::get('/blog/pagin/{id}', [PostController::class, 'pagin_blog'])->name('pagin.blog');
Route::get('/ajax/blogs', [PostController::class, 'ajaxPaginationBlog'])->name('ajax.blogs');


Route::get('/products/keywords1', [ProductController::class, 'searchLq'])->name('searchlq');
Route::middleware('admin.login')->group(function () {

/////////////////// admin /////////////////////
    Route::get('/admin', [AdminController::class, 'showadmin'])->name('admin_home');
    Route::get('/admin/product', [AdminController::class, 'showproduct'])->name('admin_product');
    Route::get('/admin/product/add', [AdminController::class, 'addproduct'])->name('add_product');
    Route::get('/admin/product/edit/{id}', [AdminController::class, 'editproduct'])->name('edit_product');
    Route::put('/admin/product/edit/{id}', [AdminController::class, 'updateproduct'])->name('update.product');
    Route::get('/searchProduct', [AdminController::class, 'searchProduct'])->name('searchProduct');


// brand
    Route::get('/admin/product/brand', [AdminController::class, 'brandproduct'])->name('brand_product');
    Route::get('/admin/product/addbrand', [AdminController::class, 'addbrand'])->name('add_brand');
    Route::get('/admin/product/editbrand/{id}', [AdminController::class, 'editbrand'])->name('edit_brand');
    Route::delete('/admin/product/delete/{id}', [AdminController::class, 'deleteproduct'])->name('delete.product');

// ram
    Route::get('/admin/product/ram', [AdminController::class, 'ramproduct'])->name('ram_product');
    Route::get('/admin/product/addram', [AdminController::class, 'addram'])->name('add_ram');
    Route::get('/admin/product/editram/{id}', [AdminController::class, 'editram'])->name('edit_ram');


// bo nho trong
    Route::get('/admin/product/rom', [AdminController::class, 'romproduct'])->name('rom_product');
    Route::get('/admin/product/addrom', [AdminController::class, 'addrom'])->name('add_rom');
    Route::get('/admin/product/editrom/{id}', [AdminController::class, 'editrom'])->name('edit_rom');
    Route::post('/admin/upload', [AdminController::class, 'storeImage'])->name('img.upload');



//admin
// thêm xóa sửa Brand

    Route::post('/admin/product/addbrand/insert', [AdminController::class, 'insertBrand'])->name('add.brand');
    Route::delete('/admin/brand/delete/{id}', [AdminController::class, 'deleteBrand'])->name('delete.brand');
    Route::put('/admin/brand/edit/{id}', [AdminController::class, 'updateBrand'])->name('update.brand');

// thêm xóa sửa Ram

    Route::post('/admin/product/addram/insert', [AdminController::class, 'insertRam'])->name('add.ram');
    Route::delete('/admin/ram/delete/{id}', [AdminController::class, 'deleteRam'])->name('delete.ram');
    Route::put('/admin/ram/edit/{id}', [AdminController::class, 'updateRam'])->name('update.ram');

// thêm xóa sửa Rom

    Route::post('/admin/product/addrom/insert', [AdminController::class, 'insertRom'])->name('add.rom');
    Route::put('/admin/rom/edit/{id}', [AdminController::class, 'updateRom'])->name('update.rom');
    Route::delete('/admin/rom/delete/{id}', [AdminController::class, 'deleteRom'])->name('delete.rom');
// Route::put('/admin/brand/edit/{id}', [AdminController::class, 'updateRam'])->name('update.ram');

// Route::put('/admin/brand/edit/{id}', [AdminController::class, 'updateBrand'])->name('update.brand');

    Route::get('/admin/searchUser', [AdminController::class, 'searchUser'])->name('searchUser');
// QUAN LY USER
//user
    Route::get('/admin/user', [AdminController::class, 'user'])->name('admin_user');
    Route::get('/admin/user/add', [AdminController::class, 'addpuser'])->name('add_user');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edituser'])->name('edit_user');
//
    Route::post('/admin/user/insert', [AdminController::class, 'insertUser'])->name('user.add');
//xoa
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
//sua
    Route::put('/admin/user/edit/{id}', [AdminController::class, 'updateUser'])->name('update.user');



    ////POST
      Route::post('/upload/image', [PostController::class, 'upload'])->name('upload.image');
    Route::get('/admin/post/edit/{id}', [PostController::class, 'postEdit'])->name('post_edit');
    Route::get('/admin/post/add', [PostController::class, 'postAdd'])->name('post_add');
    Route::put('/admin/edit/{id}', [PostController::class, 'update'] )->name('post.edit');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin_post');
    Route::post('/admin/post/insert', [PostController::class, 'insert'])->name('admin_post_insert');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/admin/post/search', [PostController::class, 'search'])->name('search.post');
    Route::get('/admin/post/pagin/{id}', [PostController::class, 'pagin_postAdmin'])->name('pagin.post');
    Route::get('/ajax/posts', [PostController::class, 'ajaxPaginationPostAdmin'])->name('ajax.posts');
    Route::get('/admin/post/detal', [PostController::class, 'detal'])->name('detal.post');
    Route::get('/admin/product/detal', [AdminController::class, 'detal'])->name('detal.product');



    Route::get('/admin', [WebsiteController::class, 'showVisitsChart'])->name('admin.visits');
});
