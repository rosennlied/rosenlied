<!DOCTYPE html>
<html lang="en">
<head>
<style>
		.rules-content {
			opacity: 0;
			transform: translateY(-30px);
			transition: opacity 0.6s cubic-bezier(.4,0,.2,1), transform 0.6s cubic-bezier(.4,0,.2,1);
		}
		.tab-card.show .rules-content {
			opacity: 1;
			transform: translateY(0);
		}
		.tab-card.hide .rules-content {
			opacity: 0;
			transform: translateY(30px);
			transition: opacity 0.6s cubic-bezier(.4,0,.2,1), transform 0.6s cubic-bezier(.4,0,.2,1);
		}
</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	   <div class="profile-card">
		  <nav class="card-nav">
			  <ul>
				  <li><a href="#" class="active" onclick="showTab('home');return false;">Home</a></li>
				  <li><a href="#" onclick="showTab('profile');return false;">Profile</a></li>
				  <li><a href="#" onclick="showTab('rules');return false;">Rules</a></li>
				  <li><a href="#" onclick="showTab('interest');return false;">Interest</a></li>
			  </ul>
		  </nav>
		  <div class="card-date" id="card-date"></div>
		   <div style="position:absolute;top:10px;right:16px;z-index:2;">
								<button id="audio-toggle" style="padding:4px 12px;border-radius:6px;border:none;background:#e5dcc5;color:#333;cursor:pointer;font-weight:bold;">▶</button>
								<audio id="audio" src="XOXZ - IVE.mp3" autoplay muted style="display:none"></audio>
							</div>
	   </div>
	   <div id="tab-home" style="display:block;">
		   <!-- Konten Home -->
	   </div>
	<div id="tab-profile" class="tab-card collapse">
		   <div class="card-content">
			   <div class="card-image">
				   <img src="R2.jpg" alt="Profile Image" class="card-img">
			   </div>
			   <div class="card-info">
				   <div class="card-title">Profile</div>
				   <div class="card-details">Ini adalah halaman Profile.</div>
			   </div>
		   </div>
	   </div>
	<div id="tab-rules" class="tab-card">
				 <div class="card-title">Rules</div>
				 <div class="rules-content">
					 <p>Isi Rules</p>
					 <div class="card-details">Ini adalah halaman Rules.</div>
				 </div>
	   </div>
	<div id="tab-interest" class="tab-card" style="display:block;">
		   <div class="card-content" style="flex-direction:column;align-items:center;">
			   <div class="card-image">
				   <img src="R1.jpg" alt="Interest Image" class="card-img" style="width:3000px;max-width:100%;">
			   </div>
			   <div class="card-info">
				   <div class="card-title">Interest</div>
				   <div class="card-details">Ini adalah halaman Interest.</div>
			   </div>
		   </div>
	   </div>
	
	<audio id="bg-audio" src="XOXZ - IVE.mp3" preload="auto"></audio>
<button id="play-audio" style="display:none;">Play Audio</button>
	
	<script>
		// Audio play/pause control
document.addEventListener("DOMContentLoaded", function() {
	var audio = document.getElementById("audio");
	var btn = document.getElementById("audio-toggle");
	btn.addEventListener("click", function() {
		if (audio.paused) {
			audio.muted = false;
			audio.play();
			btn.textContent = "⏸";
		} else {
			audio.pause();
			btn.textContent = "▶";
		}
	});
});
		// Date berjalan di pojok kiri atas card dengan jam, menit, detik
		function pad(num) {
			return num < 10 ? '0' + num : num;
		}
		function updateDate() {
			var now = new Date();
			var options = { year: 'numeric', month: 'long', day: 'numeric' };
			var dateStr = now.toLocaleDateString('en-US', options);
			var timeStr = pad(now.getHours()) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds());
			document.getElementById('card-date').textContent = dateStr + ' ' + timeStr;
		}
		updateDate();
		setInterval(updateDate, 1000);

		   // Tab logic
		   function showTab(tab) {
			   var tabs = ['home','profile','rules','interest'];
			   tabs.forEach(function(t){
				   var el = document.getElementById('tab-' + t);
				   if (!el) return;
				   if (t === 'profile') {
					   el.style.display = 'block';
					   if (tab === 'profile') {
						   setTimeout(function(){
							   el.classList.add('show');
							   el.classList.remove('hide');
							   el.style.position = '';
							   el.style.left = '';
						   }, 500);
					   } else {
						   el.classList.remove('show');
						   el.classList.add('hide');
						   setTimeout(function(){
							   el.style.position = 'absolute';
							   el.style.left = '-9999px';
						   }, 500);
					   }
				   } else if (t === 'interest') {
					   el.style.display = 'block';
					   if (tab === 'interest') {
						   setTimeout(function(){
							   el.classList.add('show');
							   el.style.position = '';
							   el.style.left = '';
						   }, 500);
					   } else {
						   el.classList.remove('show');
						   el.classList.add('hide');
						   setTimeout(function(){
							   el.style.position = 'absolute';
							   el.style.left = '-9999px';
						   }, 500);
					   }
				   } else if (t === 'rules') {
					   el.style.display = 'block';
					   if (tab === 'rules') {
						   var prevProfile = document.getElementById('tab-profile');
						   if (prevProfile && prevProfile.classList.contains('hide')) {
							   setTimeout(function(){
								   el.classList.add('show');
								   el.classList.remove('hide');
								   el.style.position = '';
								   el.style.left = '';
							   }, 500);
						   } else {
							   el.classList.add('show');
							   el.classList.remove('hide');
							   el.style.position = '';
							   el.style.left = '';
						   }
					   } else {
						   el.classList.remove('show');
						   el.classList.add('hide');
						   setTimeout(function(){
							   el.style.position = 'absolute';
							   el.style.left = '-9999px';
							   el.classList.remove('hide');
						   }, 500);
					   }
				   } else {
					   el.style.display = (tab === t) ? 'block' : 'none';
				   }
			   });
			   // update active class
			   var navLinks = document.querySelectorAll('.card-nav a');
			   navLinks.forEach(function(link){
				   link.classList.remove('active');
			   });
			   var activeLink = Array.from(navLinks).find(function(link){
				   return link.textContent.trim().toLowerCase() === tab;
			   });
			   if(activeLink) activeLink.classList.add('active');
		   }
		   // Set default tab to Home on load
		   window.onload = function() {
			   showTab('home');
		   };
		   document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("toggle-rules");
  const rulesCard = document.getElementById("tab-rules");

  toggleBtn.addEventListener("click", function () {
    rulesCard.classList.toggle("show");

    // Ganti teks tombol sesuai status
    if (rulesCard.classList.contains("show")) {
      toggleBtn.textContent = "Tutup Rules";
    } else {
      toggleBtn.textContent = "Lihat Rules";
    }
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("toggle-rules");
  const rulesCard = document.getElementById("tab-rules");

  toggleBtn.addEventListener("click", function () {
    if (!rulesCard.classList.contains("showing")) {
      // buka rules
      rulesCard.classList.add("showing");
      toggleBtn.textContent = "Tutup Rules";
    } else {
      // tutup rules dengan animasi
      rulesCard.classList.remove("showing");
      toggleBtn.textContent = "Lihat Rules";

      // tunggu transisi selesai baru set visibility hidden
      setTimeout(() => {
        if (!rulesCard.classList.contains("showing")) {
          rulesCard.style.visibility = "hidden";
        }
      }, 500); // harus sama dengan durasi transition max-height (0.5s)
    }

    // pastikan visible saat mulai animasi buka
    rulesCard.style.visibility = "visible";
  });
});
	</script>
</body>
</html>






