<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Agenda List</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Date</th>
                    <th>Agenda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_agenda ORDER BY date ASC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['day']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['agenda']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No agenda found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
