<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\OrderEditForm;

class OrderEditCtrl {
    
    private $form;
    
    public function __construct() {
        $this->form = new OrderEditForm();
    }
    
        // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->IDorder = ParamUtils::getFromRequest('IDorder', true, 'Błędne wywołanie aplikacji');
        $this->form->order_number = ParamUtils::getFromRequest('order_number', true, 'Błędne wywołanie aplikacji');
        $this->form->order_completed = ParamUtils::getFromRequest('order_completed', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->order_number))) {
            Utils::addErrorMessage('Wprowadź numer zamówienia');
        }
        if (empty(trim($this->form->order_completed))) {
            Utils::addErrorMessage('Wprowadź status zamówienia');
        }

        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }
    
    
    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy zamowien (parametr jest wymagany)
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

    public function action_orderSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->IDorder == '') {
                    App::getDB()->insert("order", [
                        "order_number" => $this->form->order_number,
                        "order_completed" => $this->form->order_completed,
                    ]);
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("order", [
                        "order_number" => $this->form->order_number,
                        "order_completed" => $this->form->order_completed,
                            ], [
                        "IDorder" => $this->form->IDorder
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy zamówień (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('orderList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('OrderEditView.tpl');
    }
}

