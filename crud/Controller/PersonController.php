<?php

namespace CRUD\Controller;

use CRUD\Helper\PersonHelper;
use CRUD\Model\Actions;
use CRUD\Model\Person;

class PersonController
{
    public function switcher($uri, $request)
    {
        switch ($uri) {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }

    public function createAction($request)
    {
        $personHelper = new PersonHelper();
        $person = new Person();
        $person->setFirstName($request["firstName"]);
        $person->setLastName($request["lastName"]);
        $person->setUsername($request["username"]);
        if ($personHelper->insert($person)) {
            echo "Successful create";
        } else {
            echo "Failed create";
        }
    }

    public function updateAction($request)
    {
        $personHelper = new PersonHelper();
        $person = new Person();
        $person->setId($request["id"]);
        $person->setFirstName($request["firstName"]);
        $person->setLastName($request["lastName"]);
        $person->setUsername($request["username"]);
        if ($personHelper->update($person)) {
            echo "Successful update";
        } else {
            echo "Failed update";
        }
    }

    public function readAction($request)
    {
        echo $request['id'];
        echo $_GET['id'];
        $personHelper = new PersonHelper();
        $personHelper->fetch($request['id']);
    }

    public function readAllAction($request)
    {
        $personHelper = new PersonHelper();
        $personHelper->fetchAll();
    }

    public function deleteAction($request)
    {
        $personHelper = new PersonHelper();
        $personHelper->delete();
    }
}
