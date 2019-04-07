<html>
<head>
    <link rel="stylesheet" type="text/css" media="all" href="styles.css" />
</head>
<body>
<script>
    function getLocationConstant() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
        } else {
            alert("Your browser or device doesn't support Geolocation");
        }
    }

    // If we have a successful location update
    function onGeoSuccess(event) {
        document.getElementById("Latitude").value = event.coords.latitude;
        document.getElementById("Longitude").value = event.coords.longitude;

    }

    // If something has gone wrong with the geolocation request
    function onGeoError(event) {
        alert("Error code " + event.code + ". " + event.message);
    }

    getLocationConstant();
</script>

<div id="formularz" >
    <div id = "form1" >
        <div id = "info" style = "display:none">
            Info:
        </div>
        <form action="" method="post" >
            <input type="hidden" name="lat" id="Latitude" value=""/>
            <input type="hidden" name="lng" id="Longitude" value=""/>
            <input type="hidden" name="sended" value=1/>
            <label for = 'nazwa'>Opis:</label>
            <input type="text" name="desc">

            <label for = 'tags[]'>Tagi:</label>
            <select multiple name = "tags[]">
                <option value="1">metro</option>
                <option value="2">marsz</option>
                <option value="3">manifestacja</option>
                <option value="4">zagrożenie</option>
                <option value="5">blokada</option>
            </select>
            <input type="submit" value="wyślij" />
        </form>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: szwedoman
 * Date: 06.04.19
 * Time: 16:27
 */

require_once 'config.php';
if($_POST['sended'] == 1)
{
    $opis = safe($_POST['desc'], $conn);
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $lng = floatval($lng);
    $lat = floatval($lat);
    echo $lat;
    echo $lng;
    mysqli_query($conn, "INSERT INTO events (description, lat, lng, edate) VALUES ('$opis', '$lat', '$lng', NOW());") or die ('<p class="error">Data Base error occurred.</p>');
    $id = mysqli_insert_id($conn);
    foreach ($_POST['tags'] as $selectedTag)
    {
        mysqli_query($conn, "INSERT INTO evetag (fk_id_tag, fk_id_event) VALUES ('$selectedTag', '$id');") or die ('<p class="error">Data Base error occurred.</p>');
    }





}

mysqli_close($conn);

?>
</body>
</html>

