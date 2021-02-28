<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\OrderSearchForm;

class OrderListCtrl {
    
    private $form;
    private $records;
    
    public function __construct() {
        $this->form = new OrderSearchForm();
    }

    public function validate() {
        $this->form->IDcustomer = ParamUtils::getFromRequest('IDcustomer');
        return !App::getMessages()->isError();
    }

    public function action_orderList() {
        $this->validate();

        $search_params = []; 
        if (isset($this->form->IDcustomer) && strlen($this->form->IDcustomer) > 0) {
            $search_params['IDcustomer[~]'] = $this->form->IDcustomer . '%';
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        $where ["ORDER"] = "order_date";

        try {
            $this->records = App::getDB()->select("order", [
                "[>]customer" => "IDcustomer",
                "[>]employee" => "IDemployee",
                "[>]product" => "IDproduct"
                ],[
                    "customer.IDcustomer",
                    "employee.surname",
                    "product.product_name",
                    "product.price",
                    "order.IDorder",
                    "order.order_number",
                    "order.order_date",
                    "order.status",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('order', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('OrderListView.tpl');
    }  
}


