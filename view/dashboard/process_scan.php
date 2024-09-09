<?php
include '../../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shift = $_POST['shift'];
    $target = $_POST['target'];
    $supervisor = $_POST['supervisor'];
    $noreg = $_POST['noreg'];

    try {
        $sql = "INSERT INTO  (shift, target, supervisor, noreg) VALUES (:shift, :target, :supervisor, :noreg)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':shift' => $shift,
            ':target' => $target,
            ':supervisor' => $supervisor,
            ':noreg' => $noreg,
        ]);

        echo "Data successfully inserted!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
