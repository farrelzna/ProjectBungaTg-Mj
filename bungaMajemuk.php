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
        <h2 class="text-center">Hitung Bunga Majemuk</h2>

        <!-- Form input untuk menghitung bunga majemuk -->
        <form method="POST" action="" class="mt-4">
            <div class="form-floating mb-3">
                <input type="number" name="pokok" id="pokok" class="form-control" required>
                <label for="pokok">Pokok Pinjaman/Investasi (Rp):</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" step="0.01" name="sukuBunga" id="sukuBunga" class="form-control" required>
                <label for="sukuBunga">Suku Bunga Tahunan (%):</label>
            </div>

            <div class="form-floating mb-3">
                <select name="periode" id="periode" class="form-control" required>
                    <option value="1">Tahunan (1x per tahun)</option>
                    <option value="2">Semesteran (2x per tahun)</option>
                    <option value="4">Triwulan (4x per tahun)</option>
                    <option value="12">Bulanan (12x per tahun)</option>
                </select>
                <label for="periode">Periode Penggandaan:</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" name="waktu" id="waktu" class="form-control" required>
                <label for="waktu">Waktu (Tahun):</label>
            </div>

            <button type="submit" class="btn btn-success">Hitung Bunga</button>
        </form>

        <?php
        // Memproses form ketika tombol "Hitung Bunga Majemuk" ditekan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pokok = floatval($_POST['pokok']);
            $sukuBunga = floatval($_POST['sukuBunga']);
            $waktu = intval($_POST['waktu']);
            $periode = intval($_POST['periode']);

            // Fungsi untuk menghitung bunga majemuk
            function hitungBungaMajemuk($pokok, $sukuBunga, $waktu, $periode)
            {
                $A = $pokok * pow(1 + ($sukuBunga / (100 * $periode)), $periode * $waktu);
                return $A;
            }

            // Menghitung bunga majemuk
            $total = hitungBungaMajemuk($pokok, $sukuBunga, $waktu, $periode);
            $bunga = $total - $pokok;  // Bunga adalah total dikurangi pokok

            // Menampilkan hasil
            echo "<div class='mt-4'>";
            echo "<h3>Hasil Perhitungan:</h3>";
            echo "Pokok: Rp " . number_format($pokok, 0, ',', '.') . "<br>";
            echo "Suku Bunga: " . $sukuBunga . "%<br>";
            echo "Waktu: " . $waktu . " tahun<br>";
            echo "Bunga: Rp " . number_format($bunga, 0, ',', '.') . "<br>";
            echo "Jumlah Total (Pokok + Bunga): Rp " . number_format($total, 0, ',', '.') . "<br>";
            echo "</div>";
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>