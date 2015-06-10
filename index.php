<!DOCTYPE html>
<html>
	<head>
		<!-- jquery -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script>
			//set vars: today - today's time, A - AM/PM, h - hours, m - minutes, s - seconds
			var today = A = "";
			var h = m = s = 59;

			//request time from server and set h, m, s, and A
			function serverRequest() {
				$.ajax({
        type: "POST",
        data:"", // offset in minutes from UTC
        url: "get-time.php",
        success: function(result){
                today = result; //returned as "H:i:s A" example: (11:24:04 AM)
                h = parseInt(today.substring(0, 2));
								m = parseInt(today.substring(3, 5));
								s = parseInt(today.substring(6, 8));
								A = today.substring(9, 11);
            }
      	});
			}

			//pad minutes and seconds for display
			function checkTime(i) {
			   if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
			   return i;
			}

			//update the current time and display in txt
			function updateTime() {
				if(s != 59){
					s++;
				}else if(m != 59){
					s =0 ;
					m++;
				}else{
					//request server time at the end of each hour
					serverRequest();
				}

				//set Loading tag while the server fetches a timestamp
				if(h == 59) $("#txt").html("Loading...");
				else $("#txt").html(h+":"+checkTime(m)+":"+checkTime(s)+" "+A);
				//update the time every second (minus calculation time)
				var t = setTimeout(function(){updateTime()},999);
			}

		</script>
	</head>

	<body onload="updateTime()">
		<!-- blank div for cock display -->
		<div id="txt"></div>
	</body>
</html>