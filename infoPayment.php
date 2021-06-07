<?php
session_start();
include('connection.php');
$branch_id = $_SESSION['branch'];
?>
<?php
$dataPoints = array();
$sum = 0;
try {
    $handle = $link->prepare('SELECT DISTINCT Payment_method, SUM(Amount_Paid) AS Total FROM payment GROUP BY Payment_method');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
        array_push($dataPoints, array("label" => $row->Payment_method, "y" => $row->Total));
        $sum = $sum + $row->Total;
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
                exportEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Total amount paid by Method"
                },
                data: [{
                    indexLabel: "{label}, {y}",
                    type: "doughnut", //change type to bar, line, area, pie, etc
                    yValueFormatString: "#,##0.00",
                    showInLegend: true,
		            legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });

            chart.render();

        }
    </script>
    <title>Boba Cineplex</title>
</head>

<body>

    <?php require 'headermanager.php'; ?>


    <div class="container bg-white pt-2 pb-4 ">
        <div class="container" style="width:700px;">
            <h3 aligh="conter">Payment Information</h3>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <br><br>
            <div align="right">
            <label> Total Earning => <?php echo $sum;?></label>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="15%">Payment ID</th>
                        <th width="20%">Member ID</th>
                        <th width="20%">Payment Method</th>
                        <th width="20%">Amount Paid</th>
                        <th width="25%">Payment Time Stamp</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM payment";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Payment_ID']; ?></td>
                            <td><?php echo $row['Member_ID']; ?></td>
                            <td><?php echo $row['Payment_method']; ?></td>
                            <td><?php echo $row['Amount_Paid']; ?></td>
                            <td><?php echo $row['Payment_Date']; ?></td>
                        </tr>
                    <?php
                    } ?>
                </table>
            </div>
            <br>
            <br>
        </div>
    </div>
</body>
</html>