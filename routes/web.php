<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogContentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\LanguageController;

// Contact form route
Route::controller(MessageController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/offer/form', 'offerForm')->name('offer.form');
});

Route::get('/', function () {
    return view('frontend.index');
});

// Admin Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Banner route
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banner/edit', 'homeBanner')->name('banner');
        Route::post('/banner/update', 'updateBanner')->name('banner.home.update');
    });

    // Footer route
    Route::controller(FooterController::class)->group(function () {
        Route::get('/footer/edit', 'editFooter')->name('footer.edit');
        Route::post('/footer/update', 'updateFooter')->name('footer.update');
    });

    // About Controller route
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about/edit', 'about')->name('about');
        Route::post('/about/update', 'updateAbout')->name('about.update');
        Route::get('/about', 'aboutFront')->name('home.about');
        Route::get('/multiple/image', 'multipleImage')->name('multiple.image');
        Route::post('/multiple/form', 'multipleForm')->name('multiple.image.form');
        Route::get('/multiple/list', 'multipleList')->name('multiple.list');
        Route::get('/multiple/edit/{id}', 'multipleEdit')->name('multiple.edit');
        Route::post('/multiple/update', 'multipleUpdate')->name('multiple.update');
        Route::get('/multiple/delete/{id}', 'multipleDelete')->name('multiple.delete');
    });

    // Category route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/all', 'allCategories')->name('category.all');
        Route::get('/category/add', 'addCategory')->name('category.add');
        Route::post('/category/add/form', 'addCategoryForm')->name('category.add.form');
        Route::get('/category/edit/{id}', 'editCategory')->name('category.edit');
        Route::post('/category/update/form', 'updateCategoryForm')->name('category.update.form');
        Route::get('/category/delete/{id}', 'deleteCategory')->name('category.delete');
    });

    // Sub Category route
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/subcategory/list', 'subCategoryList')->name('subcategory.list');
        Route::get('/subcategory/add', 'addSubCategory')->name('subcategory.add');
        Route::post('/subcategory/add/form', 'addSubCategoryForm')->name('subcategory.add.form');
        Route::get('/subcategory/edit/{id}', 'editSubCategory')->name('subcategory.edit');
        Route::post('/sub/update/form', 'updateSubCategoryForm')->name('sub.update');
        Route::get('/subcategory/delete/{id}', 'deleteSubCategory')->name('subcategory.delete');
        Route::get('/subcategories/ajax/{category_id}', 'subCategoryAjax');
    });

    // Product route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/list', 'productList')->name('product.list');
        Route::get('/product/status', 'productStatus');
        Route::get('/product/add', 'addProduct')->name('product.add');
        Route::post('/product/add/form', 'addProductForm')->name('product.add.form');
        Route::get('/product/edit/{id}', 'editProduct')->name('product.edit');
        Route::post('/product/update/form', 'updateProductForm')->name('product.update.form');
        Route::get('/product/delete/{id}', 'deleteProduct')->name('product.delete');
    });

    // Blog Category route
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('/blog/category/list', 'blogList')->name('blog.list');
        Route::get('/blog/category/add', 'addBlogCategory')->name('blog.category.add');
        Route::post('/blog/category/form', 'blogCategoryForm')->name('blog.category.form');
        Route::get('/blog/category/status', 'blogCategoryStatus');
        Route::get('/blog/category/edit/{id}', 'editBlogCategory')->name('blog.category.edit');
        Route::post('/blog/category/update/form', 'updateBlogCategory')->name('blog.category.update');
        Route::get('/blog/category/delete/{id}', 'deleteBlogCategory')->name('blog.category.delete');
    });

    // Blog Content route
    Route::controller(BlogContentController::class)->group(function () {
        Route::get('/content/list', 'contentList')->name('content.list');
        Route::get('/blog/content/status', 'blogContentStatus');
        Route::get('/blog/content/add', 'addBlogContent')->name('blog.content.add');
        Route::post('/blog/content/add/form', 'addBlogContentForm')->name('blog.content.add.form');
        Route::get('/blog/content/edit/{id}', 'editBlogContent')->name('blog.content.edit');
        Route::post('/blog/content/update/form', 'updateBlogContentForm')->name('blog.content.update.form');
        Route::get('/blog/content/delete/{id}', 'deleteBlogContent')->name('blog.content.delete');
    });

    // Permission route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/permission/list', 'permissionList')->name('permission.list');
        Route::get('/permission/add', 'addPermission')->name('permission.add');
        Route::post('/permission/form', 'permissionForm')->name('permission.add.form');
        Route::get('/permission/edit/{id}', 'editPermission')->name('permission.edit');
        Route::post('/permission/update', 'updatePermission')->name('permission.update.form');
        Route::get('/permission/delete/{id}', 'deletePermission')->name('permission.delete');
    });

    // Roles route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/role/list', 'roleList')->name('role.list');
        Route::get('/role/add', 'addRole')->name('role.add');
        Route::post('/role/form', 'roleForm')->name('role.add.form');
        Route::get('/role/edit/{id}', 'editRole')->name('role.edit');
        Route::post('/role/update', 'updateRole')->name('role.update');
        Route::get('/role/delete/{id}', 'deleteRole')->name('role.delete');
        
        // Role permission assignment
        Route::get('/role/permission/assign', 'assignRolePermission')->name('role.permission.assign');
        Route::post('/role/permission/grant', 'grantRolePermission')->name('permission.grant.form');
        Route::get('/role/permission/list', 'rolePermissionList')->name('role.permission.list');
        Route::get('/role/permission/edit/{id}', 'editRolePermission')->name('role.permission.edit');
        Route::post('/role/permission/update/{id}', 'updateRolePermission')->name('role.permission.update');
    });
});

// Front route
Route::get('/product/{id}/{url}', [FrontController::class, 'productDetail']);
Route::get('/category/{id}/{url}', [FrontController::class, 'categoryDetail']);
Route::get('/subcategory/{id}/{url}', [FrontController::class, 'subCategoryDetail']);
Route::get('/post/{id}/{url}', [FrontController::class, 'contentDetail']);
Route::get('/blog/{id}/{url}', [FrontController::class, 'categoryDetail']);
Route::get('/blog', [FrontController::class, 'allBlogs']);

// Language Switch Route
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

require __DIR__.'/auth.php';