<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\EmployeeEditForm;

class EmployeeEditCtrl {

    private $form;
    
    public function __construct() {
        $this->form = new EmployeeEditForm();
    }
    
        // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {

        $this->form->IDemployee = ParamUtils::getFromRequest('IDemployee', true, 'Błędne wywołanie aplikacji');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji');
        $this->form->role = ParamUtils::getFromRequest('role', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->phone_number = ParamUtils::getFromRequest('phone_number', true, 'Błędne wywołanie aplikacji');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'Błędne wywołanie aplikacji');
        $this->form->hire_date = ParamUtils::getFromRequest('hire_date', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->login))) {
            Utils::addErrorMessage('Nadaj login pracownika');
        }
        if (empty(trim($this->form->password))) {
            Utils::addErrorMessage('Nadaj hasło pracownika');
        }
        if (empty(trim($this->form->role))) {
            Utils::addErrorMessage('Nadaj rolę pracownika');
        }
        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię pracownika');
        }
        if (empty(trim($this->form->surname))) {
            Utils::addErrorMessage('Wprowadź nazwisko pracownika');
        }
        if (empty(trim($this->form->phone_number))) {
            Utils::addErrorMessage('Wprowadź numer telefonu');
        }
        if (empty(trim($this->form->email))) {
            Utils::addErrorMessage('Wprowadź email');
        }
        if (empty(trim($this->form->hire_date))) {
            Utils::addErrorMessage('Wprowadź datę zatrudnienia');
        }
        
        $d = \DateTime::createFromFormat('Y-m-d', $this->form->hire_date);
        if ($d === false) {
            Utils::addErrorMessage('Nieprawidłowy format daty. Przykład: 2015-12-20');
        }

        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }
    
    
    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy pracownikow (parametr jest wymagany)
        $this->form->IDemployee = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_employeeNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_employeeEdit() {
        // 1. walidacja id pracownika do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych pracownika o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("employee", "*",[
                    "IDemployee" => $this->form->IDemployee
                ]);
                // 2.1 jeśli pracownik istnieje to wpisz dane do obiektu formularza
                $this->form->IDemployee = $record['IDemployee'];
                $this->form->login = $record['login'];
                $this->form->password = $record['password'];
                $this->form->role = $record['role'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->phone_number = $record['phone_number'];
                $this->form->email = $record['email'];
                $this->form->hire_date = $record['hire_date'];         
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_employeeDelete() {
        // 1. walidacja id pracownika do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("employee", [
                    "IDemployee" => $this->form->IDemployee
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy pracowników
        App::getRouter()->forwardTo('employeeList');
    }

    public function action_employeeSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {
                //2.1 Nowy rekord
                if ($this->form->IDemployee == '') {
                    App::getDB()->insert("employee", [
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "role" => $this->form->role,
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "phone_number" => $this->form->phone_number,
                        "email" => $this->form->email,
                        "hire_date" => $this->form->hire_date,                        
                    ]);
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("employee", [
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "role" => $this->form->role,
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "phone_number" => $this->form->phone_number,
                        "email" => $this->form->email,
                        "hire_date" => $this->form->hire_date
                        ],[
                        "IDemployee" => $this->form->IDemployee
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy pracowników (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('employeeList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('EmployeeEditView.tpl');
    }
}
