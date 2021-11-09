<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('frontend.default'));
});

// Home > Blog
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, Category $cate) {
    $trail->parent('home');
    $trail->push($cate->name_seo, route('cate', ['alias' => $cate->alias]));
});

// Home > Cart
Breadcrumbs::for('shopping_cart', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Shopping Cart');
});
