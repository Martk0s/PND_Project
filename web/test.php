<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/color.css">
    <title>test file</title>
</head>
<body>
    <?php
        $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $query = new MongoDB\Driver\Query([]);
        $rows = $conn->executeQuery("PND_Project.shoes", $query);

        foreach ($rows as $row) {
            echo "<div class='container py-3'>";
            echo "<div class='card'>";
            echo "<div class='row'>";
            echo "<div class='col-md-4'>";
            foreach ($row->detail as $detail) {
                echo "<img src='". $detail->picture . "' class='w-100'>"; 
            }
            echo "</div>";
            echo "<div class='col-md-8 px-3 py-3'>";
            echo "<div class='card-block px-3'>";
            //echo "ID: " . $row->id . "<br>";//debug
            echo "<h3 class='card-title'>" . $row->brand . "</h3>";
            echo "<p class='card-text> <b>Model</b><br>&ensp;&ensp;" . $row->model . "<p>" ;
            echo "<p class='card-text> <b>Type</b><br>&ensp;&ensp;" . $row->type . "<p>" ;
            foreach ($row->detail as $detail) {
                echo "<p class='card-text> <b>Gender</b><br>&ensp;&ensp;" . $detail->gender . "<p>" ;
                echo "Color: " . $detail->color . "<br>";
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</body>
</html>