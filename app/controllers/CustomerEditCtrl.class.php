<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CustomerEditForm;

class CustomerEditCtrl {
    
    private $form;
    
    public function __construct() {
        $this->form = new CustomerEditForm();
    }
    
        // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {

        $this->form->IDcustomer = ParamUtils::getFromRequest('IDcustomer', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->phone_number = ParamUtils::getFromRequest('phone_number', true, 'Błędne wywołanie aplikacji');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'Błędne wywołanie aplikacji');
        $this->form->city = ParamUtils::getFromRequest('city', true, 'Błędne wywołanie aplikacji');
        $this->form->postal_code = ParamUtils::getFromRequest('postal_code', true, 'Błędne wywołanie aplikacji');
        $this->form->street_name = ParamUtils::getFromRequest('street_name', true, 'Błędne wywołanie aplikacji');
        $this->form->street_number = ParamUtils::getFromRequest('street_number', true, 'Błędne wywołanie aplikacji');
        $this->form->house_number = ParamUtils::getFromRequest('house_number', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię klienta');
        }
        if (empty($this->form->surname)) {
            Utils::addErrorMessage('Wprowadź nazwisko klienta');
        }
        if (empty(trim($this->form->phone_number))) {
            Utils::addErrorMessage('Wprowadź numer telefonu');
        }
        if (empty(trim($this->form->email))) {
            Utils::addErrorMessage('Wprowadź email');
        }
        if (empty(trim($this->form->city))) {
            Utils::addErrorMessage('Wprowadź miasto');
        }
        if (empty(trim($this->form->postal_code))) {
            Utils::addErrorMessage('Wprowadź kod pocztowy');
        }
        if (empty(trim($this->form->street_name))) {
            Utils::addErrorMessage('Wprowadź ulicę');
        }
        if (empty(trim($this->form->street_number))) {
            Utils::addErrorMessage('Wprowadź numer budynku');
        }

        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }
    
    
    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy klientow (parametr jest wymagany)
        $this->form->IDcustomer = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_customerNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_customerEdit() {
        // 1. walidacja id klienta do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych klienta o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("customer", "*",[
                    "IDcustomer" => $this->form->IDcustomer
                ]);
                // 2.1 jeśli klient istnieje to wpisz dane do obiektu formularza
                $this->form->IDcustomer = $record['IDcustomer'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->phone_number = $record['phone_number'];
                $this->form->email = $record['email'];
                $this->form->city = $record['city'];
                $this->form->postal_code = $record['postal_code'];
                $this->form->street_name = $record['street_name'];
                $this->form->street_number = $record['street_number'];
                $this->form->house_number = $record['house_number'];
                 
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_customerDelete() {
        // 1. walidacja id klienta do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("customer", [
                    "IDcustomer" => $this->form->IDcustomer
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy klientów
        App::getRouter()->forwardTo('customerList');
    }

    public function action_customerSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {
                //2.1 Nowy rekord
                if ($this->form->IDcustomer == '') {
                    App::getDB()->insert("customer", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "phone_number" => $this->form->phone_number,
                        "email" => $this->form->email,
                        "city" => $this->form->city,
                        "postal_code" => $this->form->postal_code,
                        "street_name" => $this->form->street_name,
                        "street_number" => $this->form->street_number,
                        "house_number" => $this->form->house_number
                    ]);
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("customer", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "phone_number" => $this->form->phone_number,
                        "email" => $this->form->email,
                        "city" => $this->form->city,
                        "postal_code" => $this->form->postal_code,
                        "street_name" => $this->form->street_name,
                        "street_number" => $this->form->street_number,
                        "house_number" => $this->form->house_number
                            ], [
                        "IDcustomer" => $this->form->IDcustomer
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy klientów (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('customerList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('CustomerEditView.tpl');
    }
}
