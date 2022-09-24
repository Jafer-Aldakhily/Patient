<?php
$pageTitle = "Create Page";
require_once './db.php';
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
                    Create A New Patient
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Patient Name : </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Patient Age : </label>
                        <input type="number" class="form-control" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Patient Address : </label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];

    $sql = "insert into patients (Name,Age,Address) values (:name,:age,:address)";
    $query = $conn->prepare($sql);
    $query->bindParam(":name", $name, PDO::PARAM_STR);
    $query->bindParam(":age", $age, PDO::PARAM_STR);
    $query->bindParam(":address", $address, PDO::PARAM_STR);
    $query->execute();

    header("Location: index.php");
}




?>