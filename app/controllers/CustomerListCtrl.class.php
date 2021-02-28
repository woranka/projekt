<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CustomerSearchForm;

class CustomerListCtrl {
    
    private $form;
    private $records;
    
    public function __construct() {
        $this->form = new CustomerSearchForm();
    }

    public function validate() {  
        $this->form->surname = ParamUtils::getFromRequest('surname');
        $this->form->IDproduct = ParamUtils::getFromRequest('IDproduct');
        return !App::getMessages()->isError();
    }

    public function action_customerList() {

        $this->validate();

        $search_params = []; 
        if (isset($this->form->surname) && strlen($this->form->surname) > 0) {
            $search_params['surname[~]'] = $this->form->surname . '%'; 
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        $where ["ORDER"] = "surname";

        try {
            $this->records = App::getDB()->select("customer", [
                "[>]order" => "IDcustomer"
                ],[
                "IDcustomer",
                "order.IDorder",
                "name",
                "surname",
                "phone_number",
                "email",
                "city",
                "postal_code",
                "street_name",
                "street_number",
                "house_number"
                ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('customer', $this->records);
        App::getSmarty()->assign('IDproduct',$this->form->IDproduct);
        App::getSmarty()->display('CustomerListView.tpl');
    }
}
