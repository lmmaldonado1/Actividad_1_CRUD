<?php
include_once __DIR__ . '/../models/BdConnection.php';

class EditController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new BdConnection();
    }

    public function editUser($id) {
        $conn = $this->dbConnection->getConnection();

        if (isset($_POST["submit"])) {
            $name = $_POST['name'];
            $school = $_POST['school'];
            $course = $_POST['course'];
            $gender = $_POST['gender'];

            $sql = "UPDATE `crud` SET `name`='$name',`school`='$school',`course`='$course',`gender`='$gender' WHERE id = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?msg=Updated successfully");
                exit();
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        }
    }

    public function getEditUserData($id) {
        $conn = $this->dbConnection->getConnection();
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
}

$editController = new EditController();
$id = $_GET["id"];
$editController->editUser($id);
$userData = $editController->getEditUserData($id);
