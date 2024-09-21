<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "App Penghitung Bunga" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Hitung Bunga Tunggal</h2>

        <!-- Form input untuk menghitung bunga tunggal -->
        <form method="POST" action="" class="mt-4">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="pokok" id="pokok" required>
                <label for="pokok" class="form-label">Pokok Pinjaman/Investasi (Rp):</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" step="0.01" class="form-control" name="sukuBunga" id="sukuBunga" required>
                <label for="sukuBunga" class="form-label">Suku Bunga (%):</label>
            </div>

            <div class="form-floating mb-3">
                <select name="periode" id="periode" class="form-select">
                    <option value="tahun">Tahun</option>
                    <option value="semester">Semester</option>
                    <option value="bulan">Bulan</option>
                    <option value="triWulan">Triwulan</option>
                    <option value="caturWulan">Caturwulan</option>
                </select>
                <label for="periode" class="form-label">Periode:</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="waktu" id="waktu" required>
                <label for="waktu" class="form-label">Waktu (Jumlah Periode):</label>
            </div>

            <button type="submit" name="hitung" class="btn btn-success">Hitung Bunga</button>
        </form>
    </div>

    <?php
    // Memproses form ketika tombol "Hitung Bunga" ditekan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pokok = floatval($_POST['pokok']);
        $sukuBunga = floatval($_POST['sukuBunga']);
        $waktu = intval($_POST['waktu']);
        $periode = $_POST['periode'];

        // Mengubah periode menjadi dalam satuan tahun
        switch ($periode) {
            case 'tahun':
                $faktorWaktu = 1;
                break;
            case 'semester':
                $faktorWaktu = 0.5; // 1 semester = 0.5 tahun
                break;
            case 'bulan':
                $faktorWaktu = 1 / 12; // 1 bulan = 1/12 tahun
                break;
            case 'triWulan':
                $faktorWaktu = 1 / 3; // 1 triwulan = 1/4 tahun
                break;
            case 'caturWulan':
                $faktorWaktu = 1 / 4; // 1 caturwulan = 1/3 tahun
                break;
            default:
                $faktorWaktu = 1; // Default ke tahun jika terjadi kesalahan
        }

        // Menghitung waktu dalam tahun
        $waktuDalamTahun = $waktu * $faktorWaktu;

        // Fungsi untuk menghitung bunga tunggal
        function hitungBungaTunggal($pokok, $sukuBunga, $waktuDalamTahun)
        {
            return $waktuDalamTahun * ($pokok * ($sukuBunga / 100));
        }

        // Menghitung bunga tunggal
        $totalBunga = hitungBungaTunggal($pokok, $sukuBunga, $waktuDalamTahun);

        // Menampilkan hasil
        echo "<div class='container mt-4'>";
        echo "<h3>Hasil Perhitungan</h3><br>";
        // Diketahui
        echo "<h4>Diketahui :</h4>";
        echo "<p>Modal Awal: Rp " . number_format($pokok, 0, ',', '.') . "</p>";
        echo "<p>Suku Bunga: " . $sukuBunga . "%</p>";
        echo "<p>Waktu: " . $waktu . " " . $periode . " (setara " . number_format($waktuDalamTahun, 2) . " tahun)</p>";
        // Perhitungan
        echo "<h4>Penyelesaian :</h4>";
        echo "<p>Bunga: Rp " . number_format($totalBunga, 0, ',', '.') . "</p>";
        echo "<p>Jumlah Total (Modal Akhir): Rp " . number_format($totalBunga + $pokok, 0, ',', '.') . "</p>";
        echo "</div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
