<!------- FOR DELETE BUTTON ---------->
          <!-- Modal -->
          <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Delete Student Data</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
  </div>

  <form action="connection.php" method="post" autocomplete="off">
      <div class="modal-body">
      
      <div class="form-group">
          <label for="">Student Number</label>
          <input type="text" name="delete_id" id="delete_id" class="form-control" readonly>
        </div>
        <!-- <input type="hidden" name="delete_id" id="delete_id"> -->
           
            <h4> Are you sure you want to delete this Data? </h4>

          <div class="modal-footer">
          <button type="submit" name="delete" class="btn btn-danger">DELETE DATA</button>
      </div>
      </div>
  </form>
    </div>
    </div>
  </div>
</div>
