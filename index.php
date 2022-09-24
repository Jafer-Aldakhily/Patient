<?php
$pageTitle = "Landing Page";
require_once './db.php';

$sql = "select * from patients";
$query = $conn->prepare($sql);
$patients = $query->execute();
$patients = $query->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once "./head.php";
?>

<body>

    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="create.php" class="btn btn-primary">Add new patient</a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($patients as $patient) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row py-3">
                                <div class="col-md-8">
                                    <h2>Name : <?php echo $patient->Name ?></h2>
                                </div>
                                <div class="offset-md-2 col-md-2 pt-2">
                                    <a href="./delete.php?id=<?php echo $patient->id ?>" class="text-danger"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    Patient Id : <?php echo $patient->id ?>
                                </div>
                                <div class="offset-md-2 col-md-2">
                                    <a href="./update.php?id=<?php echo $patient->id ?>" class="text-info">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>

                                <div class="col-md-2">
                                    <a href="./view.php?id=<?php echo $patient->id ?>" class="text-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



</body>

</html>