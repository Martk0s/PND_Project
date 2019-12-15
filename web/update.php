<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- มี. -->
    <link rel="stylesheet" href="../css/color.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ScrollToTop.css">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <title>PND_PROJECT_UPDATE</title>
</head>
<style>
    /* Head container มี..*/
    .container-classa {
    background-image: url('/img/Head.jpg');
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
    <?php
        echo "<form action='' method='POST'>";
        /* รับค่าจากเพจ */
        $brand = 'REEEEEEEEEEE';
        $model = 'PEPE';
        $type = 'No Shoes';
        $gender = 'Male';
        $color = 'Green';
        /*$brand = $_POST['brand'];
        $model = $_POST['model'];
        $type = $_POST['type'];
        $gender = $_POST['gender'];
        $color = $_POST['color'];*/
        /* รับค่าจากเพจ ['brand'=> $brand/* เป้าหมายที่ดึงมา */

        $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $filter = array('$and'=>array(array('brand'=>$brand),array('model'=>$model),array('type'=>$type),array('detail.gender'=>$gender),array('detail.color'=>$color)));
        $query = new MongoDB\Driver\Query($filter);
        $rows = $conn->executeQuery("PND_Project.shoes", $query);

        foreach ($rows as $row) {
            echo "<div class='container py-3'>";
            echo "<div class='card'>";
            echo "<div class='row'>";
            echo "<div class='col-md-4'>";
            $i = 0;
            foreach ($row->detail as $detail) {
                echo "<img src='". $detail->picture . "' class='shoes-image'>"; 
            }
            echo "</div>";
            echo "<div class='col-md-8 px-3 py-3'>";
            echo "<div class='card-block px-3'>";
            echo "<p class='id-no' style='text-align: right; color: rgb(200, 200, 200);'>ID: " . $row->_id . "<br></p>";//debug
            echo "<p class='card-text'> <b>Brand</b>&ensp;|&ensp;" . $row->brand . "&ensp; <input type='text' class='form-control' value='$brand' name='new_brand' style='width: 280px; height: 30px; display: inline;'>" ;
            echo "<p class='card-text'> <b>Model</b>&ensp;|&ensp;" . $row->model. "&ensp; <input type='text' class='form-control' value='$model' name='new_model' style='width: 200px; height: 30px; display: inline;'>" ;
            echo "<p class='card-text'> <b>Type</b>&ensp;|&ensp;" . $row->type . "&ensp; <input type='text' class='form-control' value='$type' name='new_type' style='width: 200px; height: 30px; display: inline;'>" ;
            echo "<hr>";
            foreach ($row->detail as $detail) {
                echo "<p class='card-text'> <b>Gender</b>&ensp;|&ensp;" . $detail->gender . "&ensp; <input type='text' class='form-control' value='$gender' name='new_gender' style='width: 200px; height: 30px; display: inline;'>" ;
                echo "<p class='card-text'>";
                if (property_exists($detail->size,"US")){
                    echo "<b>US&ensp;|&ensp;</b>";
                    $usstack= '';
                    foreach ($detail->size->US as $US) {
                        echo $US . "&ensp;&ensp;";
                        $usstack .= strval($US) . " ";
                    }
                    echo "&ensp;<input type='text' class='form-control' value='". $usstack . "'  name='new_ussize' style='width: 200px; height: 30px; display: inline;'><br>";
                }
                else {
                    echo "&ensp;<input type='text' class='form-control' value='". $usstack . "'  name='new_ussize' style='width: 200px; height: 30px; display: inline;'><br>";
                }
                if (property_exists($detail->size,"UK")){
                    echo "<b>UK&ensp;|&ensp;</b>";
                    $ukstack= '';
                    foreach ($detail->size->UK as $UK) {
                        echo $UK . "&ensp;&ensp;";
                        $ukstack .= strval($UK) . " ";
                    }
                    echo "&ensp;<input type='text' class='form-control' value='". $ukstack . "' name='new_uksize' style='width: 200px; height: 30px; display: inline;'><br>";
                }
                else {
                    echo "&ensp;<input type='text' class='form-control' value='". $ukstack . "' name='new_uksize' style='width: 200px; height: 30px; display: inline;'><br>";
                }
                if (property_exists($detail->size,"EU")){
                    echo "<b>EU&ensp;|&ensp;</b>";
                    $eustack = '';
                    foreach ($detail->size->EU as $EU) {
                        echo $EU . "&ensp;&ensp;";
                        $eustack .= strval($EU) . " ";
                    }
                    echo "&ensp;<input type='text' class='form-control' value='". $eustack . "' name='new_eusize' style='width: 200px; height: 30px; display: inline;'>";
                }
                else {
                    echo "&ensp;<input type='text' class='form-control' value='". $eustack . "' name='new_eusize' style='width: 200px; height: 30px; display: inline;'>";
                }
                echo "</p>";
                echo "<div class='container'>";
                echo "<div class='row'>";
                echo "<div class='color-box " . $detail->color . "'></div>";
                echo "<p class='card-text'> <b>Color</b>&ensp;|&ensp;" . $detail->color . "&ensp;<input type='text' class='form-control' value='". $detail->color ."' name='new_color' style='width: 200px; height: 30px; display: inline;'>" ;
                echo "</div>";
                echo "</div>";
                foreach ($detail->price as $price) {
                    echo "<p class='card-text'> <b>Price</b>&ensp;|&ensp;" . $price . "&ensp;<input type='text' class='form-control' value='". $price ."' name='new_amount' style='width: 150px; height: 30px; display: inline;'>" ;
                break;
                }
                foreach ($row->detail as $detail) {
                echo "<p class='card-text'> <b>Picture URL</b>&ensp;|&ensp; <input type='text' class='form-control' value='". $detail->picture ."' name='new_picurl' style='width: 550px; height: 30px; display: inline;'>" ;
                }
                if (count($row->detail) > 1) {
                    if (0 != $i) {
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                }
                $i++;
                if (count($row->detail) > 1) {
                    if (count($row->detail) != $i) {
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<hr>";
                    }
                }

            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "<div class='row' style='margin-left: 100; margin-right: 100;'>
                <button type='input' class='btn btn-secondary btn-block' name='Update'><i class='fas fa-filter'></i> Update</i></button>
              </div>";
        echo "</form>";
    ?>
    <?php
        //เชื่อมต่อ MongoDB
        $conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        if(isset($_POST['Update'])){
        /*$new_brand = $_POST['new_brand'];
        $new_model = $_POST['new_model'];
        $new_type = $_POST['new_type'];*/
        $new_gender = $_POST['new_gender'];
        $new_color = $_POST['new_color'];
        $new_picurl = $_POST['new_picurl'];

        $new_ussize = $_POST['new_ussize'];
        $new_uksize = $_POST['new_uksize'];
        $new_eusize = $_POST['new_eusize'];
        //$new_amount = $_POST['new_amount'];
        
        /*echo "$new_brand $new_model $new_type";*/
        

        //สร้างBlock สำหรับรองรับการเพิ่มข้อมูลต่างๆแบบ Bulk
        $bulkWrite = new MongoDB\Driver\BulkWrite;
        
        //ตำแหน่งที่ต้องการจะเปลี่ยน
        $filter = array('$and'=>array(array('brand'=>$brand),array('model'=>$model),array('type'=>$type),array('detail.gender'=>$gender),array('detail.color'=>$color)));

        
        $USArray = explode(' ',$new_ussize);
        $UKArray = explode(' ',$new_uksize);
        $EUArray = explode(' ',$new_eusize);
        $priceObj = ['amount'=>$_POST['new_amount'],'currency'=>'USD'];
        $sizeObj = ['US'=>$USArray,'UK'=>$UKArray,'EU'=>$EUArray];
        $detailArray = array(
            [  
                'gender' => $new_gender,
                'price'=> $priceObj,
                'color' => $new_color,
                'size' => $sizeObj,
                'picture' => $new_picurl
            ]
        );
        $update = ['$set' => ['brand' => $_POST['new_brand'],   
                              'model' => $_POST['new_model'], 
                              'type' => $_POST['new_type'],
                              'detail' => $detailArray
                              ]];
        $options = ['multi' => false];
        $bulkWrite->update($filter, $update, $options);
        $out = $conn->executeBulkWrite('PND_Project.shoes', $bulkWrite);
        if($out){
        echo "Done it";
        }else{
        echo "Fail";
        }
        }

        
    ?>
</body>
</html>