<html>
<head>
    <link rel="stylesheet" type="text/css" media="all" href="styles.css" />
</head>
<body>

<div id="formularz" >
    <div id = "form1" >
        <div id = "info" style = "display:none">
            Info:
        </div>
        <form action="" method="post" >
            <input type="hidden" name="sended" value=1/>
            <label for = 'nazwa'>Opis:</label>
            <input type="text" name="desc">

            <label for = 'Przedmiot'>Tagi:</label>
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
    mysqli_query($conn, "INSERT INTO events (description, edate) VALUES ('$opis', NOW());") or die ('<p class="error">Data Base error occurred.</p>');
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

