<?php
$täidised = [
    "šokolaad" => 1.5,
    "vahukoor" => 1.0,
    "marjad" => 2.0
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inimesi = (int)$_POST["inimesi"];
    $täidis = $_POST["täidis"];
    $hind = $inimesi * (3 + $täidised[$täidis]);

    file_put_contents("orders.txt", "$inimesi;$täidis;$hind €\n", FILE_APPEND);
    echo "<div class='alert alert-success'>Kokku: $hind €</div>";
}
?>

<form method="POST" class="container mt-4">
  <div class="mb-3">
    <label>Inimeste arv</label>
    <input type="number" name="inimesi" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Täidis</label>
    <select name="täidis" class="form-select">
      <?php foreach ($täidised as $nimi => $hind): ?>
        <option value="<?= $nimi ?>"><?= $nimi ?> (+<?= $hind ?>€)</option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Arvuta</button>
</form>
