<?php
session_start();
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Ostukorv</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar (võid asendada oma naviga) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Kohvipood</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Avaleht</a></li>
        <li class="nav-item"><a class="nav-link" href="tooted.php">Tooted</a></li>
        <li class="nav-item"><a class="nav-link active" href="ostukorv.php">Ostukorv</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h1 class="mb-4">Sinu ostukorv</h1>

    <?php if (!empty($_SESSION['ostukorv'])): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Toode</th>
                    <th>Hind (€)</th>
                    <th>Kogus</th>
                    <th>Kokku (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kokku = 0;
                foreach ($_SESSION['ostukorv'] as $toode) {
                    $rida_summa = $toode['hind'] * $toode['kogus'];
                    $kokku += $rida_summa;
                    echo "<tr>
                        <td>{$toode['nimi']}</td>
                        <td>{$toode['hind']}</td>
                        <td>{$toode['kogus']}</td>
                        <td>" . number_format($rida_summa, 2) . "</td>
                    </tr>";
                }
                ?>
                <tr>
                    <td colspan="3" class="text-end"><strong>Kokku:</strong></td>
                    <td><strong><?= number_format($kokku, 2) ?> €</strong></td>
                </tr>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-success">Tagasi poodi</a>
    <?php else: ?>
        <div class="alert alert-info">Ostukorv on tühi.</div>
        <a href="tooted.php" class="btn btn-primary">Vaata tooteid</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
