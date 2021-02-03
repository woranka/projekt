<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\ProductEditForm;

class ProductEditCtrl {
    
    private $form;
    
    public function __construct() {
        $this->form = new ProductEditForm();
    }
    
        // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->IDproduct = ParamUtils::getFromRequest('IDproduct', true, 'Błędne wywołanie aplikacji');
        $this->form->product_name = ParamUtils::getFromRequest('product_name', true, 'Błędne wywołanie aplikacji');
        $this->form->price = ParamUtils::getFromRequest('price', true, 'Błędne wywołanie aplikacji');
        $this->form->quantity = ParamUtils::getFromRequest('quantity', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->product_name))) {
            Utils::addErrorMessage('Wprowadź nazwę produktu');
        }
        if (empty(trim($this->form->price))) {
            Utils::addErrorMessage('Wprowadź cenę produktu');
        }
        if (empty(trim($this->form->quantity))) {
            Utils::addErrorMessage('Wprowadź ilość');
        }

        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }
    
    
    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy produktow (parametr jest wymagany)
        $this->form->IDproduct = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_productNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_productEdit() {
        // 1. walidacja id produktu do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych produktu o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("product", "*", [
                    "IDproduct" => $this->form->IDproduct
                ]);
                // 2.1 jeśli produkt istnieje to wpisz dane do obiektu formularza
                $this->form->IDproduct = $record['IDproduct'];
                $this->form->product_name = $record['product_name'];
                $this->form->price = $record['price'];
                $this->form->quantity = $record['quantity'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_productDelete() {
        // 1. walidacja id produktu do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("product", [
                    "IDproduct" => $this->form->IDproduct
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('productList');
    }

    public function action_productSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->IDproduct == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("product");
                    if ($count <= 20) {
                        App::getDB()->insert("product", [
                            "product_name" => $this->form->product_name,
                            "price" => $this->form->price,
                            "quantity" => $this->form->quantity,
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("product", [
                        "product_name" => $this->form->product_name,
                        "price" => $this->form->price,
                        "quantity" => $this->form->quantity,
                            ], [
                        "IDproduct" => $this->form->IDproduct
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy produktów (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('productList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('ProductEditView.tpl');
    }
}
