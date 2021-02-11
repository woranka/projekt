<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('start'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('start',            'StartCtrl');

Utils::addRoute('login',            'LoginCtrl');
Utils::addRoute('logout',           'LoginCtrl');
Utils::addRoute('loginShow',        'LoginCtrl');

Utils::addRoute('productList',      'ProductListCtrl');
Utils::addRoute('productNew',       'ProductEditCtrl',    ['user','admin']);
Utils::addRoute('productEdit',      'ProductEditCtrl',    ['user','admin']);
Utils::addRoute('productDelete',    'ProductEditCtrl',    ['user','admin']);
Utils::addRoute('productSave',      'ProductEditCtrl',    ['user','admin']);

Utils::addRoute('orderList',        'OrderListCtrl',      ['user','admin']);
Utils::addRoute('orderNew',         'OrderEditCtrl',      ['user','admin']);
Utils::addRoute('orderEdit',        'OrderEditCtrl',      ['user','admin']);
Utils::addRoute('orderDelete',      'OrderEditCtrl',      ['user','admin']);
Utils::addRoute('orderSave',        'OrderEditCtrl',      ['user','admin']);

Utils::addRoute('customerList',     'CustomerListCtrl',   ['user','admin']);
Utils::addRoute('customerNew',      'CustomerEditCtrl',   ['user','admin']);
Utils::addRoute('customerEdit',     'CustomerEditCtrl',   ['user','admin']);
Utils::addRoute('customerDelete',   'CustomerEditCtrl',   ['user','admin']);
Utils::addRoute('customerSave',     'CustomerEditCtrl',   ['user','admin']);

Utils::addRoute('employeeList',     'EmployeeListCtrl',   ['admin']);
Utils::addRoute('employeeNew',      'EmployeeEditCtrl',   ['admin']);
Utils::addRoute('employeeEdit',     'EmployeeEditCtrl',   ['admin']);
Utils::addRoute('employeeDelete',   'EmployeeEditCtrl',   ['admin']);
Utils::addRoute('employeeSave',     'EmployeeEditCtrl',   ['admin']);

