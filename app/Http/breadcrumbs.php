<?php
/**
 * Created by PhpStorm.
 * User: savorn
 * Date: 10/15/2016
 * Time: 1:54 AM
 */
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});
/*Table*/
Breadcrumbs::register('table', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tables', route('table.index'));
});
Breadcrumbs::register('createtable', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->parent('table');
    $breadcrumbs->push('Create', route('table.create'));
});

/*Item*/

Breadcrumbs::register('item', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Item', route('item.index'));
});
/*Category*/
Breadcrumbs::register('category', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Category', route('category.index'));
});
//Customer
Breadcrumbs::register('customer', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Customer', route('customer.index'));
});
//Supplier
Breadcrumbs::register('supplier', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Supplier', route('supplier.index'));
});
//Exchange
Breadcrumbs::register('exchange', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Exchange', route('exchange.index'));
});
//Order
Breadcrumbs::register('order', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Order', route('order.index'));
});
//Purchase
Breadcrumbs::register('purchase', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Purchase', route('purchase.index'));
});

//Promotion
Breadcrumbs::register('promotion', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Promotion', route('promotion.index'));
});

//User
Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Employee Group', route('user.index'));
});