<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('start'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('start', 'StartCtrl');
//Utils::addRoute('action_name', 'controller_class_name');

Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('loginShow',     'LoginCtrl');

Utils::addRoute('productList',   'ProductListCtrl');
Utils::addRoute('productNew',    'ProductEditCtrl', ['user','admin']);
Utils::addRoute('productEdit',   'ProductEditCtrl', ['user','admin']);
Utils::addRoute('productDelete', 'ProductEditCtrl', ['admin']);
Utils::addRoute('productSave',   'ProductEditCtrl', ['user','admin']);

Utils::addRoute('orderList',     'OrderListCtrl');
Utils::addRoute('orderNew',      'OrderEditCtrl',   ['user','admin']);
Utils::addRoute('orderEdit',     'OrderEditCtrl',   ['user','admin']);
Utils::addRoute('orderDelete',   'OrderEditCtrl',   ['admin']);
Utils::addRoute('orderSave',     'OrderEditCtrl',   ['user','admin']);


