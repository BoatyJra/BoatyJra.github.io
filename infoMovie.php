<?php
session_start();
include('connection.php');
$branch_id = $_SESSION['branch'];

?>
<?php
$dataPoints = array();
$dataPoints2 = array();
$sum = 0;
try {
    $handle = $link->prepare('SELECT DISTINCT *  FROM movie ORDER BY Movie_Rating DESC ');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
        array_push($dataPoints, array("label" => $row->Movie_Name, "y" => $row->Movie_Rating));
        array_push($dataPoints2, array("label" => $row->Movie_Name, "y" => $row->Movie_Fund));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="crudstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "TOP MOVIE RATING"
                },
                axisY: {
                    title: "MOVIE RATING"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#.# Rating",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "MOVIE FUND"
                },
                axisY: {
                    title: "MOVIE FUND"
                },
                data: [{
                    type: "pie",
                    yValueFormatString: "#.# Fund",
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart2.render();

        }
    </script>
    <title>Boba Cineplex</title>
</head>

<body>

    <?php require 'headermanager.php'; ?>

    <div class="container bg-white pt-2 pb-4 ">
        <div class="container" style="width:700px;">
            <h3 aligh="conter">Movie Information</h3>
            <br><br>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="50%">Movie Name</th>
                        <th width="50%">Score</th>

                    </tr>
                    <?php
                    $query = "SELECT DISTINCT *  FROM movie  ORDER BY Movie_Rating DESC ";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Movie_Name']; ?></td>
                            <td><?php echo $row['Movie_Rating']; ?></td>

                        </tr>
                    <?php
                    } ?>
                </table>
            </div>
            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="50%">Movie Name</th>
                        <th width="50%">Fund</th>

                    </tr>
                    <?php
                    $query = "SELECT DISTINCT *  FROM movie  ORDER BY Movie_Fund DESC ";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Movie_Name']; ?></td>
                            <td><?php echo $row['Movie_Fund']."Million";?></td>

                        </tr>
                    <?php
                    } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>