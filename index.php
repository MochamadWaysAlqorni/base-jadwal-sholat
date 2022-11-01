<!DOCTYPE html>
<html>
<head>
<title>Jadwal Sholat Kab. Mojokerto</title>
</head>
<body>
<?php
$year = date("Y");
$month = date("m");
$day = date("d");
$get_url = "https://api.myquran.com/v1/sholat/jadwal/1615/".$year."/".$month."/".$day."";
$data = file_get_contents($get_url);
$myfile = fopen("data.json", "w") or die("Unable to open file!");
fwrite($myfile, $data);
fclose($myfile);
$data = file_get_contents('data.json');
$jsondata = json_decode($data);

$subuh = $jsondata->data->jadwal->subuh;
$dhuhur = $jsondata->data->jadwal->dzuhur;
$ashar = $jsondata->data->jadwal->ashar;
$maghrib = $jsondata->data->jadwal->maghrib;
$isya =  $jsondata->data->jadwal->isya;
$tanggal = $jsondata->data->jadwal->tanggal;
$kota = $jsondata->data->lokasi;
$provinsi = $jsondata->data->daerah;
echo "<h2>Jadwal Sholat ".$kota.", ".$provinsi." pada ".$tanggal."</h2>";
echo "<p>Subuh : ".$subuh."</p><br>";
echo "<p>Dzuhur : ".$dhuhur."</p><br>";
echo "<p>Ashar : ".$ashar."</p><br>";
echo "<p>Maghrib : ".$maghrib."</p><br>";
echo "<p>Isya : ".$isya."</p><br>";
?>

</body>
</html> 

