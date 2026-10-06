<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje pliki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>MOJE PLIKI</h1>

    <h2>Aktualny katalog:</h2>
    <p><?php echo getcwd(); ?></p>

    <h2>ZAWARTOŚĆ KATALOGU</h2>

    <?php
    $katalog = "dokumenty";

    if (file_exists($katalog)) {

        $pliki = scandir($katalog);

        echo "<table>";
        echo "<tr>
                <th>Nazwa</th>
                <th>Typ</th>
                <th>Rozmiar</th>
              </tr>";

        foreach ($pliki as $element) {

            if ($element != "." && $element != "..") {

                $sciezka = $katalog . "/" . $element;

                if (is_file($sciezka)) {
                    $typ = "PLIK";
                    $rozmiar = filesize($sciezka) . " B";
                }
                elseif (is_dir($sciezka)) {
                    $typ = "KATALOG";
                    $rozmiar = "-";
                }
                else {
                    $typ = "NIEZNANY";
                    $rozmiar = "-";
                }

                echo "<tr>";
                echo "<td>$element</td>";
                echo "<td>$typ</td>";
                echo "<td>$rozmiar</td>";
                echo "</tr>";
            }
        }

        echo "</table>";
    }
    else {
        echo "<p>Katalog dokumenty nie istnieje.</p>";
    }
    ?>
</div>

</body>
</html>