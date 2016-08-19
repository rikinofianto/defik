<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php include "title.php"; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "description.php"; ?>">
<meta name="keywords" content="<?php include "keyword.php"; ?>">
<meta http-equiv="Copyright" content="<?=$co['company_name'];?>">
<meta name="author" content="Beesolution Web Development">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="2">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<link rel="shortcut icon" href="favicon.png" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="feed/rss.xml" />
<!-- Stylesheet -->
<link href="<?=$f['folder'];?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=$f['folder'];?>/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="<?=$f['folder'];?>/css/jquery.fancybox-1.3.4.css" media="screen" />
<!-- Javascript -->
<script src="<?=$f['folder'];?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?=$f['folder'];?>/js/ddsmoothmenu.js" type="text/javascript"></script>
<script src="<?=$f['folder'];?>/js/contentslider.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/jquery.easing.1.1.js"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/DIN_500.font.js"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/menu.js"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/tabs.js"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?=$f['folder'];?>/js/jquery.fancybox-1.3.4.pack.js"></script>
<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#propinsi').addClass('load');
			$.post("auto.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#propinsi').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#propinsi').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>
<?php if($co['webmaster']!=''){echo "$co[webmaster]";}?>
<?php if($co['analytics']!=''){echo "$co[analytics]";}?>
<?php if($co['livechat']!=''){echo "$co[livechat]";}?>
<?php
if($co['defaultbg']=='Yes'){
	$mainbg = "url($f[folder]/images/back.jpg) repeat-x fixed top #063782";
}else{
	if($co['mainbg']==''){
		if($co['maincolor']==''){
			$mainbg = "url($f[folder]/images/back.jpg) repeat-x fixed top #063782";
		}else{
			$mainbg = "$co[maincolor]";
		}
	}else{
		if($co['mainfixed']=='Yes'){
			$mainbg = "url(images/logo/$co[mainbg]) $co[mainrepeat] fixed $co[mainposition] $co[maincolor]";
		}else{
			$mainbg = "url(images/logo/$co[mainbg]) $co[mainrepeat] $co[mainposition] $co[maincolor]";
		}
	}
}
?>
<?php if($co['header']==''){$header = "#FFF";}else{$header = "url(images/logo/$co[header]) repeat center top";}?>
<style>
body {
	background:<?=$mainbg;?>;
	font-family:Tahoma, Geneva, sans-serif;
	font-size:11px;
	color:#333;
}
#masterhead {
	width:960px;
	height:80px;
	float:left;
	padding-bottom:5px;
	background:<?=$header;?>;
}
</style>
</head>
<body>
<div id="bg">
	<div id="wrapper_sec">
		<div id="masterhead">
        	<div class="logo"><?php include "$f[folder]/modules/logo.php";?></div>
			<div class="topright_sec">
            	<div class="topnavigation">
					<?php if (empty($_SESSION['u_username']) AND empty($_SESSION['u_password'])){ ?>
					<ul>
					<li><a class="nobg" href="login.html"><span style="color:#063782; margin-right:5px; font-weight:bold;">LOGIN ALUMNI/MEMBER</span></a></li>
					<li><a class="nobg" href="rss" target="_blank"><img src="images/asset/rss.png" alt="RSS Feed" /></a></li>
                    <?php if($co['facebook']!=''){echo "<li><a class='nobg' href='$co[facebook]' target='_blank'><img src='images/asset/facebook.png' alt='Facebook' /></a></li>";} ?>
                    <?php if($co['twitter']!=''){echo "<li><a class='nobg' href='$co[twitter]' target='_blank'><img src='images/asset/twitter.png' alt='Twitter' /></a></li>";} ?>
					</ul>
					<?php }else{ ?>
					<ul>
					<li><a class="nobg" href="member.html"><span class="menumember">DASHBOARD</span></a></li>
					<li><a class="nobg" href="alumni.html"><span class="menumember">DATA ALUMNI</span></a></li>
					<li><a class="nobg" href="forum.html"><span class="menumember">FORUM DISKUSI</span></a></li>
					<li><a class="nobg" href="profil.html"><span class="menumember">PROFIL</span></a></li>
					<li><a class="nobg" href="edit_password.html"><span class="menumember">UBAH PASSWORD</span></a></li>
					<li><a class="nobg" href="logout.php"><span class="logout">LOGOUT</span></a></li>
					</ul>
					<?php } ?> 	
                </div>
                <div class="clear"></div>
                <div class="top_search">
					<form action="search.html" method="post">
                	<ul>
                    	<li>
							<input name="keyword" value="Pencarian data alumni" onfocus="if(this.value=='Pencarian data alumni') {this.value='';}" onblur="if(this.value=='') {this.value='Pencarian data alumni';}" type="text" />
							<select name="option" style="font-size:11px;">
								<option value="nama">Nama</option>
								<option value="kota">Kota</option>
								<option value="tahun_lulus">Tahun Lulus</option>
							</select>
						</li>
                        <li><input type="submit" value="Cari" class="search" name="cari" /></li>
					</ul>
					</form>
				</div>
                <div class="clear"></div>       	
			</div>
			<div class="clear"></div>   
		</div>	
        <div class="navigation">
     		<div id="smoothmenu1" class="ddsmoothmenu">
				<?php include "$f[folder]/modules/mainmenu.php";?>				
			</div>
   			<div class="clear"></div>	
		</div>
		<div id="content_section">
			<div class="news_updates">
				<?php include "$f[folder]/modules/news.php";?>
             </div>
            <div class="clear"></div>
			<div class="col1">
            	<?php
				if (($_GET['module']=='') OR ($_GET['module']=='home')){ 
					include "$f[folder]/modules/home.php"; 
				} else {
					include "$f[folder]/modules/main.php";
				}
				?>
			</div>
            <div class="col2">
            	<?php include "$f[folder]/modules/sidebar.php";?>					
			</div>
			<div class="clear"></div>	
		</div>	
		<div class="clear"></div>
        <div id="bottom_seciton">
            <div id="footer">
                <div class="contact_us">
                    <h5><?=$co['company_name'];?></h5>  
                    <ul>
                        <li class="mailing_address"><?=$co['company_address'];?></li>
                        <li class="telephone_no"><?=$co['company_phone'];?></li>
                        <li class="email_address"><a href="mailto:<?=$co['email_account'];?>"><?=$co['email_account'];?></a></li>
                    </ul>
                </div>
                <div class="bee">
                    <?=$co['site_footer'];?><br />Developed by <a href="http://www.beesolution.net" target="_blank" style="color:#CCC;">Beesolution.Net</a>
                </div>      
                <div class="clear"></div>     
            </div>
        </div>
	</div>
</div>    
</body>
</html>