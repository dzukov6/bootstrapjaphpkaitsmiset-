<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Tooted</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Kohvipood</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.html">Avaleht</a></li>
        <li class="nav-item"><a class="nav-link active" href="tooted.php">Tooted</a></li>
        <li class="nav-item"><a class="nav-link" href="kalkulaator.php">Kalkulaator</a></li>
        <li class="nav-item"><a class="nav-link" href="kontakt.php">Kontakt</a></li>
        <li class="nav-item"><a class="nav-link" href="ostukorv.php">Ostukorv</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <h1 class="mb-4">Meie tooted</h1>
    <div class="row">
        <?php
        $products = array_map('str_getcsv', file('menu.csv'));
        array_shift($products);

        foreach (array_slice($products, 0, 12) as $index => $row) {
            list($nimi, $hind, $kategooria, $kirjeldus) = $row;
            $pilt = "pildid/" . ($index + 1) . ".webp";

            echo '
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="' . $pilt . '" class="card-img-top" alt="' . htmlspecialchars($nimi) . '">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($nimi) . '</h5>
                        <p class="card-text">' . htmlspecialchars($kirjeldus) . '</p>
                        <p class="card-text"><strong>' . htmlspecialchars($hind) . ' €</strong></p>
                        <a href="#" class="btn btn-primary">Lisa ostukorvi</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
