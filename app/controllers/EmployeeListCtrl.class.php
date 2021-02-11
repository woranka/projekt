<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\EmployeeSearchForm;

class EmployeeListCtrl {
    
    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new EmployeeSearchForm();
    }

    public function validate() {
        $this->form->surname = ParamUtils::getFromRequest('surname');
        return !App::getMessages()->isError();
    }

    public function action_employeeList() {
        
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
            $this->records = App::getDB()->select("employee", [
                "IDemployee",
                "login",
                "password",
                "role",
                "name",
                "surname",
                "phone_number",
                "email",
                "hire_date"
                ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('employee', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('EmployeeListView.tpl');
    }  
}
