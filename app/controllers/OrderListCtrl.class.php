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
        $this->form->IDproduct = ParamUtils::getFromRequest('IDproduct');
        return !App::getMessages()->isError();
    }

    public function action_orderList() {
        $this->validate();

        $search_params = []; 
        if (isset($this->form->IDproduct) && strlen($this->form->IDproduct) > 0) {
            $search_params['IDproduct[~]'] = $this->form->IDproduct . '%';
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        $where ["ORDER"] = ["order_date" => "desc"];

        try {
            $this->records = App::getDB()->select("order", [
                "[>]customer" => "IDcustomer",
                "[>]employee" => "IDemployee",
                "[>]product" => "IDproduct"
                ],[
                    "customer.IDcustomer",
                    "customer.surname",
                    "customer.name",
                    "employee.IDemployee",
                    "employee.surname(surname_e)",
                    "employee.name(name_e)",
                    "product.IDproduct",
                    "product.product_name",
                    "order.IDorder",
                    //"order.order_number",
                    "order.order_date",
                    "order.order_completed",
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


