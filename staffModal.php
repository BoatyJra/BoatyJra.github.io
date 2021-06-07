<?php
$today = date("Y-m-d");
?>
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
                <h4 class ="modal-title">Staff Details</h4>
            </div>
            <div class = "modal-body">
            <form method="post" id="insert-form">
                    <label>First name</label>
                    <input type="hidden" id='id' name = "id"/>
                    <input type="text" id='firstname' name='firstname' class="form-control" required />
                    <label>Last name</label>
                    <input type="text" id='lastname' name='lastname' class="form-control" required />
                    <label>Address</label>
                    <input type="text" id='address' name='address' class="form-control" required />
                    <label>Telephone Number</label>
                    <input type="tel" id='tel' name='tel' class="form-control" required />
                    <label>ID card number</label>
                    <input type="tel" id='id_no'name='id_no' class="form-control" required />
                    <label>Date of Birth</label>
                    <input type="date" id='dob'name='dob' class="form-control"  max = "<?php echo $today;?>" required />
                    <label>Role</label>
                    <br>
                    <select  name = "role" class="div-toggle text-center w-100 text-center bg-warning form-select" id="mySelect" >
                    <?php
                    $strSQL = "SELECT DISTINCT Role FROM staff ORDER BY Staff_ID ASC ";
                    $objQuery = mysqli_query($conn,$strSQL);
                    while($roleResult = mysqli_fetch_array($objQuery))
                        {
                        ?>
                        <option  id = "role" name = "role" value="<?php echo $roleResult["Role"];  ?>"><?php echo $roleResult["Role"];?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <br>
                    <label>Salary</label>
                    <input type="text" id='salary' name='salary' class="form-control" required />
                    <label>Password (Delete password befor update password)</label>
                    <input type="password" id='password' name='password' class="form-control" required />
                    <br>
                    <input type="submit" id="insert"  class="btn btn-success" />
                </form>
            </div>
            <div class ="modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>    
            </div>
        </div>
    </div>
</div>