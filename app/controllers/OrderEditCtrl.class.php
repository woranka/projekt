<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\SessionUtils;
use app\forms\OrderEditForm;

class OrderEditCtrl {
    
    private $form;
    
    public function __construct() {
        $this->form = new OrderEditForm();
    }
    
    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() { 

        $this->form->IDorder = ParamUtils::getFromRequest('IDorder');
        $this->form->IDcustomer = ParamUtils::getFromRequest('IDcustomer', true, 'Błędne wywołanie aplikacji');
        $this->form->IDproduct = ParamUtils::getFromRequest('IDproduct', true, 'Błędne wywołanie aplikacji');
        $this->form->IDemployee = ParamUtils::getFromRequest('IDemployee');
        $this->form->order_number = ParamUtils::getFromRequest('order_number');
        $this->form->order_date = ParamUtils::getFromRequest('order_date');
        $this->form->status = ParamUtils::getFromRequest('status');
        
        if (App::getMessages()->isError())
            return false;
        
        return !App::getMessages()->isError();
        
    }
    
    public function action_orderSave() {
        //$this->validateSave();
        if ($this->validateSave()) {
            try {
                //Nowe zamówienie
                if ($this->form->IDorder == '') {
                    App::getDB()->insert("order", [
                        "IDemployee" => SessionUtils::load('IDemployee', true),
                        "IDcustomer" => $this->form->IDcustomer,
                        "IDproduct" => $this->form->IDproduct,
                        "order_number" => null,
                        "status" => 0                      
                    ]);
                } else {
                    //Edycja rekordu o danym ID
                    App::getDB()->update("order", [
                        "IDemployee" => $this->form->IDemployee,
                        "IDcustomer" => $this->form->IDcustomer,
                        "IDproduct" => $this->form->IDproduct,
                        "order_number" => $this->form->order_number,
                        "order_date" => $this->form->order_date,
                        "status" => $this->form->status,
                        ],[
                        "IDorder" => $this->form->IDorder
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano zamówienie');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu zamówienia');
                Utils::addWarningMessage(var_export($this->form,true));
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        //Aktualizacja produktu
        try {
            App::getDB()->update("product", [
                "quantity[-]" => 1
            ],[
                "IDproduct" => $this->form->IDproduct
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas aktualizacji');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('orderList');
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        $this->form->IDorder = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_orderEdit() {
        // 1. walidacja id zamówienia do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych zamówienia o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("order", "*", [
                    "IDorder" => $this->form->IDorder
                ]);
                // 2.1 jeśli zamówienie istnieje to wpisz dane do obiektu formularza
                $this->form->IDorder = $record['IDorder'];
                $this->form->IDcustomer = $record['IDcustomer'];
                $this->form->IDemployee = $record['IDemployee'];
                $this->form->IDproduct = $record['IDproduct'];
                $this->form->order_number = $record['order_number'];
                $this->form->order_date = $record['order_date'];
                $this->form->status = $record['status'];
                        
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_orderDelete() {
        // 1. walidacja id zamowienia do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("order", [
                    "IDorder" => $this->form->IDorder
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy zamówień
        App::getRouter()->forwardTo('orderList');
    }
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('OrderEditView.tpl');
    }
}