<div id = "dataModal" class = "modal fade" role= "dialog">
    <div class = "modal-dialog">
    <!-- Modal Content -->
        <div class= "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <h4 class ="modal-title">Details</h4>
            </div>
            <div class = "modal-body" id="detail">
                <p>Detail</p>
            </div>
            <div class ="modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>    
            </div>
        </div>
    </div>
</div>

<div id = "addModal" class = "modal fade" role= "dialog">
    <div class = "modal-dialog">
    <!-- Modal Content -->
        <div class= "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <h4 class ="modal-title">Showtime Details</h4>
            </div>
            <div class = "modal-body">
            <form method="post" id="insert-form">
                    <label>Movie</label>
                    <input type="hidden" id='id' name = "id"/>
                    <select  name = "movie" class="div-toggle text-center w-100 text-center bg-warning form-select form-control" id="mySelect" >
                    <?php
                    $mSQL = "SELECT DISTINCT * FROM movie WHERE Movie_status = '1' ORDER BY Movie_ID ASC ";
                    $mQuery = mysqli_query($conn,$mSQL);
                    while($mResult = mysqli_fetch_array($mQuery))
                        {
                        ?>

                        <option  id = "movie" name = "movie" value="<?php echo $mResult['Movie_ID'];  ?>"><?php echo $mResult["Movie_Name"];?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <label>Theater ID</label>
                    <select  name = "theater" class="div-toggle text-center w-100 text-center bg-warning form-select form-control" id="mySelect" >
                    <?php
                    $tSQL = "SELECT DISTINCT Theater_ID FROM theater  WHERE Branch_ID = $branch_id ORDER BY Theater_ID ASC ";
                    $tQuery = mysqli_query($conn,$tSQL);
                    while($tResult = mysqli_fetch_array($tQuery))
                        {
                        ?>
                        <option  id = "theater" name = "theater" value="<?php echo $tResult["Theater_ID"];  ?>"><?php echo $tResult["Theater_ID"];?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <label>Show time</label>
                    <input type="time" id="showtime" name="showtime" class="form-control" required />

                    <input type="submit" id="insert"  class="btn btn-success" />
                </form>
            </div>
            <div class ="modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>    
            </div>
        </div>
    </div>
</div>