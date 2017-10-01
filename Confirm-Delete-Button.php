<button  onclick="getStudentId(this)" type="button" class="btn btn-danger" data-toggle="modal" value="<?php echo $student['id'] ?>" data-target="#myModal">Delete</button>
<!--  modal button -->


<!-- Modal Start -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog mw300px">
      <div class="modal-content">
          <div class="modal-body text-center">
              
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <br>
              <p>Are you sure to delete this item?</p>

              <script>
                  function getStudentId(clicked){
                      var x = clicked.value;
                      var y = "view/admin/student/delete.php?id="+x;
                      document.getElementById('confirm_delete').href=y;
                  }
              </script>

              <a class="btn btn-danger" id="confirm_delete" href="">Yes, Delete This!</a>

          </div>
      </div>
  </div>
</div>
<!-- Modal END -->



