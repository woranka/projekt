<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\ProductSearchForm;

class StartCtrl {
    
    private $form;
    private $records;
    
    public function __construct() {
        $this->form = new ProductSearchForm();
    }

    public function validate() {

        $this->form->product_name = ParamUtils::getFromRequest('product_name');

        return !App::getMessages()->isError();
    }
    
    public function action_start() {	

        $this->validate();

        $search_params = [];
        if (isset($this->form->product_name) && strlen($this->form->product_name) > 0) {
            $search_params['product_name[~]'] = $this->form->product_name . '%';
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }

        $where ["ORDER"] = "product_name";

        try {
            $this->records = App::getDB()->select("product", [
                "IDproduct",
                "product_name",
                "category",
                "price",
                "quantity",
                ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('product', $this->records);
        App::getSmarty()->display("StartView.tpl");   
    }
    
}
