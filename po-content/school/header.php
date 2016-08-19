<?php if ($mod==""){
    header('location:../../404.php');
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MI 2 Giriloyo
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="MI 2 Giriloyo - Website resmi MI 2 Giriloyo
">
<meta name="keywords" content="mi 2 giriloyo,mi giriloyo,mi imogiri,madrasah iptidaiyah 2 giriloyo,mi 2
">
<meta http-equiv="Copyright" content="MI 2 Giriloyo">
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
<link href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/css/jquery.fancybox-1.3.4.css" media="screen" />

<link rel="stylesheet" href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/font-awesome/css/font-awesome.min.css">
<link href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/css/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/js-image-slider.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/pretyphoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
</head>
<body>
    <div id="bg">
        <div id="wrapper_sec">
            <div id="masterhead">
                <div class="logo">  <a href='http://www.mi2giriloyo.sch.id'><img src='images/logo/7218header.png' alt='MI 2 Giriloyo' title='MI 2 Giriloyo' border='0'/></a></div>
                <div class="topright_sec">
                    <div class="topnavigation">
                    </div>
                    <div class="clear"></div>
                    <div class="top_search">
                        <form action="search.html" method="post">
                            <ul>
                                <li>
                                    <input name="keyword" value="Pencarian berita" onfocus="if(this.value=='Pencarian berita') {this.value='';}" onblur="if(this.value=='') {this.value='Pencarian data alumni';}" type="text" />
                                </li>
                                <li>
                                    <input type="submit" value="Cari" class="search" name="cari" />
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="navigation">
                    <div id="smoothmenu1" class="ddsmoothmenu">
                        <?php 
                            $instance = new PoController;
                            $menu = $instance->popoji_menu(1, 'class="sf-menu"', 'class="submenu"');
                        ?>
                        <?php echo $menu; ?>                
                    </div>
                    <div class="clear"></div>   
                </div>    
            </div>  
            <div id="content_section">
                <div class="news_updates">
                    <span class="news_update"><i class="fa fa-book fa-fw"></i>News Update</span>
                    <span class="news_date"><em>14 Maret 2012 10:43:59: </em></span>
                    <span class="news_des">
                        <a href="news6_harga_toyota_gt_86_mulai_rp360_juta.html">Harga Toyota GT 86 Mulai Rp360 Juta</a>
                    </span>
                    <a class="next" href="news.html">
                        <img src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/images/newsarrow.jpg" alt="More" />
                    </a>
                 </div>
                <div class="clear"></div>
                <?php } ?>