<!DOCTYPE html>
<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script>
			//set vars
			var today = A = "";
			var h = m = s = 59;

			//request time from server and set h, m, s, and A
			function serverRequest() {
				$.ajax({
        type: "POST",
        data:{ timezone: new Date().getTimezoneOffset() }, // offset in minutes from UTC
        url: "get-time.php",
        success: function(result){
                today = result; //H:i:s A (11:24:04 AM)
                h = parseInt(today.substring(0, 2));
								m = parseInt(today.substring(3, 5));
								s = parseInt(today.substring(6, 8));
								A = today.substring(9, 11);
            }
      	});
			}

			function checkTime(i) {
			   if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
			   return i;
			}

			//update the current time and display in txt
			function updateTime() {
				if(m != 59 || s != 59){
					if(s != 59)
						s += 1;
					else{
						s = 0;
						m += 1;
					}
				}else{
					serverRequest();
				}

				if(h == 59) $("#txt").html("Loading...");
				else $("#txt").html(h+":"+checkTime(m)+":"+checkTime(s)+" "+A);
				var t = setTimeout(function(){updateTime()},1000);
			}

		</script>
	</head>

	<body onload="updateTime()">

		<div id="txt"></div>

	</body>
</html>