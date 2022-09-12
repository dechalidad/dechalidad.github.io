<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ConsultationMasterController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FoodTypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Production;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\WeightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
  Artisan::call('cache:clear');
  Artisan::call('route:clear');
  Artisan::call('config:clear');
  Artisan::call('view:clear');
  // return what you want
});
Route::get('/format-desc-news', [NewsController::class, 'format_desc_news']);
#-------------------------- user -------------------------------#

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/products/{id_animal}/{id_item}/{type}', [PageController::class, 'product_all']);
Route::get('/products-intro', [PageController::class, 'product_intro']);
Route::get('/products-brand/{id_animal}', [PageController::class, 'product_brand']);
Route::get('/product-detail/{id_product}', [PageController::class, 'product_detail']);
Route::get('/news', [PageController::class, 'news_all']);
Route::get('/news-detail/{id_news}', [PageController::class, 'news_detail']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/Cheatsheet', [PageController::class, 'cheatsheet']);
Route::post('/filter-product', [PageController::class, 'filter_product']);
Route::post('/filter-product-quiz', [PageController::class, 'filter_product_quiz']);
Route::post('/filter-news', [PageController::class, 'filter_news']);
Route::get('/search-product/{product_name}', [PageController::class, 'search_product']);
Route::post('save-consultation', [ConsultationController::class, 'store']);
Route::post('save-subscribe', [ConsultationController::class, 'subscribe']);

Route::get('/template', [TemplateController::class, 'home']);
Route::get('/template/about', [TemplateController::class, 'about']);
Route::get('/template/products', [TemplateController::class, 'product_all']);
Route::get('/template/products-brand', [TemplateController::class, 'product_brand']);
Route::get('/template/product-detail', [TemplateController::class, 'product_detail']);
Route::get('/template/news', [TemplateController::class, 'news_all']);
Route::get('/template/news-detail', [TemplateController::class, 'news_detail']);
Route::get('/template/contact', [TemplateController::class, 'contact']);
Route::get('/template/under-construction', [TemplateController::class, 'under_construction']);
Route::get('/template/Cheatsheet', [TemplateController::class, 'cheatsheet']);

// Route::get('/en', [PageController::class, 'home']);

#-------------------------- end user ---------------------------#
#-------------------------- admin -------------------------------#
Route::get('/login-admin', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authentication']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware('admin')->group(function () {
  Route::get('dashboard', [AdminController::class, 'index']);
  Route::get('create-weight/{id_product}', [WeightController::class, 'create']);
  Route::get('create-variant/{id_product}', [VariantController::class, 'create']);
  Route::delete('delete-weight/{id_weight}', [WeightController::class, 'delete']);
  Route::delete('delete-variant/{id_variant}', [VariantController::class, 'delete']);
  Route::get('edit-weight/{id_weight}/{id_product}', [WeightController::class, 'edit']);
  Route::get('edit-variant/{id_variant}/{id_product}', [VariantController::class, 'edit']);
  Route::get('list-weight/{id_product}', [WeightController::class, 'index']);
  Route::get('list-variant/{id_product}', [VariantController::class, 'index']);
  Route::resource('master-animal', AnimalController::class);
  Route::resource('master-banner', BannerController::class);
  Route::resource('master-brand', BrandController::class);
  Route::resource('master-consultation', ConsultationMasterController::class);
  Route::get('master-consultation/detail/{id}', [ConsultationMasterController::class, 'detail']);
  Route::resource('master-food', FoodTypeController::class);
  Route::resource('master-news', NewsController::class);
  Route::resource('master-product', ProductController::class);
  Route::resource('master-review', ReviewController::class);
  Route::resource('master-variant', VariantController::class);
  Route::post('save-weight/{id_product}', [WeightController::class, 'save']);
  Route::post('save-variant/{id_product}', [VariantController::class, 'save']);
  Route::patch('update-weight/{id_weight}/{id_product}', [WeightController::class, 'update']);
  Route::patch('update-variant/{id_variant}/{id_product}', [VariantController::class, 'update']);
});
#-------------------------- end admin ---------------------------#

#-------------------------- EN Section -------------------------------#
Route::group(['prefix' => '/{lang}'], function () {
  Route::get('/', [PageController::class, 'home']);
  Route::get('/about', [PageController::class, 'about']);
  Route::get('/products-intro', [PageController::class, 'product_intro']);
  Route::get('/products-brand/{id_animal}', [PageController::class, 'product_brand']);
  Route::get('/products/{id_animal}/{id_item}/{type}', [PageController::class, 'product_all']);
  Route::get('/product-detail/{id_product}', [PageController::class, 'product_detail']);
  Route::get('/news', [PageController::class, 'news_all']);
  Route::get('/news-detail/{id_news}', [PageController::class, 'news_detail']);
  Route::get('/contact', [PageController::class, 'contact']);
  Route::get('/search-product/{product_name}', [PageController::class, 'search_product']);
  Route::post('/filter-product-quiz', [PageController::class, 'filter_product_quiz']);
});
#-------------------------- EN Section -------------------------------#

// Route::get('/', function () {
//     return view('welcome');
// });
