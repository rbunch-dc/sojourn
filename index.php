<?php

	include 'inc/db_connect.php';

	if($_GET['logout'] == 'true'){
		session_destroy();
	}

	$query = "SELECT * FROM about";
	//We have a var called query with our query in it
	$result = mysql_query($query);
	//We now have a mysql object called result!
	if(!$result){
		die('Query error: ' . mysql_error());
		//this will print off our error, if one happens;
	}

	while ($row = mysql_fetch_assoc($result)) { 
		$section = $row["section"];
		$rows[$section] = $row['content'];
		// $rows['header'] = 'Our lives take us on many journeys; with our careers, families, sports teams, schools, etc...  At Sojourn, our desire is to provide a safe and fun environment to Sojourn from these life journeys for a brief period of time in order to reflect, gain new insight, and enter back into our journeys with new perspective.';


		// $rows is an array!!!

		// $rows['header']
		// $rows['video_caption']
		// $rows['body1']


	}



// exit;
	// print "<pre>";
	// print_r ($rows);
	// exit;


	$header_content = $rows[0]['content'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Sojourn Adventures
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div id="page">
	<div id="header">
		<div id="header-upper">
			<div class="header-inner">

				<a href="">Prepare for Your Adventure</a>

				<a href="http://twitter.com/SojournAdven" target="twitter">
					<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/tw_32x32.png" border="0">
				</a>
				<a href="http://www.facebook.com/sojournadventures" target="facebook">
					<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/fb_32x32.png" border="0">
				</a>
				<a href="http://instagram.com/SojournAdventures#" target="igram">
					<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/ig_32x32.png" border="0">
				</a>
				<a href="">Feedback</a>
			</div>

		</div>
		<div id="header-lower">
			<div class="header-inner">
				<img src="http://pq.b5z.net/i/u/10099375/i/sojourn_logo_header.png" border="0" alt="" width="368" height="107">

				<div id="menu">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">About Us</a></li>
						<li><a href="">Programs</a></li>
						<li><a href="">Leadership</a></li>
						<li><a href="">Contact Us</a></li>
					</ul>

				</div>
			</div>
		</div>
	</div>

	<div id="content">
		<div id="left-rail">
			<div id="body-header">
				<div id="img-left">
					<img src="http://pq.b5z.net/zirw/317/i/u/10099375/i/menu/tico1.png">
				</div>
				<div id="text-right">

<?php

	

?>



				</div>
			</div>
			<div class="body-content first">
				<img src="http://pq.b5z.net/i/u/10099375/i/About_Sojourn_Header.jpg" class="esbIc esbIn" width="690" height="200">
				<div class="body-text">

					<?php print $rows['header']; ?>
				</div>
				<div class="body-image">

					<a href="http://www.myfoxatlanta.com/story/22039997/church-ropes-course-is-leap-of-faith" target="_blank">
						<img src="http://pq.b5z.net/i/u/10099375/i/Fox_5_Video_of_Sojourn.png" class="esbIc esbId" width="200" height="100">
					</a>
					<div class="body-image-caption"><?php print $rows['video_caption']; ?></div>

				</div>
			</div>


			<div class="body-content">

				<div class="body-content-title">Location</div>

				<div class="body-text">
						<?php print $rows['body1']; ?>
				</div>

				<div class="body-image">
					<a href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=9500+Medlock+Bridge+Rd,+Duluth,+GA+30097&amp;sll=34.013174,-84.191644&amp;sspn=0.008395,0.013111&amp;ie=UTF8&amp;hq=&amp;hnear=9500+Medlock+Bridge+Rd,+Duluth,+Fulton,+Georgia+30097&amp;ll=34.012827,-84.190979&amp;spn=0.268648,0.41954&amp;z=11" target="_blank">
						<img src="http://pq.b5z.net/i/u/10099375/i/Get_Directions_to_Ropes_Course_Button.png" class="esbIc esbId" width="200" height="100">
					</a>
				</div>

				<div class="body-text">
					If location is a challenge, ask us about off-site adventures and portable programs.
				</div>

			</div>

			<div class="body-content">
				<div class="body-content-title">ACCT Membership</div>
				<div class="body-text">
					The Association for Challenge Course Technology is recognized as the leading professional resource for those who create safe and effective challenge course programs that facilitate learning and positive change in individuals, groups, and communities. We are an organizational member of ACCT and our products and services are independent crom those offered by ACCT.  We are not an agent of ACCT nor does the ACCT warrant, endorse, or approve any product or service offered by us.  Sojourn operates under the standards set by ACCT.  All of our staff members are training according to ACCT standards and our key staff members have advanced ACCT certification.		
				</div>
				<div class="body-image">
					<a href="http://www.acctinfo.org" target="_blank">
						<img src="http://pq.b5z.net/i/u/10099375/i/ACCT_Logo_Button.png" class="esbIc esbId" width="200" height="100">
					</a>			
				</div>
			</div>

			<div class="body-content no-image last">
				<div class="body-content-title">Pricing</div>
				<div class="body-text">
					Pricing varies depending on the length of your adventure, size of your group, and the activities necessary to attain certain group goals and objectives.  For full pricing and further details about booking a course, please <a href="">contact the Sojourn office</a>.
				</div>

				<div class="body-text fine-print">

					Note:  Sojourn currently focuses exclusively on team building with pre-existing groups and therefore does not allow individual sign-ups for zip lining, birthday parties, or similar outings.

				</div>

			</div>

		</div>

		<div id="right-rail">
			<ul>
				<li><a href="/contact_us"><img src="http://pq.b5z.net/i/u/10099375/i/Get_a_Quote.png" class="esbIc esbIn" width="200" height="100"></a></li>
				<li><a href="/photo_gallery"><img src="http://pq.b5z.net/i/u/10099375/i/Photo_Gallery_Button.png" class="esbIc esbIn" width="200" height="70"></a></li>
				<li><a href="/elements"><img src="http://pq.b5z.net/i/u/10099375/i/video_tour_button.png" class="esbIc esbIn" width="200" height="70"></a></li>
				<li><a href="/prepare"><img src="http://pq.b5z.net/i/u/10099375/i/Prepare_for_Your_Event_Sidebar_Button.png" class="esbIc esbIn" alt="Prepare for your Event button" width="200" height="70"></a></li>
			</ul>

		</div>

	</div>
	<div id="footer">
		<div id="footer-content">
			<div class="footer-inner left">
				<ul>
					<?php print $rows['address']; ?>
				</ul>
				<img alt="Association for Challenge Course Technology" src="http://q.b5z.net/i/u/10099375/i/acct_logo_footer.png">
			</div>
			<div class="footer-inner right">
				<a href="staff_login">
					<img alt="Ropes Course Staff Login" src="http://q.b5z.net/i/u/10099375/i/staff_login_button_footer.png">
				</a>
			</div>			
		</div>
	</div>

</div>

</body>
</html>