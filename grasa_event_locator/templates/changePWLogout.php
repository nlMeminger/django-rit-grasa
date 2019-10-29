{% include "header.php" %}


  <div class="form-changePW">
	<form method="post">
	{% csrf_token %}
		<label for="currentPW">New Password</label>
		<input type="password" id="currentPW" class="form-control" name="new" required autofocus>
		</br>
		<label for="newPW">Confirm Password</label>
		<input type="password" id="newPW" class="form-control" name="confirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
		<input type="checkbox" onclick="myFunction()"> &nbsp; Show Password
		</br>


	<!--Pop-up confirmation page after clicking submit button on Registration form-->
	<div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
        </div>
	</div>

	</form>
  </div>

<script>
function myFunction() {
  var x = document.getElementById("currentPW");
  var y = document.getElementById("newPW");
  if (x.type === "password" || y.type === "password") {
    x.type = "text";
	y.type = "text";
  } else {
    x.type = "password";
	y.type = "password";
  }
}
</script>

{% include "footer.php" %}

