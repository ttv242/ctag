<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

use App\Http\Controllers\auth\UsersController;
use App\Http\Controllers\auth\AuthenticationController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\GeneralsController;
use App\Http\Controllers\BannerController;

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
// View::share('TPL_URL','https://hungthinhphatglasses.vn');
// View::share('BASE_URL','/c9298361c68d4a67');
// View::share('ADM_DIR','admin');
View::share('PUBLIC_DIR', ''); //public


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/gioi-thieu', [PagesController::class, 'about'])->name('about');
Route::get('/san-pham-danh-muc/{param1?}/{param2?}', [PagesController::class, 'shop'])->name('categories');
Route::get('/san-pham-thuong-hieu/{param1?}', [PagesController::class, 'brand'])->name('brands');
Route::get('/tat-ca-san-pham', [PagesController::class, 'shop'])->name('shop');
Route::get('/chi-tiet-san-pham/{param1?}', [PagesController::class, 'product'])->name('product');
Route::get('/tin-tuc', [PagesController::class, 'blog'])->name('blog');
// Route::get('/tin-tuc/{alias?}', [PagesController::class, 'blog_single'])->name('blog_single');
Route::get('/chi-tiet-tin-tuc', [PagesController::class, 'blog_single'])->name('blog_single');
Route::get('/lien-he', [PagesController::class, 'contact'])->name('contact');
Route::get('/gio-hang', [PagesController::class, 'cart'])->name('cart');
Route::get('/khach-hang', [PagesController::class, 'client'])->name('client');

Route::post('/khach-hang/update/account', [UsersController::class, 'update'])->name('client.update.account');

Route::post('/khach-hang/check/voucher', [PagesController::class, 'checkVoucher'])->name('client.check.voucher');
Route::post('/khach-hang/order', [PagesController::class, 'order'])->name('client.order');
Route::get('/khach-hang/order/{slug?}', [PagesController::class, 'order'])->name('client.order');
Route::post('/khach-hang/order/delete/{slug}', [PagesController::class, 'orderDelete'])->name('client.order.delete');

Route::get('/search', [PagesController::class, 'search'])->name('search');
Route::get('/search-suggestions', [PagesController::class, 'suggestions'])->name('search-suggestions');
Route::get('/categories/{alias}', [PagesController::class, 'show'])->name('categories.show');

Route::middleware(['guards'])->group(function () {
    Route::get('/uploads/index.html', function () {
        // Các xử lý của tuyến đường
        return view('uploads.index');
    });
});
Route::get('/dang-ky', [UsersController::class, 'register'])->name('register');
Route::post('/dang-ky', [UsersController::class, 'register'])->name('register');

Route::get('/dang-nhap', [UsersController::class, 'login'])->name('login');
Route::post('/dang-nhap', [UsersController::class, 'login'])->name('login')->middleware('remember');

Route::get('/dang-xuat', [UsersController::class, 'logout'])->name('logout');

// Route::middleware(['auth', 'role'])->group(function () {
//     Route::get('/uploads', function () {
//         // Các xử lý của tuyến đường
//         return view('uploads.index');
//     });
// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [UsersController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UsersController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UsersController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::prefix('zvcx')->name('dashboard.')->group(function () {


        //users
        Route::get('/tai-khoan/{slug?}/{id?}', [UsersController::class, 'acc'])->name('acc');
        Route::get('/tao-tai-khoan', [UsersController::class, 'creAcc'])->name('creAcc');
        Route::post('/tao-tai-khoan', [UsersController::class, 'creAcc'])->name('creAcc');
        Route::put('/cap-nhat-tai-khoan/{slug?}/{id?}', [UsersController::class, 'acc'])->name('updateAcc');

        Route::get('/', [DashboardController::class, 'dashboard']);

        Route::get('/danh-muc/{slug1?}/{slug2?}/{id?}', [CategoriesController::class, 'cat'])->name('cat');
        Route::get('/tao-danh-muc/{slug?}', [CategoriesController::class, 'creCat'])->name('creCat');
        Route::post('/tao-danh-muc/{slug?}', [CategoriesController::class, 'creCat'])->name('creCat');
        Route::put('/cap-nhat-danh-muc/{slug1?}/{slug2?}/{id?}', [CategoriesController::class, 'cat'])->name('updateCat');

        Route::get('/thuong-hieu/{slug1?}/{slug2?}/{id?}', [BrandsController::class, 'bra'])->name('bra');
        Route::get('/tao-thuong-hieu', [BrandsController::class, 'creBra'])->name('creBra');
        Route::post('/tao-thuong-hieu', [BrandsController::class, 'creBra'])->name('creBra');
        Route::put('/cap-nhat-thuong-hieu/{slug?}/{id?}', [BrandsController::class, 'bra'])->name('updateBra');

        Route::get('/san-pham/{slug?}/{id?}/{paginate?}', [ProductsController::class, 'pro'])->name('pro');
        Route::get('/tao-san-pham', [ProductsController::class, 'crePro'])->name('crePro');
        Route::post('/tao-san-pham', [ProductsController::class, 'crePro'])->name('crePro');
        Route::get('/uu-dai-thang/{slug?}', [ProductsController::class, 'monthlyOffers'])->name('monthlyOffers');
        Route::put('/uu-dai-thang', [ProductsController::class, 'monthlyOffers'])->name('monthlyOffers');
        // Route::post('/uu-dai-thang', [ProductsController::class, 'monthlyOffers'])->name('monthlyOffers');
        Route::get('/cap-nhat-san-pham/{slug?}/{id?}', [ProductsController::class, 'pro'])->name('updatePro');

        Route::get('/phieu-giam-gia/{slug1?}/{id?}', [VoucherController::class, 'voucher'])->name('voucher');
        // Route::get('/phieu-giam-gia', [VoucherController::class, 'voucher'])->name('voucher');
        Route::get('/them-thieu-giam-gia', [VoucherController::class, 'creVou'])->name('creVou');
        Route::post('/them-thieu-giam-gia', [VoucherController::class, 'creVou'])->name('creVou');

        Route::get('/san-pham-thuong-hieu/{slug?}/{paginate?}', [ProductsController::class, 'braPro'])->name('braPro');
        Route::get('/san-pham-danh-muc/{slug1?}/{slug2?}/{paginate?}', [ProductsController::class, 'catPro'])->name('catPro');

        Route::get('/don-hang/cho-xu-ly', [OrderController::class, 'pending'])->name('order.pending');
        Route::get('/don-hang/xu-ly', [OrderController::class, 'processing'])->name('order.processing');
        Route::get('/don-hang/da-van-chuyen', [OrderController::class, 'shipped'])->name('order.shipped');
        Route::get('/don-hang/da-van-chuyen-thanh-cong', [OrderController::class, 'completed'])->name('order.completed');
        Route::get('/don-hang/don-hang-that-bai', [OrderController::class, 'cancelled'])->name('order.cancelled');

        Route::get('/chi-tiet-don-hang/{slug?}', [OrderController::class, 'detail'])->name('order.detail');
        Route::get('/don-hang/cap-nhat/{slug1?}/{slug2?}', [OrderController::class, 'update'])->name('order.update');

        // THỐNG KÊ

        Route::get('/luot-xem-san-pham', [StatisticalController::class, 'viewPro'])->name('statistica.viewPro');
        Route::get('/luot-xem-san-pham/{startdate}/{enddate}', [StatisticalController::class, 'viewProdate'])->name('statistica.viewProdate');

        Route::get('/Nguoi-ban-hang-gioi', [StatisticalController::class, 'bestSeller'])->name('statistica.bestSeller');
        Route::get('/Nguoi-ban-hang-gioi/{start}/{end}', [StatisticalController::class, 'bestSellerdate'])->name('statistica.bestSellerdate');

        // Tin tức
        Route::get('/tin-tuc/{slug?}/{id?}', [BlogsController::class, 'blogs'])->name('blogs');
        Route::get('/tao-tin-tuc', [BlogsController::class, 'creBlo'])->name('creBlo');
        Route::post('/tao-tin-tuc', [BlogsController::class, 'creBlo'])->name('creBlo');
        Route::put('/cap-nhat-tin-tuc/{slug?}/{id?}', [BlogsController::class, 'blogs'])->name('updateBlo');

        // thông tin trang website
        Route::get('/thong-tin/{slug?}', [GeneralsController::class, 'general'])->name('general');
        Route::put('/cap-nhat-thong-tin/{slug?}', [GeneralsController::class, 'general'])->name('updateGen');

        // trang banner
        Route::get('/quang-cao/{slug?}/{id?}', [BannerController::class, 'banner'])->name('banner');
        Route::get('/tao-quang-cao', [BannerController::class, 'creBan'])->name('creBan');
        Route::post('tao-quang-cao', [BannerController::class, 'creBan'])->name('creBan');


    });

    Route::get('/picture/', [DashboardController::class, 'picture'])->name('dashboard.picture');
});

// require __DIR__.'/auth.php';

// /** Login admin Dashboard */
// Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
// /** Login admin Dashboard */




// /** User Dashboard */
// Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->name('user.')->group(function() {
//     Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
// });
