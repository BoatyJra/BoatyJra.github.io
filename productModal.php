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
                <h4 class ="modal-title">Product Details</h4>
            </div>
            <div class = "modal-body">
            <form method="post" id="insert-form">
                    
                    <input type="hidden" id='id' name = "id"/>
                    <label>Count</label>
                    <input type="number" id='count' name='count' class="form-control" min = '0' step = '1' required />
                    <label>Price</label>
                    <input type="number" id='price' name='price' class="form-control" min = '0' step = '1' required />

                    <input type="submit" id="insert"  class="btn btn-success" />
                </form>
            </div>
            <div class ="modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>    
            </div>
        </div>
    </div>
</div>