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
        <h1 class="text-center mb-4">Penghitung Bunga</h1>
        <div class="text-center mb-4">
            <a href="?page=bunga_tunggal" class="btn btn-primary mb-3">Menghitung Bunga Tunggal</a>
            <a href="?page=bunga_majemuk" class="btn btn-primary mb-3">Menghitung Bunga Majemuk</a>
        </div>

        <div class="mt-4">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : '';
            switch ($page) {
                case 'bunga_tunggal':
                    include 'bungaTunggal.php';
                    break;
                case 'bunga_majemuk':
                    include 'bungaMajemuk.php';
                    break;
                default:
                    echo "<p class='text-center'>Silakan pilih jenis perhitungan bunga.</p>";
                    break;
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
