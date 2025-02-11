<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Agenda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
  <div class="w-50 mx-auto border p-3 mt-5">
    <form action="add.php" method="post" enctype="multipart/form-data">
      <label for="hari">Hari</label>
      <select name="day" id="day" class="form-select mt-2" required>
        <option>Choose Day</option>
        <option value="monday">Monday</option>
        <option value="tuesday">Tuesday</option>
        <option value="wednesday">Wednesday</option>
        <option value="thursday">Thurday</option>
        <option value="friday">Friday</option>
        <option value="saturday">Saturday</option>
        <option value="sunday">Sunday</option>
      </select><br>
      <label for="date">Date</label>
      <input type="date" id="date" name="date" class="form-control mt-2" required><br>
      <label for="time">Time</label>
      <input type="time" id="time" name="time" class="form-control mt-2" required><br>
      <label for="agenda">Agenda</label>
      <textarea id="agenda" name="agenda" class="form-control mt-2" rows="5" required></textarea>
      <label for="location">Location</label>
      <input id="location" name="location" class="form-control mt-2" rows="5" required></input>
      <input class="btn btn-success mt-3" type="submit" name="add" value="Add new data">
      <a href="index.php" button class="btn btn-secondary mt-3" type="submit">Cancel</a></button>
    </form>
  </div>

  <?php
include 'koneksi.php';

if (isset($_POST['add'])) { 
    $day = $_POST['day'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $agenda = $_POST['agenda'];
    $location = $_POST['location'];

    // Cek apakah data dengan tanggal yang sama sudah ada di database
    $checkSql = "SELECT * FROM tb_agenda WHERE date = '$date'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // Jika tanggal sudah ada, beri peringatan dan jangan insert
        echo "<script>
                alert('Agenda pada tanggal $date sudah ada! Silakan pilih tanggal lain.');
                window.location.href = 'add.php';
              </script>";
    } else {
        // Jika tidak ada data dengan tanggal yang sama, tambahkan ke database
        $sqlInsert = "INSERT INTO tb_agenda (day, date, time, agenda, location) VALUES ('$day', '$date', '$time', '$agenda', '$location')";
        $result = mysqli_query($conn, $sqlInsert);

        if ($result) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menambahkan data!');
                    window.location.href = 'add.php';
                  </script>";
        }
    }
}
?>


