<?php

include_once 'config.php';

const KB_TO_TEST = 1024;

function getInternetSpeed()
{
    $url = 'curl --max-time 8 -4 -o tmp.txt http://bouygues.testdebit.info/10G.iso';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $responseJson = curl_exec($curl);
    $response = json_decode($responseJson);
    return $response;
}

function setInCSV()
{
    // Get csv file :
    $file = \fopen('internet-speed.csv', 'w');
    if ($file !== false) {
        // Get existing data :
        $existingData = [];

            while (($data = fgetcsv($file, 1000, ",")) !== false) {
                array_merge($existingData, $data);
            }
            fclose($file);
    }
    var_dump($existingData);



    \fputcsv($file, ['Date', 'Internet speed']);
    $data = array(
        array('Data 11', 'Data 12', 'Data 13', 'Data 14', 'Data 15'),
        array('Data 21', 'Data 22', 'Data 23', 'Data 24', 'Data 25'),
        array('Data 31', 'Data 32', 'Data 33', 'Data 34', 'Data 35'),
        array('Data 41', 'Data 42', 'Data 43', 'Data 44', 'Data 45'),
        array('Data 51', 'Data 52', 'Data 53', 'Data 54', 'Data 55')
    );

    foreach ($data as $row) {
        fputcsv($file, $row);
    }

// Close the file
    fclose($file);
}

function main()
{
    $internetSpeed = getInternetSpeed();
    echo $internetSpeed;
}

main();
