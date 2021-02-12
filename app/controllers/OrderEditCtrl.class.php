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
        $this->form->IDcustomer = ParamUtils::getFromRequest('IDcustomer', true, 'Błędne wywołanie aplikacji');
        $this->form->IDproduct = ParamUtils::getFromRequest('IDproduct', true, 'Błędne wywołanie aplikacji');  
    }
    
    /*
    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        $this->form->IDorder = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_orderNew() {
        $this->generateView();
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
                $this->form->order_completed = $record['order_completed'];
                        
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
    */
    public function action_orderSave() {
        $this->validateSave();
                
        try {
            //Nowe zamówienie
            App::getDB()->insert("order", [
                "IDemployee" => SessionUtils::load('IDemployee', true),
                "IDcustomer" => $this->form->IDcustomer,
                "IDproduct" => $this->form->IDproduct,
                "order_number" => null,
                "order_completed" => $this->form->order_completed                      
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

            $order_id = App::getDB()->id();
            Utils::addInfoMessage('Pomyślnie zapisano zamówienie');

        //Aktualizacja produktu
        try {
            App::getDB()->update("product", [
                "status" => 'N'
            ],[
                "IDproduct" => $this->form->IDproduct
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas aktualizacji');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        //Aktualizacja klienta
        try {    
            App::getDB()->update("customer", [
                "IDorder" => $order_id
            ],[
                "IDcustomer" => $this->form->IDcustomer
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas aktualizacji');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getRouter()->redirectTo('orderList');
    }
}

