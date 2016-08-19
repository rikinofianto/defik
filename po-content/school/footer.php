<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
	<div id="bottom_seciton">
		<div id="footer">
	    	<div class="contact_us">
				<h5>MI 2 Giriloyo</h5>  
	        	<ul>
	        		<li class="mailing_address">Giriloyo Wukirsari Imogiri Bnatul</li>
					<li class="telephone_no"></li>
	        		<li class="email_address"><a href="mailto:"></a></li>
	        	</ul>
			</div>
			<div class="bee">
				Copyright © 2016 MI 2 Giriloyo All Rights Reserved<br />Developed by <a href="http://www.beesolution.net" target="_blank">Beesolution.Net</a>
			</div>      
	   		<div class="clear"></div>     
	    </div>
	</div>
	<div id="bottom_Section"></div>
	<!-- Javascript -->
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/ddsmoothmenu.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/contentslider.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/jquery.easing.1.1.js"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/DIN_500.font.js"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/menu.js"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/tabs.js"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/jquery.fancybox-1.3.4.pack.js"></script>
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
    <script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/pretyphoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'dark_rounded',slideshow:3000, autoplay_slideshow: false});
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
    });
    </script>
</body>
</html>
<?php } ?>