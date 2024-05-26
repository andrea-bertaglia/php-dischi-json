<?php

// PREPARO I DATI esportandoli dal file JSON ad un array
// 1. leggo dati dal file JSON e li passo a stringa
$disc_string = file_get_contents('dischi.json'); // da json a string
// var_dump($disc_string);

// 2. trasformo la stringa in un array
$disc_array = json_decode($disc_string, true); // da string a array
// var_dump($disc_array);

// GESTISCO LA CHIAMATA API
// 3. compongo la risposta della chiamata API

if (isset($_POST["index"])) {
    $disc_index = $_POST["index"];
    $disc_array[$disc_index]['like'] = !$disc_array[$disc_index]['like'];

    // Salvo l'array modificato nel file JSON
    file_put_contents('dischi.json', json_encode($disc_array));
}

// Applica il filtro se presente
$filtered_disc_array = $disc_array;
if (isset($_POST['filter']) && $_POST['filter'] === 'liked') {
    $filtered_disc_array = array_filter($disc_array, function ($disc) {
        return $disc['like'];
    });
}

$response_data = [
    "results" => array_values($filtered_disc_array), // Reset the array keys
    "success" => true
];
// var_dump($response_data);

// 4. trasformo i dati della risposta in JSON
$json_disc = json_encode($response_data);
// var_dump($json_disc);

// 5. imposto l'header della risposta su JSON
header("Content-Type: application/json");

// 6. invio la risposta della chiamata API
echo $json_disc;
