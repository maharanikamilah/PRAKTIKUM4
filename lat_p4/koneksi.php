<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$database = "db_penjadwalan_kegiatan_desa";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Menangkap data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $level = $_POST['level'];
    $blokir = $_POST['blokir'];
    $id_pegawai = $_POST['id_pegawai'];

    // Query simpan data ke tabel admin_desa
    $query = "INSERT INTO admin_desa 
              (username, password, nama_lengkap, email, no_telp, level, blokir, id_pegawai)
              VALUES 
              ('$username', '$password', '$nama_lengkap', '$email', '$no_telp', '$level', '$blokir', '$id_pegawai')";

    if (mysqli_query($koneksi, $query)) {
        echo "<h3>Data berhasil disimpan ke tabel admin_desa!</h3>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>
