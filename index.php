<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>HOTELS PHP</title>
</head>
<body class="bg-secondary-subtle">
<?php echo '<pre>';  print_r($hotels); echo '</pre>' ?>

<form action="index.php" method="get">
    <div class="mb-3">
        <label for="parkingFilter" class="form-label">Filtro per Parcheggio:</label>
        <select class="form-select" id="parkingFilter" name="parking">
            <option value="">Tutti</option>
            <option value="1">Con parcheggio</option>
            <option value="0">Senza parcheggio</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="voteFilter" class="form-label">Filtro per Voto:</label>
        <select class="form-select" id="voteFilter" name="vote">
            <option value="">Tutti</option>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?> stelle o più</option>
            <?php endfor; ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Vai</button>
</form>

<hr>

<table class="table ">
<thead class="table-info">
  <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Description</th>
    <th scope="col">Parking</th>
    <th scope="col">Vote</th>
    <th scope="col">Distance to Center</th>
  </tr>
</thead>
<tbody>
<?php foreach ($hotels as $index => $hotel): ?>
    <?php 
        if(isset($_GET['parking']) && ($_GET['parking'] !== '') && ($hotel['parking'] != $_GET['parking'])) continue; 
        if(isset($_GET['vote']) && ($_GET['vote'] !== '') && ($hotel['vote'] < $_GET['vote'])) continue;
    ?>
  <tr class="table-warning">
    <th class="table-info" scope="row"><?php echo ($index + 1); ?></th>
    <td><? echo $hotel['name']; ?></td>
    <td><? echo $hotel['description']; ?></td>
    <td><? echo $hotel['parking']? 'yes' : 'no'; ?></td>
    <td><? echo $hotel['vote']; ?></td>
    <td><? echo $hotel['distance_to_center']; ?></td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>';



<!-- Descrizione
Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella. -->
</body>
</html>