<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
// Home Page
$router->get('/', [App\Controllers\HomeClientController::class, 'index']);
$router->get('home-detail/{id}/{id_cate}', [App\Controllers\HomeDetailClient::class, 'index']);
$router->get('cate_ball/{id}', [App\Controllers\HomeClientController::class, 'ShowCateBall']);
$router->get('cate_shoes/{id}', [App\Controllers\HomeClientController::class, 'ShowCateShoes']);
// Home Page
/*
 * * Handler Module Product
 */
$router->get('list-product', [App\Controllers\ProductController::class, 'ListProduct']);
$router->get('add-product', [App\Controllers\ProductController::class, 'AddProduct']);
$router->post('add-post-product', [App\Controllers\ProductController::class, 'AddPostProduct']);
$router->get('remove-product/{id}', [App\Controllers\ProductController::class, 'RemoveProduct']);
$router->get('edit-product/{id}', [App\Controllers\ProductController::class, 'EditProduct']);
$router->post('edit-post-product/{id}', [App\Controllers\ProductController::class, 'EditPostProduct']);
/*
 * * Handler Module Category
 */
$router->get('list-category', [App\Controllers\CategoryController::class, 'ListCategory']);
$router->get('add-category', [App\Controllers\CategoryController::class, 'AddCategory']);
$router->post('add-post-category', [App\Controllers\CategoryController::class, 'AddPostCategory']);
$router->get('remove-category/{id}', [App\Controllers\CategoryController::class, 'RemoveCategory']);
$router->get('edit-category/{id}', [App\Controllers\CategoryController::class, 'EditCategory']);
$router->post('edit-post-category/{id}', [App\Controllers\CategoryController::class, 'EditPostCategory']);
/*
 * * Handler Module User
 */
$router->get('list-user', [App\Controllers\UserController::class, 'ListUser']);
$router->get('add-user', [App\Controllers\UserController::class, 'AddUser']);
$router->post('add-post-user', [App\Controllers\UserController::class, 'AddPostUser']);
$router->get('remove-user/{id}', [App\Controllers\UserController::class, 'RemoveUser']);
$router->get('edit-user/{id}', [App\Controllers\UserController::class, 'EditUser']);
$router->post('edit-post-user/{id}', [App\Controllers\UserController::class, 'EditPostUser']);
/*
 * * Handler Module Comments
 */

$router->get('list-comment', [App\Controllers\CommentController::class, 'ListComment']);
$router->get('remove-comment/{id}', [App\Controllers\CommentController::class, 'RemoveComment']);
/*
 * * Handler Module Brands
 */

$router->get('list-brand', [App\Controllers\BrandController::class, 'listBrand']);
$router->get('add-brand', [App\Controllers\BrandController::class, 'AddBrand']);
$router->post('add-post-brand', [App\Controllers\BrandController::class, 'AddPostBrand']);
$router->get('remove-brand/{id}', [App\Controllers\BrandController::class, 'RemoveBrand']);
$router->get('edit-brand/{id}', [App\Controllers\BrandController::class, 'EditBrand']);
$router->post('edit-post-brand/{id}', [App\Controllers\BrandController::class, 'EditPostBrand']);
/*
 * * Handler Module Images
 */
$router->get('remove-image/{id}/{id_product}',[App\Controllers\ImageController::class,'RemoveProduct']);
/*
 * * Handler Module ProductColors
 */
$router->get('remove-product-color/{id}/{id_pro}',[App\Controllers\ProductController::class,'RemoveProductColor']);
/*
 * * Handler Module HomeCollection
 */
$router->get('collections/{id}',[App\Controllers\HomeCollectionController::class,'index']);
/*
 * * Handler Module Login,logout,register
*/
$router->post('handler-login',[App\Controllers\HomeClientController::class,'HandlerLogin']);
$router->post('handler-register',[App\Controllers\HomeClientController::class,'HandlerRegister']);
$router->get('handler-login',[App\Controllers\HomeClientController::class,'ShowFormLogin']);
$router->get('log-out',[App\Controllers\HomeClientController::class,'HandlerLogout']);
$router->get('register',[App\Controllers\HomeClientController::class,'ShowFormRegister']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>