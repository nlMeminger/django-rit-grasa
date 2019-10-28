{% include "header.php" %}
{% load static %}

<div class="container home-container">

	<div class="row">
    <!--Top Row-->
        <div class="col-sm-9 card">
            <div class="card-body">
                    <div class="dropdown">
                      <a class="btn btn-link dropdown-toggle float-right " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cogs" aria-hidden="true"></i> Settings
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item changeEmailLink" href="#">Change Email</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#changePWModal" href="#">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="#">Change Site Logo</a>
                          
                      </div>
                    </div>
                <h2>Admin Portal</h2>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                         <!--email-->
                         <span id="pEmail">
                             <h5 class="provider-info">
                                 <i class="fa fa-envelope fa-fw" aria-hidden="true"></i> {{ user }}
                             </h5>
                        </span>
                        <!-- edit email-->
                        <form>
                            
                             <div class="input-group mb-3 changeEmailInput">
                                <input type="text" class="form-control" placeholder="{{ user }}" aria-label="{{ user }}" value="{{ user }}" name="changeemail">
                              <div class="input-group-append">
                                <button class="btn btn-outline-primary changeEmailSave" type="button" id="button-addon2">Save</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <button type="button" class="btn btn-secondary" id="allUsers"><i class="fa fa-user" aria-hidden="true"></i> View Providers</button>
                <button type="button" class="btn btn-warning" id="allAdmins"><i class="fa fa-user-secret" aria-hidden="true"></i> View Admins</button>
                <button type="button" class="btn btn-info float-right" id="allEvents"><i class="fa fa-calendar" aria-hidden="true"></i> View All Events</button>
                
            </div>
        </div>
        <div class="col-sm-3">
            <h5 class="text-center">Site Logo</h5><hr>
            <div class="card event-page-card">
              <img src="{% static 'img/grasalogo.png' %}" class="admin-logo-change" alt="Site Logo">
            </div>
        </div>
    </div>
    

	<div class="twentyblock"></div>
	<div class="row">
        <div class="col-sm-12">
        <h2 class="row col-sm-12 top-20">Approval Requests</h2>
            <hr>
            
        
        <!--New User Approval-->
            <h4 class="top-20">Pending Users</h4>
                <table class="table table-bordered">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Organization Name</th>
                      <th scope="col">Alternative Contact</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="list-header-fix">Approve</th>
                      <th scope="col" class="list-header-fix">Deny</th>
                    </tr>
                  </thead>
                  <tbody class="provider-program-list">
                    <tr>
                    {% for pendingUser in pendingUserList %}
                      <td scope="row">{{ pendingUser.org_name }}<br>
                      <i class="fa fa-envelope" aria-hidden="true"></i> Login: <a href="mailto:{{ pendingUser.user }}">{{ pendingUser.user }}</a></td>
                      <td><i class="fa fa-user fa-fw" aria-hidden="true"></i> {{ pendingUser.contact_name }}<br>
                      <i class="fa fa-envelope fa-fw" aria-hidden="true"></i> <a href="mailto:{{ pendingUser.contact_email }}">{{ pendingUser.contact_email }}</a><br>
                      <i class="fa fa-phone fa-fw" aria-hidden="true"></i> {{ pendingUser.contact_phone }}
                      </td>
                      <td>Pending</td>
                      <td><a href="{% url 'approve_user' pendingUser.id %}"><button type="button" class="btn btn-outline-success">Approve</button></a></td>
                      <td><a href="{% url 'deny_user' pendingUser.id %}"><button type="button" class="btn btn-outline-danger">Deny</button></a></td>
                    </tr>
                    {% endfor %}
                  </tbody>
                </table>
        <!--New Event Approval-->
            <div class="twentyblock"></div>
            <h4 class="top-20">New Events</h4>
                <table class="table  table-bordered">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Event Name</th>
                      <th scope="col">Organization</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="list-header-fix">View</th>
                      <th scope="col" class="list-header-fix">Approve</th>
                      <th scope="col" class="list-header-fix">Deny</th>
                    </tr>
                  </thead>
                  <tbody class="provider-program-list">
                    {% for pendingEvent in pendingEventList %}
                    <tr>
                      <th scope="row">{{ pendingEvent.title }}</th>
                      <td>{{ pendingEvent.user_id.org_name }}</td>
                      <td>Pending</td>
                      <td><a href="{% url 'event_page' pendingEvent.id %}"><button type="button" class="btn btn-outline-info view-event">View</button></a></td>
                      <td><a href="{% url 'approve_event' pendingEvent.id %}"><button type="button" class="btn btn-outline-success">Approve</button></a></td>
                      <td><a href="{% url 'deny_event' pendingEvent.id %}"><button type="button" class="btn btn-outline-danger">Deny</button></a></td>
                    </tr>
                    {% endfor %}
                  </tbody>
                </table>
        <!--Updated Event Approval-->
            <div class="twentyblock"></div>
            <h4 class="top-20">Updated Events</h4>
                <table class="table table-bordered">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Event Name</th>
                      <th scope="col">Organization</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="list-header-fix">View</th>
                      <th scope="col" class="list-header-fix">Approve</th>
                      <th scope="col" class="list-header-fix">Deny</th>
                    </tr>
                  </thead>
                  <tbody class="provider-program-list">
                    {% for pendingEdit in pendingEditList %}
                    <tr>
                      <th scope="row">{{ pendingEdit.title }}</th>
                      <td>{{ pendingEdit.user_id.org_name }}</td>
                      <td>Pending</td>
                      <td><a href="{% url 'event_page' pendingEdit.id %}"><button type="button" class="btn btn-outline-info view-event">View</button></a></td>
                      <td><a href="{% url 'approve_event' pendingEdit.id %}"><button type="button" class="btn btn-outline-success">Approve</button></a></td>
                      <td><a href="{% url 'deny_event' pendingEdit.id %}"><button type="button" class="btn btn-outline-danger">Deny</button></a></td>
                    </tr>
                    {% endfor %}
                  </tbody>
                </table>
        </div><!-- col-->
    </div><!--row-->
    <div class="twentyblock"></div>
    
    <!-- Change Password Modal -->
    <div class="modal fade" id="changePWModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <form id="theForm" class="needs-validation" novalidate>
      <div class="modal-body">

        <div class="row">
            <div class="col-sm-12">

                <div class="form-group col-md-12">
                    <label for="resetPW">Current Password</label>
                    <input type="password" id="currPW" class="form-control" name="emailAddr" placeholder="" required autofocus>
                    <div class="invalid-feedback">
                        For security purposes please provide your current password.
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="myPW">New Password</label>
                    <input type="password" id="myPW" class="form-control" name="current" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <div class="invalid-feedback">
                      <p>Password must contain the following:</p>
                        <ul>
                          <li>A <b>lowercase</b> letter</li>
                          <li>A <b>capital (uppercase)</b> letter</li>
                          <li>A <b>number</b></li>
                          <li>Minimum <b>8 characters</b></li>
                        </ul>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="confirmPW">Confirm New Password</label>

                    <input type="password" id="confirmPW" class="form-control" name="confirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <div class="invalid-feedback">
                        Passwords must match.
                    </div>
                    <input id="SPcheckbox" type="checkbox" onclick="myFunction()">
                    <label for="SPcheckbox">&nbsp; Show Password</label>
                </div>

            </div>
        </div>
      </div> 

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="Submit">Save Changes</button>
      </div>
    </form>
        </div>
      </div>
    </div>
	
</div>
<script>
    var viewBtns = document.getElementsByClassName('view-event')
    for(var i=0; i<viewBtns.length; i++){
        viewBtns[i].onclick = function(){
            window.location = 'event.php'
        }
    }
    
    //Toolbar Links
    var allUsersBtn = document.getElementById('allUsers');
    allUsersBtn.onclick = function(){
        window.location = 'allUsers.php'
    }
    var allUsersBtn = document.getElementById('allAdmins');
    allUsersBtn.onclick = function(){
        window.location = 'allAdmins.php'
    }
    var allEventsBtn = document.getElementById('allEvents');
    allEventsBtn.onclick = function(){
        window.location = 'allEvents.php'
    }
    
    //Change Email
    addSettings('changeEmailLink', 'changeEmailSave', 'changeEmailInput', 'pEmail')
    
    function addSettings(editBtn, saveBtn, inputBox, label){
        var editBtn = document.getElementsByClassName(editBtn)[0]
        var saveBtn = document.getElementsByClassName(saveBtn)[0]
        var inputBox = document.getElementsByClassName(inputBox)[0]
        var label = document.getElementById(label);
        editBtn.onclick = function(){
            label.style.display ="none";
            inputBox.style.visibility="visible";
            inputBox.style.height = "auto"
        }
        saveBtn.onclick = function(){
            inputBox.style.visibility = "hidden";
            setTimeout(function(){
                inputBox.style.height = "0px"
                label.style.display ="block";
            }, 500);

        }
    }
    
     //confirm password extra validation
    $('#confirmPW').keyup(function() {
      if ( document.getElementById("confirmPW").value != document.getElementById("myPW").value ) {
          if(document.getElementById("theForm").classList.contains('was-validated')){
              $('#confirmPW').removeClass( "is-invalid" );
              $('#confirmPW').addClass( "is-valid" );
              $('#confirmPW').css('border', 'solid 1px #28a745');
          }
      }
    });
    
   
    //password validation - Lei
    function myFunction() {
      var x = document.getElementById("myPW");
      var y = document.getElementById("confirmPW");
      if (x.type === "password" || y.type === "password") {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }

    }

   //validation
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if ( document.getElementById("confirmPW").value != document.getElementById("myPW").value ) {
                //if passwords don't match
                event.preventDefault();
                event.stopPropagation();
                $('#confirmPW').addClass( "is-invalid" );
                $('#confirmPW').css('border', 'solid 1px #dc3545')
                $('#confirmPW').css('background-image', 'none'); 
            }else if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
            
          }, false);
        });
      }, false);
    })();
    
</script>
		
{% include "footer.php" %}