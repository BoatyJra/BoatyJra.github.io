<?php
session_start();
include('connection.php');
$branch_id = $_SESSION['branch'];
?>
<?php
$dataPoints = array();
$sum = 0;
try {
    $handle = $link->prepare("SELECT Role, SUM(Salary) AS Total FROM staff  WHERE Branch_ID = '$branch_id' GROUP BY Role ORDER BY Total");
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
        array_push($dataPoints, array("label" => $row->Role, "y" => $row->Total));
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
                title: {
                    text: "Total Staff Salary By Role"
                },
                axisY: {
                    title: "Revenue (in Bath)",
                    includeZero: true,
                    prefix: "฿",
                    suffix: "",
                },
                data: [{
                    type: "bar",
                    yValueFormatString: "฿#,##0",
                    indexLabel: "{y}",
                    indexLabelPlacement: "inside",
                    indexLabelFontWeight: "bolder",
                    indexLabelFontColor: "white",
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
            <h3 aligh="conter">Staff Information</h3>
            <br><br>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <br>
            <br>
            <div align="right">
            <label> Total Disbursement => <?php echo $sum;?></label>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="50%">Role</th>
                        <th width="50%">Total Paid Per Role</th>

                    </tr>
                    <?php
                    $query = "SELECT COUNT(Salary) AS num ,Role,SUM(Salary) AS Total FROM staff WHERE Branch_ID = $branch_id GROUP BY Role ORDER BY Total DESC ";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Role']." (".$row['num'].")";?></td>
                            <td><?php echo $row['Total']; ?></td>
                        </tr>

                    <?php
                    } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>