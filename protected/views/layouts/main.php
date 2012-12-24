
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>

	<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="<?php

if (Yii::app()->user->isGuest) echo "not-logged-in";

?>">

<div id="top-bar">
	<div class="bar-inner">
        <h1>sixty four digits community</h1>
		<ul>
			<li class="active"><a id="logo" href="#"></a></li>
			<li><a href="#">games</a></li>
			<li><a href="#">music</a></li>
			<li><a href="#">art</a></li>
			<li><a href="#">examples</a></li>
		</ul>

		<div id="search-wrapper">
			<input placeholder="search" type="text" id="search-field" />
		</div>
	</div>
</div>

<div id="top-bar-sub">
	<div class="bar-inner">
		<ul>
			<li><a href="#">my page</a></li>
			<li><a href="#">submit</a></li>
			<li><a class="inbox-link" href="#"><span>inbox</span> <span class="inline-badge">212</span></a></li>
			<li><a href="#">settings</a></li>
			<li class="seperator"></li>
			<li><a href="#">log out</a></li>
		</ul>
	</div>
</div>


<div id="container">
	<div id="sidebar-wrapper">
		<div id="activity-box" class="section">
			<div class="section-header">
				<h1>Latest activity <span class="inline-badge">3*</span></h1>
				<a class="options" href="#">all &#9660;</a>
			</div>
            <div class="section-content">
                <ul id="activity-list" class="section-list">
                                    <li class="activity-music"><h2><a href="#">Hectocosm</a></h2>
                    <div class="meta"><a class="link-user " href="#"><span class="tiny-avatar"><img title="sirxemic" src="http://www.64digits.com/users/sirxemic/croxer-cropped.png"></span> sirxemic</a> submitted a new music <abbr title="2012/12/24 09:50PM">a few minutes ago</a></div></li>
                                    <li class="activity-blog"><h2><a href="#">S4D 2012 - UPDATE</a></h2>
                    <div class="meta"><a href="#"><span class="tiny-avatar"><img title="sirxemic" src="http://www.64digits.com/users/sirxemic/croxer-cropped.png"></span><span class="tiny-avatar"><img title="hel" src="http://www.64digits.com/users/hel/inuyasha/icon3.jpg"></span><span class="tiny-avatar"><img title="CyrusRoberto" src="http://www.64digits.com/users/CyrusRoberto/Pandora_ForKilinAvvy_80x802.png"></span> 3 users</a> commented <abbr title="2012/12/24 09:50PM">a few minutes ago</a></div></li>
                                    <li class="activity-music"><h2><a href="#">Slow Jazz Piece</a></h2>
                    <div class="meta"><a class="link-user " href="#"><span class="tiny-avatar"><img title="Rez" src="http://www.64digits.com/users/Rez/sprite04.png"></span> Rez</a> commented <abbr title="2012/12/24 09:50PM">less than an hour ago</a></div></li>
                                    <li class="activity-blog"><h2><a href="#">Im out (again)</a></h2>
                    <div class="meta"><a class="link-user " href="#"><span class="tiny-avatar"><img title="CyrusRoberto" src="http://www.64digits.com/users/CyrusRoberto/Pandora_ForKilinAvvy_80x802.png"></span> CyrusRoberto</a> submitted a new blog <abbr title="2012/12/24 09:50PM">a couple of hours ago</a></div></li>
                                    <li class="activity-blog"><h2><a href="#">64 Wolves All Running Amuck</a></h2>
                    <div class="meta"><a href="#"><span class="tiny-avatar"><img title="Kilin" src="http://www.64digits.com/users/Kilin/FlandrePumpkin.png"></span><span class="tiny-avatar"><img title="eagly" src="http://www.64digits.com/users/eagly/Calvin-making-faces.gif"></span><span class="tiny-avatar"><img title="sirxemic" src="http://www.64digits.com/users/sirxemic/croxer-cropped.png"></span> 3 users</a> commented <abbr title="2012/12/24 09:50PM">less than a day ago</a></div></li>
                                    <li class="activity-blog"><h2><a href="#">Nine Hours/Drinks Later....</a></h2>
                    <div class="meta"><a class="link-user " href="#"><span class="tiny-avatar"><img title="Kilin" src="http://www.64digits.com/users/Kilin/FlandrePumpkin.png"></span> Kilin</a> and <a class="link-user " href="#"><span class="tiny-avatar"><img title="Cesque" src="http://www.64digits.com/users/Cesque/wolf_anim2.gif"></span> Cesque</a> commented <abbr title="2012/12/24 09:50PM">less than a day ago</a></div></li>
					
                                </ul>
            </div>
		</div>
		<div id="online-users-box" class="section">
			<div class="section-header meta">
				<h1>Online users</h1>
			</div>
            <div class="section-content">
                <h2>4 guests and 3 registered users:</h2>
                <ul id="online-users-list">
					<li><a class="link-user " href="#"><span class="tiny-avatar"><img title="sirxemic" src="http://www.64digits.com/users/sirxemic/croxer-cropped.png"></span> sirxemic</a></li>
					<li><a class="link-user " href="#"><span class="tiny-avatar"><img title="CyrusRoberto" src="http://www.64digits.com/users/CyrusRoberto/Pandora_ForKilinAvvy_80x802.png"></span> CyrusRoberto</a></li>
					<li><a class="link-user " href="#"><span class="tiny-avatar"><img title="RC" src="http://www.64digits.com/users/RC/theeye-inverted.png"></span> RC</a></li>
					<li><a class="link-user " href="#"><span class="tiny-avatar"><img title="hel" src="http://www.64digits.com/users/hel/inuyasha/icon3.jpg"></span> hel</a></li>
					<li><a class="link-user " href="#"><span class="tiny-avatar"><img title="Kilin" src="http://www.64digits.com/users/Kilin/FlandrePumpkin.png"></span> Kilin</a></li>
					<li><a class="link-user " href="#"><span class="tiny-avatar"><img title="Cesque" src="http://www.64digits.com/users/Cesque/wolf_anim2.gif"></span> Cesque</a></li>
				</ul>
            </div>
		</div>
		<div id="new-users-box" class="section">
			<div class="section-header meta">
				<h1>New users</h1>
			</div>
            <div class="section-content">
                <ul id="new-users-list" class="section-list">
                    <li><a href="#">Sobstisse</a></li>
                    <li><a href="#">Gabreel</a></li>
                    <li><a href="#">aztygiles</a></li>
                </ul>
            </div>
		</div>
        <div id="ad-box" class="section">
			<div class="section-header meta">
				<h1>Advertisement</h1>
			</div>
            <div class="section-content">
                <h1 style="padding-bottom: 80px; font-size: 30px;">you are the 1,000,000th visitor hurrah!</h1>
            </div>
		</div>
	</div>

	<div id="main-wrapper">
        <div id="frontpage-heads-up" style="background: #000; padding: 80px">
            <p style="color: #ffd">space for awesome banners announcing events and such</p>
            <!--<img src="css/img/LOLOL.png">-->
        </div>
        
		<div class="frontpage-section">
			<div class="section-header">
				<h1>Latest submissions</h1>
				<ul class="options">
					<li><a href="#">games</a></li>
					<li class="active"><a href="#">music</a></li>
					<li><a href="#">art</a></li>
					<li><a href="#">miscellaneous</a></li>
				</ul>
				<a class="options dropdown" href="#">friends' &#9660;</a>
			</div>
            <div class="section-content">
                <div class="tiled-items-wrapper" data-item-minwidth="260">
                    <div class="tiled-items-row">
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/sirxemic/croxer-cropped.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 24</div>
                                <h1><a href="#">Hectocosm</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> sirxemic</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Lounge</span>
                                                                    <span class="tag">Reason</span>
                                                                    <span class="tag">Uhbik-A</span>
                                                                    <span class="tag">Nature</span>
                                                                    <span class="tag">Trance</span>
                                                                    <span class="tag">Awesome</span>
                                                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Stevenup7002/stevejune256.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 23</div>
                                <h1><a href="#">Slow Jazz Piece</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> Stevenup7002</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Jazz</span>
                                                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Stevenup7002/stevejune256.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 22</div>
                                <h1><a href="#">Upbeat Jazz Piece</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> Stevenup7002</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Jazz</span>
                                                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Mega/newav_octave.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 21</div>
                                <h1><a href="#">Echoes</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> Mega</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Chiptune</span>
                                                                    <span class="tag">music</span>
                                                                    <span class="tag">tune</span>
                                                                    <span class="tag">chip</span>
                                                                    <span class="tag">famitracker</span>
                                                                    <span class="tag">nes</span>
                                                                    <span class="tag">2a03</span>
                                                                    <span class="tag">vrc6</span>
                                                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/sirxemic/croxer-cropped.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 20</div>
                                <h1><a href="#">Hectocosm</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> sirxemic</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Lounge</span>
                                                                    <span class="tag">Reason</span>
                                                                    <span class="tag">Uhbik-A</span>
                                                                    <span class="tag">Nature</span>
                                                                    <span class="tag">Trance</span>
                                                                    <span class="tag">Awesome</span>
                                                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Stevenup7002/stevejune256.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 19</div>
                                <h1><a href="#">Slow Jazz Piece</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> Stevenup7002</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Jazz</span>
                                                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Stevenup7002/stevejune256.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 18</div>
                                <h1><a href="#">Upbeat Jazz Piece</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> Stevenup7002</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Jazz</span>
                                                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item music-item">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Mega/newav_octave.png">
                            </div>
                            <div class="item-inner">
                                <div class="item-date">Dec 17</div>
                                <h1><a href="#">Echoes</a></h1>
                                
                                <p class="meta">by <a class="link-user " href="#"> Mega</a></p>
                                
                                <p class="tags">
                                                                    <span class="tag">Chiptune</span>
                                                                    <span class="tag">music</span>
                                                                    <span class="tag">tune</span>
                                                                    <span class="tag">chip</span>
                                                                    <span class="tag">famitracker</span>
                                                                    <span class="tag">nes</span>
                                                                    <span class="tag">2a03</span>
                                                                    <span class="tag">vrc6</span>
                                                                </p>
                            </div>
                        </div>
                                        </div>
                </div>
            </div>
		</div>
		<div class="frontpage-section">
			<div class="section-header">
				<h1>Latest blogs</h1>
				<ul class="options">
					<li class="active"><a href="#">all</a></li>
					<li><a href="#">game dev</a></li>
					<li><a href="#">music dev</a></li>
					<li><a href="#">art dev</a></li>
					<li><a href="#">miscellaneous</a></li>
				</ul>
				<a class="options dropdown" href="#">all &#9660;</a>
			</div>

            <div class="section-content">
                <div class="tiled-items-wrapper" data-item-minwidth="360">
                    <div class="tiled-items-row">
                                            <div class="tiled-item blog-item pinned">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/CyrusRoberto/Pandora_ForKilinAvvy_80x802.png">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Oct 09</div>
                                <h1><a href="#">S4D 2012 - UPDATE</a></h1>

                                <div class="meta">by <a class="link-user " href="#"> CyrusRoberto</a> &middot; <a href="#">13 comments</a></div>
                                
                                <p>
                                http://www.64digits.com/users/index.php?userid=CyrusRoberto&cmd=comments&id=500864 Alright guys, were about three weeks into the compo. I have an hour before class, and I will be available to answer any questions you may have to hopefull                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item blog-item pinned">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/hel/inuyasha/icon3.jpg">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Sep 30</div>
                                <h1><a href="#">currently homeless</a></h1>

                                <div class="meta">by <a class="link-user " href="#"> hel</a> &middot; <a href="#">29 comments</a></div>
                                
                                <p>
                                moving was a botched attempt on several levels. 1) we had a month to find a place to leave. ONE MONTH 2) we were kicked out a week early, instead of on Oct 1, and 3) we never had time to clean up bugs, mold or even sweep in this nasty cabin that now has EVERYTHING we own inside of it. i can't...                                 </p>
                            </div>
                        </div>
                                            <div class="tiled-item blog-item ">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/death/Avatar_Death_Fire_eyes_2x.gif">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Oct 16</div>
                                <h1><a href="#">Im out (again)</a></h1>

                                <div class="meta">by <a class="link-user " href="#"> death</a> &middot; <a href="#">7 comments</a></div>
                                
                                <p>
                                You can count me out of the comp. I haven't had any free time to work on any project in weeks. Been working crazy overtime and school is taking up way more time than i expected. My classes are pretty heavy on the homework this semester and the classes require a lot of studying too. I don't...                                 </p>
                            </div>
                        </div>
                                            <div class="tiled-item blog-item ">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/eagly/Calvin-making-faces.gif">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Oct 15</div>
                                <h1><a href="#">64 Wolves All Running Amuck</a></h1>

                                <div class="meta">by <a class="link-user " href="#"> eagly</a> &middot; <a href="#">7 comments</a></div>
                                
                                <p>
                                People of 64Digits, I come to you with a new thing to kill some time! If you go on IRC or if you're interested in going on IRC to join #64digits, think about joining #64wolf as well. It's a channel I made to host a bot for the Wolf Game. I thought I'd post this blog with the rules of the...                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item blog-item ">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Kilin/FlandrePumpkin.png">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Oct 15</div>
                                <h1><a href="#">Nine Hours/Drinks Later.... </a></h1>

                                <div class="meta">by <a class="link-user " href="#"> Kilin</a> &middot; <a href="#">13 comments</a></div>
                                
                                <p>
                                "Gotta love humanity's urge to ingest poison for fun." - Charlie Carlo So it's my birthday today, but since I have work and school, we did the celebrations last night. After having dinner and not eating very much of it, we went to the bar to grab a few drinks and leave. My limit is somewhere...                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item blog-item ">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Stevenup7002/stevejune256.png">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Oct 15</div>
                                <h1><a href="#">Jazz, Television etc. </a></h1>

                                <div class="meta">by <a class="link-user " href="#"> Stevenup7002</a> &middot; <a href="#">18 comments</a></div>
                                
                                <p>
                                Hey guys. I've composed some new pieces! Now, I know what you're thinking. "Oh no, not more bloody classical music. When will he realize that we don't like that?", but before you leave the blog out of disgust, I ask you to bear with me for just a moment, as the following two pieces are...                                 </p>
                            </div>
                        </div>
                                            <div class="tiled-item blog-item ">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Panzermancer/ghostavvy1.gif">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Oct 14</div>
                                <h1><a href="#">Leaving, but not at all in a bad way. And not for long.</a></h1>

                                <div class="meta">by <a class="link-user banned" href="#"> Panzermancer</a> &middot; <a href="#">12 comments</a></div>
                                
                                <p>
                                I'm taking a bit of a sabbatical from a lot of my distractions for the next while, including 64Digits. I need to focus more on my artwork, and I feel like I need to take a break from some stuff so I can focus more. Also, my constant posting of teenage romance drama here doesn't really help anyone,...                                </p>
                            </div>
                        </div>
                                            <div class="tiled-item blog-item ">
                            <div class="avatar">
                                <img src="http://www.64digits.com/users/Kilin/FlandrePumpkin.png">
                            </div>
                            
                            <div class="item-inner">
                                <div class="item-date">Oct 13</div>
                                <h1><a href="#">64Digits To-Do List </a></h1>

                                <div class="meta">by <a class="link-user " href="#"> Kilin</a> &middot; <a href="#">30 comments</a></div>
                                
                                <p>
                                Ever since the move, we've lost a lot of features (dammit ChIkEn), and that's not counting when we made the transition to V3. One of them was the developers' to-do list. Now I've been wanting to contribute a little more to the site, but aside from school getting in the way, people really aren't...                                 </p>
                            </div>
                        </div>
                                        </div>
                </div>
            </div>
		</div>
        
        <div class="frontpage-section">
			<div class="section-header">
				<h1>News</h1>
			</div>

            <div class="section-content">
                <p style="padding-bottom: 100px;">Here would go the news <strong>no one ever reads</strong></p>
            </div>
		</div>
	</div>
</div>
<!--
<footer>
    <p>Here goes footer stuff and stuff</p>
</footer>
-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
<!--
</body> fuck you, code that is inserted into every damn page
-->
</body>
</html>