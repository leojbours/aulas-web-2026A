<?php
require_once __DIR__ . '/../dao/PersonDao.php';
require_once __DIR__ . '/../model/Person.php';

class PersonController
{
    public function findAll() {
        $dao = new PersonDao();
        return $dao->findAll();
    }

    public function findById($id) {
        $dao = new PersonDao();
        return $dao->findById($id);
    }

    public function save() {
        $person = new Person(
            $_POST['name'],
            $_POST['adress_road'],
            $_POST['adress_number'],
            $_POST['cep'],
            $_POST['city'],
            $_POST['state']
        );
        $dao = new PersonDao();
        $dao->save($person);
    }

    public function edit($id) {
        $person = new Person(
            $_POST['name'],
            $_POST['adress_road'],
            $_POST['adress_number'],
            $_POST['cep'],
            $_POST['city'],
            $_POST['state']
        );
        $dao = new PersonDao();
        $dao->edit($person, $id);
    }

    public function delete($id) {
        $dao = new PersonDao();
        $dao->delete($id);
    }
}