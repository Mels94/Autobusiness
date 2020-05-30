<?php
/*return array(
    'admin/category/view/([1-9]+)' => 'admin/category/view/$1',
    'admin/category/update/([1-9]+)' => 'admin/category/update/$1',
    'admin/category/delete/([1-9]+)' => 'admin/category/delete/$1',
    'admin/category/create' => 'admin/category/create',
    'admin/category' => 'admin/category/index',
    'admin' => 'admin/dashboard/index',
    'error' => 'site/error',
    'user/login' => 'user/login',
    'user/register' => 'user/register',
    'site/contact' => 'site/contact',
    '' => 'site/index',
);*/

return [
    'user/login' => [
        'controller' => 'user',
        'action' => 'login'
    ],
    'user/register' => [
        'controller' => 'user',
        'action' => 'register'
    ],
    'user/profile' => [
        'controller' => 'user',
        'action' => 'profile'
    ],
    'user/delete' => [
        'controller' => 'user',
        'action' => 'delete'
    ],
    'logout' => [
        'controller' => 'site',
        'action' => 'logout'
    ],
    'error' => [
        'controller' => 'site',
        'action' => 'error'
    ],
    'site/category/([0-9]+)' => [
        'controller' => 'site',
        'action' => 'category'
    ],
    'site/product' => [
        'controller' => 'site',
        'action' => 'product'
    ],
    'site/contact' => [
        'controller' => 'site',
        'action' => 'contact'
    ],
    'site/about' => [
        'controller' => 'site',
        'action' => 'about'
    ],
    'site/cart' => [
        'controller' => 'site',
        'action' => 'cart'
    ],
    'site/checkout' => [
        'controller' => 'site',
        'action' => 'checkout'
    ],
    'site/single_car/([0-9]+)' => [
        'controller' => 'site',
        'action' => 'single_car'
    ],
    '' => [
        'controller' => 'site',
        'action' => 'index'
    ],
    //admin dashboard
    'admin' => [
        'controller' => 'dashboard',
        'action' => 'index'
    ],
    'admin/dashboard/index' => [
        'controller' => 'dashboard',
        'action' => 'index'
    ],
    'admin/dashboard/login' => [
        'controller' => 'dashboard',
        'action' => 'login'
    ],
    'admin/dashboard/profile' => [
        'controller' => 'dashboard',
        'action' => 'profile'
    ],
    'admin/dashboard/search' => [
        'controller' => 'dashboard',
        'action' => 'search'
    ],
    //admin category
    'admin/category/index' => [
        'controller' => 'category',
        'action' => 'index'
    ],
    'admin/category/create' => [
        'controller' => 'category',
        'action' => 'create'
    ],
    'admin/category/update/([0-9]+)' => [
        'controller' => 'category',
        'action' => 'update'
    ],
    'admin/category/view/([0-9]+)' => [
        'controller' => 'category',
        'action' => 'view'
    ],
    'admin/category/delete' => [
        'controller' => 'category',
        'action' => 'delete'
    ],
    //admin product
    'admin/product/index' => [
        'controller' => 'product',
        'action' => 'index'
    ],
    'admin/product/create' => [
        'controller' => 'product',
        'action' => 'create'
    ],
    'admin/product/view/([0-9]+)' => [
        'controller' => 'product',
        'action' => 'view'
    ],
    'admin/product/update/([0-9]+)' => [
        'controller' => 'product',
        'action' => 'update'
    ],
    'admin/product/delete' => [
        'controller' => 'product',
        'action' => 'delete'
    ],
    //admin order
    'admin/order/index' => [
        'controller' => 'order',
        'action' => 'index'
    ],
    'admin/order/view/([0-9]+)' => [
        'controller' => 'order',
        'action' => 'view'
    ],
    'admin/order/update/([0-9]+)' => [
        'controller' => 'order',
        'action' => 'update'
    ],
    'admin/order/updateIsNew' => [
        'controller' => 'order',
        'action' => 'updateIsNew'
    ],
    'admin/order/isNew' => [
        'controller' => 'order',
        'action' => 'isNew'
    ],
    'admin/order/delete' => [
        'controller' => 'order',
        'action' => 'delete'
    ],
    //admin contact
    'admin/contact/index' => [
        'controller' => 'contact',
        'action' => 'index'
    ],
    'admin/contact/mail' => [
        'controller' => 'contact',
        'action' => 'mail'
    ],
    'admin/contact/update' => [
        'controller' => 'contact',
        'action' => 'update'
    ],
    'admin/contact/isNew' => [
        'controller' => 'contact',
        'action' => 'isNew'
    ],
    'admin/contact/delete' => [
        'controller' => 'contact',
        'action' => 'delete'
    ],
];

