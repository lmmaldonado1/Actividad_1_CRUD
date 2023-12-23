<?php
include_once __DIR__ . '/../models/BdConnection.php';

class IndexController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new BdConnection();
    }

    public function renderView() {
        $conn = $this->dbConnection->getConnection();

        include_once __DIR__ . '/../views/index_view.php';
    }
}

$indexController = new IndexController();
$indexController->renderView();
