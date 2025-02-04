<?php
include 'koneksi.php';

if (isset($_GET['date'])) {
    $date = $_GET['date'];

    // Cek apakah data dengan tanggal ini ada dalam database
    $sqlCheck = "SELECT * FROM tb_agenda WHERE date = '$date'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    $row = mysqli_fetch_assoc($resultCheck);

    if ($row) {
        // Jika data ditemukan, hapus
        $sqlDelete = "DELETE FROM tb_agenda WHERE date = '$date'";
        $resultDelete = mysqli_query($conn, $sqlDelete);

        if ($resultDelete) {
            echo "<script>
                    alert('Agenda pada tanggal $date berhasil dihapus!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus agenda pada tanggal $date!');
                    window.location.href = 'index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Agenda pada tanggal $date tidak ditemukan!');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Tanggal agenda tidak ditemukan!');
            window.location.href = 'index.php';
          </script>";
}
?>
