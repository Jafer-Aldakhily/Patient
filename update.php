<?php
$pageTitle = "Update Page";
require_once './db.php';

$id = $_GET["id"];

$sql = "select * from patients where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$patient = $query->execute();
$patient = $query->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">

<?php
require_once "./head.php";
?>


<body>

    <div class="container mt-5">
        <div class="row mb-5">
            <div class="offset-md-4 col-md-4">
                <h1>
                    Update Patient's Information
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label class="form-label">Patient Name : </label>
                        <input type="text" class="form-control" name="name" value="<?php echo $patient->Name ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Patient Age : </label>
                        <input type="number" class="form-control" name="age" value="<?php echo $patient->Age ?>">
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Patient Address : </label>
                        <input type="text" class="form-control" name="address" value="<?php echo $patient->Address ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>


<?php

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];

    $sql = "update patients set Name = :name, Age = :age, Address = :address where id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_STR);
    $query->bindParam(":name", $name, PDO::PARAM_STR);
    $query->bindParam(":age", $age, PDO::PARAM_STR);
    $query->bindParam(":address", $address, PDO::PARAM_STR);
    $query->execute();

    header("Location: index.php");
}
