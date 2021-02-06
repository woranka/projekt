<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\ProductSearchForm;

class ProductListCtrl {
    
    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new ProductSearchForm();
    }

    public function validate() {
        $this->form->product_name = ParamUtils::getFromRequest('product_name');
        return !App::getMessages()->isError();
    }

    public function action_productList() {
        
        $this->validate();

        $search_params = [];
        if (isset($this->form->product_name) && strlen($this->form->product_name) > 0) {   
            $search_params['product_name[~]'] = $this->form->product_name . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
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
                    "status"
                ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('product', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('ProductListView.tpl');
    }  
}
