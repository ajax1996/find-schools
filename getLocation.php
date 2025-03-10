
<form method="get">
   	<button onclick="getLocation()" type="button">Give Geo Location</button>

		  			<p id="demo" name="demo"></p>

					<script>
					var x = document.getElementById("demo");
					function getLocation() {
					    if (navigator.geolocation) {
					        navigator.geolocation.getCurrentPosition(showPosition);
					        

					    } else { 
					        x.innerHTML = "Geolocation is not supported by this browser.";
					    }
					}

					function showPosition(position) {
					    x.innerHTML =position.coords.latitude + 
					    "," + position.coords.longitude;

					}
					</script>
					<input type="submit" name="Register">
					<?php
						if(isset($_POST['demo']))
						{
							echo $_POST['demo'];
						}
					?>
   </form>
   