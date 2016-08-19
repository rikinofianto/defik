<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
<!-- 
*******************************************************
	Include Header Template
******************************************************* 
-->
<?php include_once "po-content/$folder/header.php"; ?>


<!-- 
*******************************************************
	Main Content Template
******************************************************* 
-->
<div class="col1">
	<div class="sheading pad">
		<div class="sheadings">
			<h2 style="margin-left:-5px;">Kontak</h2>
		</div>
		<div class="sheading_action">
			<div class="share left">
				<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4f4ed8507e168f20"><img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="83" height="16" alt="Bookmark and Share" style="border:0"/></a>
				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f4ed8507e168f20"></script>
			</div>
		</div>
	</div>
	<div class="contactblock">
		<div class="block1">
			<h5>MI 2 Giriloyo</h5>
			<div class="mailingaddress">
				<p>
					Giriloyo Wukirsari Imogiri Bnatul
				</p>
			</div>
			<div class="emailaddress">
				<a href="http://www.mi2giriloyo.sch.id">www.mi2giriloyo.sch.id</a>
			</div>
		</div>
		<div class="block2">
			<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.mi2giriloyo.sch.id&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=35&amp;appId=179450592189831" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowtransparency="true">
			</iframe>
		</div>
		<div class="clear"></div>
	</div>
	<div class="contactblock">
		<div class="block4">
			<p>
				Atau hubungi kami melalui form berikut :
			</p>
			<form action="<?=$website_url;?>/contact.php" method="post">
				<ul class="inquiry">
					<li>
						Nama<br/><input name="name_contact" type="text" size="35" value=""/>
					</li>
					<li>
						Email<br/><input name="email_contact" type="text" size="35" value=""/>
					</li>
					<li>
						Subjek<br/><input name="subject_contact" type="text" size="35" value=""/>
					</li>
					<li>
						Isi Pesan<br/><textarea rows="0" cols="0" name="message_contact" class="txtarea"></textarea>
					</li>
				</ul>
				<div class="action1">
					<input type="submit" name="submit" value="Kirim" class="btn1 left"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

<?php include_once "po-content/$folder/sidebar.php"; ?>
<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>