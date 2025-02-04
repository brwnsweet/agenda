<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container">
        <div class="container-fluid banner">
            <div class="container text-center">
                <h4 class="display-6 mt-4">Welcome to My Agenda Page</h4>
            </div>
        </div>

        <a href="add.php">
            <button type="button" class="btn btn-success w-100 mt-4">Add +</button>
        </a>

        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Agenda Location</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
    <?php
    $sql = "SELECT * FROM tb_agenda ORDER BY date ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['day']) . "</td>
                    <td>" . htmlspecialchars($row['date']) . "</td>
                    <td>" . htmlspecialchars($row['time']) . "</td>
                    <td>" . htmlspecialchars($row['agenda']) . "</td>
                    <td>
                        <a href='edit.php?date=" . $row['date'] . "' class='btn btn-warning'><i class='bi bi-pencil-square'> Update</i></a>
                        <a href='del.php?date=" . $row['date'] . "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus agenda ini?\")'><i class=' bi bi-trash3-fill'></i> Delete</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='5' class='text-center'>Tidak ada agenda</td></tr>";
    }
    ?>
</tbody>
        </table>
    </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</html>
