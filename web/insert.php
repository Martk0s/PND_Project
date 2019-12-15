<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/color.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/ScrollToTop.css">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <title>PND_PROJECT</title>
</head>
<style>
    /* Head container */
    .container-classa {
    background-image: url('../img/head.jpg');
    background-repeat: no-repeat;
    background-position: top;
    width: 48%;
    height: 300px;
    border: 2px dashed #333;
    border-radius: 25px;
    position: relative;
    top: 80px;
    margin: 0 auto;
    }
    .page-header {
        font-size: 80px;
        color:white;
        text-align: center;
    }
    .container-border{
        position: relative;
        margin: 0 auto;
        border: 2px dashed #333;
        border-radius: 25px;
    }
    .shoes-image {
        width: 110%;
    }
    
    .id-no {
        position: absolute;
        right: 30;
    }

    .card-text {
        color: rgb(100, 100, 100);
    }
    .update-btn {
        position: absolute;
        right: 125;
    }
    .delete-btn {
        position: absolute;
        right: 25;
    }
</style>
<body>
    <!-- Scroll To Top Button -->
    <a href ="index.php"><button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button><a>
    <!-- END Scroll To Top Button -->
    <div class = "container-classa">
        <h4 class="head page-header"><br>SHOES</h4>
    </div>
    <br><br><br><br><br><br>
    <div class="container container-border">
    <form action="" method="POST" class="form-group">
            <div class="row" style="margin-left: 100; margin-right: 100;">
            <div class="col-md-auto" style="margin: auto;">
            <br><br>
            <label for="brand">Brand&ensp;:&ensp; </label>
            <input class="form-control" type="text" name="brand" style="width: 180px; display: inline;">
            </div>

            <div class="col-md-auto" style="margin: auto;">
            <br><br>
            <label for="type">Type &ensp;:&ensp; </label>
            <input class="form-control" type="text" name="type" style="width: 180px; display: inline;">
            </div>
            <!-- SIZE -->
            <div class="col-md-auto" style="margin: auto;">
                <br><br>
                <label for="color">Color&ensp;:&ensp; </label>
                <select name='color' id='color' class="form-control" style="width: 180px; display: inline;">
                    <option value="Monoblack">Monoblack</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Red">Red</option>
                    <option value="Pink">Pink</option>
                    <option value="Navy">Navy</option>
                    <option value="Beige">Beige</option>
                    <option value="Tan">Tan</option>
                    <option value="Grey">Grey</option>
                    <option value="Brown">Brown</option>
                    <option value="Green">Green</option>
                    <option value="Orange">Orange</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Blue">Blue</option>
                    <option value="Clear">Clear</option>
                    <option value="Sliver">Sliver</option>
                </select>
            </div>
            </div>
            <!-- ROW -->
            <div class="row" style="margin-left: 100; margin-right: 100;">
            <div class="col-md-auto" style="margin: auto;">
            <br><br>
            <!-- Model -->
            <label for="model">Model&ensp;:&ensp; </label>
            <input class="form-control" type="text" id="model" name="model" style="width: 180px; display: inline;">

            <!-- Price -->
            <label for="price">Price &ensp;:&ensp; </label>
            <input class="form-control" type="number" name="price" style="width: 180px; display: inline;">

            <label for="size">Size&ensp;:&ensp; </label>
            <select name='size_type' id='size_type' class="form-control" style="width: 70px; display: inline;">
                    <option value="us">US</option>
                    <option value="uk">UK</option>
                    <option value="eu">EU</option>
            </select>
            <input class="form-control" type="text" name="size_value" style="width: 180px; display: inline;">
            <!-- ROW -->
            <div class="row" style="margin-top: auto; margin-bottom: auto;">
                &ensp;&ensp;
                <div class="col-md-auto" style="margin: 0 auto;">
                <br>
                <!-- GENDER -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="male" checked>
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="female">
                    <label class="form-check-label" for="female ">
                        Female
                    </label>
                </div>
                <!-- END GENDER -->
                </div>
                </div>
            <!--pic-->
            <br><br>
                    <div class="row" style="margin-left: 100; margin-right: 100;">
                    <label for="type">Picture Link &ensp;:&ensp; </label>
                    <input class="form-control" type="text" name="pic" style="width: 180px; display: inline;">
                </div>  

            <!-- BUTTON -->
            <br><br>
                <div class="row" style="margin-left: 100; margin-right: 100;">
                    <button type="input" class="btn btn-secondary btn-block" name="insert" id="insert"><i class="fas fa-filter"></i> Insert! </i></button>
                </div>

            <!-- END BUTTON -->
            <!-- row -->
            
    </form>
    </div>
    <!-- Container -->
    <hr style="width: 1200px;size: 4px;">
    <?php
       $data = [];
       if(isset($_POST['insert'])) {
            $size_values = explode(" ", $_POST['size_value']);
            $detail = [[
                        "gender" => $_POST['gender'],
                        "price" =>[
                            "amount" => $_POST['price'],
                            "currency" => "USD"
                            ],
                        "color" => $_POST['color'],
                        "size" => [
                            $_POST['size_type'] => $size_values
                        ],
                        "picture"=> $_POST['pic']
                        ]];
            $data = [
                        "brand" => $_POST['brand'],
                        "model" => $_POST['model'],
                        "type" => $_POST['type'],
                        "detail" => $detail
                    ];

           $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
           $bulkWrite = new MongoDB\Driver\BulkWrite;
           $bulkWrite->insert($data);
           $out = $conn->executeBulkWrite('PND_Project.shoes', $bulkWrite);
           if ($out) {
            echo '<script type="text/javascript">alert("Insert Data to Database sucessful!!"); window.location = "index.php";</script>';
        }else{
            echo '<script type="text/javascript">alert("Fail to insert new data")</script>';
        }    
           }
           
    ?>
</body>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</html>