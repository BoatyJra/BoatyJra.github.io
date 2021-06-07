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
                <h4 class ="modal-title">Details</h4>
            </div>
            <div class = "modal-body">
            <form method="post" id="insert-form">
                    <label>Movie Image</label>
                    <input type="hidden" id='id' name = "id"/>
                    <input type="text" id='image' name='image' placeholder="Pless upload your file to database folder and Enter form only file-name" class="form-control" required />
                    <label>Movie Name</label>
                    <input type="text" id='name' name='name' class="form-control" required />
                    <label>Date In</label>
                    <input type="date" id='date_in' name='date_in' class="form-control" required />
                    <label>Date Out</label>
                    <input type="date" id='date_out' name='date_out' class="form-control" required />
                    <label>Duration (minute)</label>
                    <input type="number" id='duration' name='duration' placeholder="60" step="1" min="0" max="300"class="form-control" required />
                    <label>Rating (0.0-5.0)</label>
                    <input type="number" id='rating' name='rating' placeholder="4.5" step="0.1" min="0" max="5"class="form-control" required />
                    <label>Movie Fund (million)</label>
                    <input type="number" id='fund' name='fund' placeholder="25.7 = 25.7 million" step="0.1" min="0"class="form-control" required />
                    <label>Limit Age</label> <br>
                    <select  name = "limit" class="div-toggle text-center w-100 text-center bg-warning form-select form-control" id="limit" >
                        <option  id = "limit" name = "role" value="0">No limit</option>
                        <option  id = "limit" name = "role" value="13">13+</option>
                        <option  id = "limit" name = "role" value="18">18+</option>
                        <option  id = "limit" name = "role" value="20">20+</option>
                    </select>
                    <br><label>Movie Status</label><br>
                    <select  name = "status" class="div-toggle text-center w-100 text-center bg-warning form-select form-control" id="status" >
                        <option  id = "status" name = "status" value="1">On Air</option>
                        <option  id = "status" name = "status" value="0">Not Soow</option>
                    </select>
                    <br><label>Movie Description</label>
                    <input type="text" id='description' name='description' class="form-control" required />
                    <label>Movie Trailer</label>
                    <input type="text" id='trailer' name='trailer' class="form-control" placeholder="use after 'https://www.youtube.com/watch?' " required />
                    
                    <input type="submit" id="insert"  class="btn btn-success" />
                </form>
            </div>
            <div class ="modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>    
            </div>
        </div>
    </div>
</div>