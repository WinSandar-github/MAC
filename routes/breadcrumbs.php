<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('page.index', 'dashboard'));
});


// Home > Administraion
Breadcrumbs::for('administration', function ($trail) {
    $trail->parent('home');
    $trail->push('Administration', route('page.index', 'administration'));
});

// Home > Teacher
Breadcrumbs::for('teacher_registration', function ($trail) {
    $trail->parent('home');
    $trail->push('Teacher', route('page.index', 'teacher_registration'));
});

// Home > QT Application
Breadcrumbs::for('qt_application_registration', function ($trail) {
    $trail->parent('home');
    $trail->push('QT Application', route('page.index', 'qt_application_registration'));
});

// Home > Article
Breadcrumbs::for('article', function ($trail) {
    $trail->parent('home');
    $trail->push('Article', route('page.index', 'article'));
});
