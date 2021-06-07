
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
                    <input type="hidden" id='id' name = "id"/>
                    <label>Seat Price</label>
                    <input type="text" id='seat_price' name='seat_price' class="form-control" required />
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