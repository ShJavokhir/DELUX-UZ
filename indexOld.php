<?php
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online test tizimi</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
    font-family: calibri, sans-serif;
    border-collapse: collapse;
    width: 100%;
   
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    color: #000;
}

tr:nth-child(even) {
    background-color: #ffffcc
;
}
</style>
<link rel="stylesheet" type="text/css" href="index res/styles/bootstrap4/bootstrap.min.css">
<link href="index res/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="index res/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="index res/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="index res/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="index res/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="index res/styles/responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="index res/images/logo.png" alt="">
					<span>Delux.uz</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="#">home</a></li>
						<li class="main_nav_item"><a href="#">about us</a></li>
						<li class="main_nav_item"><a href="courses.html">courses</a></li>
						<li class="main_nav_item"><a href="elements.html">elements</a></li>
						<li class="main_nav_item"><a href="news.html">news</a></li>
						<li class="main_nav_item"><a href="contact.html">contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<?php 
				if ($_SESSION['u_id']) {
					echo "<span><a href='/admin/index.php'>Salom ".$_SESSION['u_name']."</a>";
				}else{
					echo "<span><a href='login.php'>Kirish</a>  /  <a href='registration.php'>Ro`yhatdan o`tish</a></span>";
				}
			 ?>
			
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="#">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">About us</a></li>
					<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
					<li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
					<li class="menu_item menu_mm"><a href="news.html">News</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url('index res/images/slider_background.JPG')"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Online test tizimi !</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url('index res/images/slider_background.jpg')"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">O'z testlaringizni joylang !</h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url('index res/images/slider_background.jpg')"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Testlar ishlab bilimingizni tekshirib ko'ring !</h1>
						</div>
					</div>
				</div>

			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">Keyingi</span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">Oldingi</span></div>
		</div>

	</div>

	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">

					<div class="col-lg-6 hero_box_col">
						<a href="umumiy_t.php">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="index res/images/earth-globe.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h1 class="hero_box_title">Umumiy testlar</h1>
								
							</div>
						</div>
						</a>
					</div>

					<div class="col-lg-6 hero_box_col">
						<a href="ichki_t.php">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="index res/images/earth-globe.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h1 class="hero_box_title">Ichki testlar</h1>
								
							</div>
						</div>
						</a>
					</div>
					

				</div>
			</div>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>So'ngi umumiy testlar natijalari</h1>
					</div>
				</div>
			</div>
			<table class="table table-hover">
  <tr>
    <th>Ism familiyasi</th>
    <th>Test mavzusi</th>
    <th>Testlar soni</th>
  	<th>To'g'ri belgilanganlar</th>
  	<th>Noto'g'ri belgilanganlar</th>
  	<th>Foiz</th>
  	<th>Ball</th>
  </tr>
  <?php 
  	include_once("db_functions.php");
  	$query = "SELECT * FROM u_user_taken_test order by id DESC LIMIT 20";
  	$result = queryMysql($query);
  	while($row=mysqli_fetch_assoc($result)){
  		echo "<tr>";
  		echo "<td>".$row['name']." ".$row['surname']."</td>";
		echo "<td>".$row['test_name']."</td>";
  		echo "<td>".$row['tests_number']."</td>";
  		echo "<td>".$row['correct_test']."</td>";
  		echo "<td>".$row['tests_number']."</td>";
  		echo "<td>".$row['tests_number']."</td>";
  		echo "<td>".$row['ball']."</td>";
  		echo "</tr>";
  	}
   ?>
</table>
		<!-- Register -->

	<div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Hoziroq ro'yhatdan o'ting va o'z testlaringizni <span>bepul</span> joylashtiring</h1>
							<p class="register_text">Endi barchasi oddiy.O'quvchilarga testlarni qog'ozga ishlatish shart emas shunchaki o'z testlaringizni ushbu tizimga joylang va test topshirayotganlarni onlayn kuzatib o'tirish imkoniyatiga ega bo'ling .Hoziroq ishni boshlang :)</p>
							
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(index res/images/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">Ro'yhatdan o'tish</h1>
							<form method="POST" action="registration.php" class="form-signin">
      
      <br>
       <label for="inputEmail" class="sr-only">Login</label>
      <input type="text" name="username" pattern="[A-Za-z]{1,20}" title="Iltimos loginni to'g'ri kiriting (faqat Lotin harflaridan foydalaning s) !!" class="form-control" placeholder="Login" required="" autofocus="">
      <br>
      <label for="inputEmail" class="sr-only">Ism</label>
      <input type="text" name="name" pattern="[A-Za-z]{1,20}" title="Iltimos ismni to'g'ri kiriting !!" class="form-control" placeholder="Ism" required="" autofocus="">
      <br>
      <label for="inputEmail" class="sr-only">Familiya</label>
      <input type="text" name="surname" id="inputEmail" title="Iltimos familiyani to'g'ri kiriting !!" pattern="[A-Za-z]{1,30}" class="form-control" placeholder="Familiya" required="" autofocus="">
<br>
      <label for="inputEmail" class="sr-only"></label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Elektron pochta" required="" autofocus="">
      <br>
      <label for="inputPassword" class="sr-only">Parol</label>
      <input type="password" name="password" id="inputPassword" pattern=".{6,}" title="Parol 6 ta belgidan kam bo'lmasligi kerak !" class="form-control" placeholder="Parol" required="">
      <br>
      <p></p>
      <br>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Ro'yhatdan o'tish</button>
      <br>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
						</div> 
					</div>

				</div>
			</div>
		</div>
	</div>

	
	<!-- Services -->

	<div class="services page_section">
		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Tizim imkoniyatlari</h1>
					</div>
				</div>
			</div>

			<div class="row services_row">

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="index res/images/earth-globe.svg" alt="">
					</div>
					<h3>Testlarni xavfsiz ishlash</h3>
					<p>Siz tizim orqali testlarni xavsiz topshirishingiz mumkin.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="index res/images/exam.svg" alt="">
					</div>
					<h3>Tezkor tekshirish</h3>
					<p>Testlarni ishlab bo'lgandan so'ng natijalarni bir necha soniyalarda ko'rishingiz mumkin.Bundan tashqari o'z natijalaringizni .pdf shaklida ham yuklab olishingiz mumkin .</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="index res/images/books.svg" alt="">
					</div>
					<h3>Kutubxona xizmati</h3>
					<p>Saytning kutubxona bo'limida o'zingizga yoqqan kitoblarni yuklab olishingiz mumkin bo'ladi<p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="index res/images/mortarboard.svg" alt="">
					</div>
					<h3>Testlar joylash</h3>
					<p>Bundan tashqari o'qituvchilar uchun qulaylik.Endi siz ushbu tizimga o'z testlaringizni bepul joylab o'z o'quvchilaringizga taqdim qilishingiz .Xammasi ishonchli va xavsiz. </p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="index res/images/blackboard.svg" alt="">
					</div>
					<h3>Top Programs</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<img src="index res/images/mortarboard.svg" alt="">
					</div>
					<h3>Graduate Diploma</h3>
					<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
				</div>

			</div>
		</div>
	</div>


	<div class="events page_section">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Upcoming Events</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">07</div>
									<div class="event_month">January</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Student Festival</a></div>
									<div class="event_location">Grand Central Park</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="index res/images/event_1.jpg" alt="https://unsplash.com/@theunsteady5">
								</div>
							</div>

						</div>	
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">07</div>
									<div class="event_month">January</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Open day in the Univesrsity campus</a></div>
									<div class="event_location">Grand Central Park</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="index res/images/event_2.jpg" alt="https://unsplash.com/@claybanks1989">
								</div>
							</div>

						</div>	
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">07</div>
									<div class="event_month">January</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Student Graduation Ceremony</a></div>
									<div class="event_location">Grand Central Park</div>
									<p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="index res/images/event_3.jpg" alt="https://unsplash.com/@juanmramosjr">
								</div>
							</div>

						</div>	
					</div>
				</div>

			</div>
				
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<!-- Newsletter -->

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Subscribe to newsletter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email Address" required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="index res/images/logo.png" alt="">
								<span>course</span>
							</div>
						</div>

						<p class="footer_about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum, tempor lacus.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Home</a></li>
								<li class="footer_list_item"><a href="#">About Us</a></li>
								<li class="footer_list_item"><a href="courses.html">Courses</a></li>
								<li class="footer_list_item"><a href="news.html">News</a></li>
								<li class="footer_list_item"><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Usefull Links</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Testimonials</a></li>
								<li class="footer_list_item"><a href="#">FAQ</a></li>
								<li class="footer_list_item"><a href="#">Community</a></li>
								<li class="footer_list_item"><a href="#">Campus Pictures</a></li>
								<li class="footer_list_item"><a href="#">Tuitions</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="index res/images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Blvd Libertad, 34 m05200 Arévalo
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="index res/images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									0034 37483 2445 322
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="index res/images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>hello@company.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

</div>

<script src="index res/js/jquery-3.2.1.min.js"></script>
<script src="index res/styles/bootstrap4/popper.js"></script>
<script src="index res/styles/bootstrap4/bootstrap.min.js"></script>
<script src="index res/plugins/greensock/TweenMax.min.js"></script>
<script src="index res/plugins/greensock/TimelineMax.min.js"></script>
<script src="index res/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="index res/plugins/greensock/animation.gsap.min.js"></script>
<script src="index res/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="index res/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="index res/plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="index res/plugins/easing/easing.js"></script>
<script src="index res/js/custom.js"></script>

</body>
</html>