<?php

if (!empty($_GET) && !empty($_GET['search'])) {

    $search = $_GET['search'];
    $apiKey = 'AIzaSyCWBUMO7e4yHXj-_gydSGdByAd_3qUAd-U';
    $cx = 'c23a459273ae243bc';
    $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";
    //echo $url;

    $ch = curl_init(); // відкрити сеанс cURL

    curl_setopt ($ch,CURLOPT_URL , $url); // встановити параметр $ url
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Повернути відповідь в рядок

    $resultJson = curl_exec ($ch); // Виконати запит

    curl_close ($ch); // Закрити сеанс cURL

    $resultArray = json_decode($resultJson, true);

    $items = [];
    if (!empty($resultArray) && !empty($resultArray['items'])) {
        $items = $resultArray['items'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form>
    <h2>My Browser</h2>
    <form method="GET" action="/index.php">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value=""><br><br>
        <input type="submit" value="Submit">
    </form>
</form>

<?php

if (!empty($items)){

        foreach ($items as $kae => $item){

            echo '<p><a href="'.$item['link'].'">' . $item['title'] . '</a></p>' ;
            echo '<p>' . $item['snippet'] . '</p>';
            echo '<hr>';

        }
}

?>

</body>
</html>

