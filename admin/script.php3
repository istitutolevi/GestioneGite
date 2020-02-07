<html>
<script>

var a = 0;
				function closemenu() {
			
					if (a % 2 == 0){
						openNav();
						a++;
				}
				else{
					closeNav();
					a++;
				}
		
		
		
		}
			function openNav() {
				document.getElementById("mySidenav").style.width = "250px";
				document.getElementById("main").style.marginLeft = "250px";
				document.getElementById("main1").style.marginLeft = "250px";
				
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
				document.getElementById("main1").style.marginLeft = "0px";
				
			
			}
			
			function AlertIt() {
		alert ("coming soon")
		}
			
			function myFunction() {
				var now = new Date();

				var day = ("0" + now.getDate()).slice(-2);
				var month = ("0" + (now.getMonth() + 1)).slice(-2);
				var today = (day) + "-" + (month) + "-" + now.getFullYear() ;

				document.getElementById("cur_data").value = today;
				document.getElementById("cur1_data").value = today;
			}
			
			function Conferma() {
			var txt;
			var r = confirm("Sei sicuro di eliminare tutte le proposte presenti nel Database? (i dati non potranno più essere recuperati)");
			if (r == true) {
			    window.location = "exe_svuota_proposte.php";
			} else {
			    window.location = "stampa_proposte.php";
			}
			
		}
	</script>
	</html>