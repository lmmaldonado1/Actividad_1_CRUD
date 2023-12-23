<?php
include_once __DIR__ . '/../models/BdConnection.php';

class AddController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new BdConnection();
    }

    public function addNewUser() {
        $conn = $this->dbConnection->getConnection();

        if (isset($_POST["submit"])) {
            $name = $_POST['name'];
            $school = $_POST['school'];
            $course = $_POST['course'];
            $gender = $_POST['gender'];

            $sql = "INSERT INTO `crud`(`id`, `name`, `school`, `course`, `gender`) VALUES (NULL,'$name','$school','$course','$gender')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?msg=Created successfully");
                exit();
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        }
    }
}

$addController = new AddController();
$addController->addNewUser();
