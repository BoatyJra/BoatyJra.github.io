<?php
session_start();
include('connection.php');
$branch_id = $_SESSION['branch'];

?>
<?php
$dataPoints = array();
$sum = 0;
try {
    $handle = $link->prepare('SELECT Discount_ID, COUNT(Member_ID) AS Total FROM member GROUP BY Discount_ID');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
            if ($row->Discount_ID == "pt")
                {
                $label = "Platinum";
                }
            else if ($row->Discount_ID == "gd")
                {
                $label = "Gold";
                }
            else if ($row->Discount_ID == "sl")
                {
                $label = "Silver";
                }
                if ($row->Discount_ID == "Dummy")
                {
                $label = "Dummy";
                }
        array_push($dataPoints, array("label" => $label, "y" => $row->Total));
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
                    text: "Analysis Member By Member Type"
                },
                data: [{
                    indexLabel: "{label}, {y}",
                    type: "pie", //change type to bar, line, area, pie, etc
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

<?php  require'headermanager.php';?>


    <div class="container bg-white pt-2 pb-4 ">
        <div class="container" style="width:700px;">
            <h3 aligh="conter">Member Information</h3>
            <br><br>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <br><br>
            <div align="right">
            <label> Total Member => <?php echo $sum;?></label>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="50%">Member Type</th>
                        <th width="50%">Count of member</th>
                    
                    </tr>
                    <?php
                    $query = "SELECT Discount_ID, COUNT(Member_ID) AS Total FROM member GROUP BY Discount_ID";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Discount_ID']; ?></td>
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