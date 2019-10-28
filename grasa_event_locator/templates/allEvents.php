{% include "header.php" %}
<div class="row allUsersContainer">
    <div class="col-sm-12">
        <div class="twentyblock"></div>
        <h2 class="text-center">All Events</h2>
        <button type="button" class="btn btn-info float-left" style="margin-bottom: 10px;" id="backBtn"> <i class="fa fa-chevron-left" aria-hidden="true" ></i> Back to Admin Portal</button>
        
        
        <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Organization</th>
                  <th scope="col">Date Created</th>
                  <th scope="col" class="list-header-fix">View</th>
                  <th scope="col" class="list-header-fix">Delete</th>
                </tr>
              </thead>
              <tbody class="provider-program-list">
                <tr>
                  <td>Put Name Here</td>
                  <td>Put Org Here</td>
                  <td>Put Date Here</td>
                  <td><button type="button" class="btn btn-outline-info">View</button></td>
                  <td><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">Delete</button></td>
                </tr>

                <!--Delete Modal-->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       Are you sure you want to delete this Event? This cannot be undone.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Never Mind</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="">Confirm Delete</button>

                      </div>
                    </div>
                  </div>
                </div>
                

              </tbody>
            </table>
    </div>
</div>


<script>
    var backBtn = document.getElementById('backBtn');
    backBtn.onclick = function(){
        window.location = 'admin.php'
    }

</script>
{% include "footer.php" %}