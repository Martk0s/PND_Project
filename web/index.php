<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Welcome to our Database Website</title>
</head>
<body>
        <center><h1>Shoes</h1></center><br>
        <form action="" method="POST">
        <label for='brand'>Select your Brand :</label>
        <select>
            <option id='brand' name='brand' value='0'>-----</option>
            <option id='brand' name='brand' value='1'>Hello World!</option>
        </select>
        <button>Search!</buntton>
    </form>

    <?php

    $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);
    $rows = $conn->executeQuery("PND_Project.shoes", $query);

    if (isset($_POST['submit'])){
        foreach ($rows as $row){
            echo "<div class='card'><div class='card-body'>";
            echo "Brand : ". $row->brand . "<br>";
            echo "Model : ". $row->model . "<br>";
            echo "</div></div>";
        }
    }
    
    ?>

</body>
</html>