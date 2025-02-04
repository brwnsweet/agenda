<?php
include 'koneksi.php';

if (isset($_GET['date'])) {
    $date = $_GET['date'];

    // Ambil data berdasarkan no
    $sql = "SELECT * FROM tb_agenda WHERE date = '$date'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "<script>
                alert('Data tidak ditemukan!');
                window.location.href = 'index.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('No agenda tidak ditemukan!');
            window.location.href = 'index.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Agenda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="w-50 mx-auto border p-3 mt-5">
    <h4 class="mb-3">Edit Agenda</h4><br>
    <form action="" method="post">
      

      <label for="day">Day</label>
      <select name="day" id="day" class="form-select mt-2" required>
        <option value="monday" <?php if ($row['day'] == 'monday') echo 'selected'; ?>>Monday</option>
        <option value="tuesday" <?php if ($row['day'] == 'tuesday') echo 'selected'; ?>>Tuesday</option>
        <option value="wednesday" <?php if ($row['day'] == 'wednesday') echo 'selected'; ?>>Wednesday</option>
        <option value="thursday" <?php if ($row['day'] == 'thursday') echo 'selected'; ?>>Thursday</option>
        <option value="friday" <?php if ($row['day'] == 'friday') echo 'selected'; ?>>Friday</option>
        <option value="saturday" <?php if ($row['day'] == 'saturday') echo 'selected'; ?>>Saturday</option>
        <option value="sunday" <?php if ($row['day'] == 'sunday') echo 'selected'; ?>>Sunday</option>
      </select><br>

      <label for="date">Date</label>
      <input type="date" id="date" name="date" class="form-control mt-2" value="<?php echo $row['date']; ?>" required><br>

      <label for="time">Time</label>
      <input type="time" id="time" name="time" class="form-control mt-2" value="<?php echo $row['time']; ?>" required><br>

      <label for="agenda">Agenda</label>
      <textarea id="agenda" name="agenda" class="form-control mt-2" rows="5" required><?php echo $row['agenda']; ?></textarea>

      <input class="btn btn-primary mt-3" type="submit" name="update" value="Update Data">
      <a href="index.php" button class="btn btn-secondary mt-3" type="submit">Cancel</a></button>
    </form>
  </div>

  <?php
  if (isset($_POST['update'])) {
      $day = $_POST['day'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      $agenda = $_POST['agenda'];

      // Query Update Data
      $sqlUpdate = "UPDATE tb_agenda SET day='$day', date='$date', time='$time', agenda='$agenda' WHERE date='$date'";
      $result = mysqli_query($conn, $sqlUpdate);

      if ($result) {
          echo "<script>
                  alert('Data berhasil diperbarui!');
                  window.location.href = 'index.php';
                </script>";
      } else {
          echo "<script>
                  alert('Gagal memperbarui data!');
                  window.location.href = 'index.php';
                </script>";
      }
  }
  ?>
</body>
</html>
