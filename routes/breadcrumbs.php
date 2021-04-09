<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('page.index', 'dashboard'));
});

// Home > Administration > Accounts > LMS Accounts
Breadcrumbs::for('lms_accounts', function ($trail) {
    $trail->parent('administration');
    $trail->push('LMS Accounts', route('page.index', 'lms_accounts'));
});

// Home > LMS Accounts > Create Account
Breadcrumbs::for('lms_account_create', function ($trail) {
    $trail->parent('lms_accounts');
    $trail->push('Create Account', route('page.index', 'lms_account_create'));
});

// Home > LMS Accounts > Update Account
Breadcrumbs::for('lms_account_update', function ($trail) {
    $trail->parent('lms_accounts');
    $trail->push('Update Account', route('page.index', 'lms_account_update'));
});

// Home > Administraion
Breadcrumbs::for('administration', function ($trail) {
    $trail->parent('home');
    $trail->push('Administration', route('page.index', 'administration'));
});

// Home > Administration > Course > သင်တန်းအပတ်စဥ်
Breadcrumbs::for('သင်တန်းအပတ်စဥ်', function ($trail) {
    $trail->parent('administration');
    $trail->push('သင်တန်းအပတ်စဥ်', route('page.index', 'batch'));
});

// Home > Administration > Course > သင်တန်းအပတ်စဥ် > Create
Breadcrumbs::for('create_batch', function ($trail) {
    $trail->parent('သင်တန်းအပတ်စဥ်');
    $trail->push('Create', route('page.index', 'batch'));
});

// Home > Administration > Course > သင်တန်းအပတ်စဥ် > Update
Breadcrumbs::for('update_batch', function ($trail) {
    $trail->parent('သင်တန်းအပတ်စဥ်');
    $trail->push('Update', route('page.index', 'edit_batch'));
});

// Home > Administration > Course > သင်ကြားပေးသောသင်တန်းများ
Breadcrumbs::for('training', function ($trail) {
    $trail->parent('administration');
    $trail->push('သင်ကြားပေးသောသင်တန်းများ', route('page.index', 'training'));
});

// Home > Administration > Course > သင်ကြားပေးသောသင်တန်းများ > Edit
Breadcrumbs::for('edit_training_class', function ($trail) {
    $trail->parent('training');
    $trail->push('Edit', route('page.index', 'edit_training'));
});

// Home > Administration > Course > သင်တန်းအမျိုးအစားများ
Breadcrumbs::for('training_type', function ($trail) {
    $trail->parent('administration');
    $trail->push('Training Type', route('page.index', 'training_type'));
});

// Home > Administration > Course > သင်တန်းအမျိုးအစားများ > Edit
Breadcrumbs::for('edit_training_type', function ($trail) {
    $trail->parent('training_type');
    $trail->push('Edit', route('page.index', 'edit_training_type'));
});

// Home > Administraion > Manage Course & Category 
Breadcrumbs::for('course-category', function ($trail) {
    $trail->parent('administration');
    $trail->push('Manage Course & Category', route('page.index', 'manage_course_category'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});