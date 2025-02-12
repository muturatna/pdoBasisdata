<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "user_management"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk menghitung rata-rata gaji per departemen dengan rata-rata gaji lebih tinggi dari perusahaan
$sql = "SELECT department, AVG(salary) AS avg_salary
        FROM employees
        GROUP BY department
        HAVING AVG(salary) > (SELECT AVG(salary) FROM employees)";
$result = $conn->query($sql);

// Menampilkan hasil
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Departemen: " . $row['department'] . " - Rata-rata Gaji: " . number_format($row['avg_salary'], 2) . "<br>";
    }
} else {
    echo "Tidak ada departemen dengan rata-rata gaji di atas rata-rata perusahaan.";
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function & Stored Procedure</title>
    <style>
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Rata-Rata Gaji dan Karyawan dengan Gaji Lebih dari Batas</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Update gaji karyawan dengan ID 1
$sql = "UPDATE employees SET salary = 7500 WHERE id = 1";

if ($conn->query($sql) === TRUE) {
    echo "Gaji berhasil diperbarui. Trigger otomatis dijalankan!";
} else {
    echo "Error: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
Cek Hasil Trigger
SELECT * FROM salary_log;


</body>
</html>
