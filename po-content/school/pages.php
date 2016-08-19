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
<?php
    $title = $val->validasi($_GET['idp'],'xss');
    $tablepag = new PoTable('pages');
    $currentPag = $tablepag->findByAnd(seotitle, $title, active, 'Y');
    $currentPag = $currentPag->current();
    $idpag = $currentPag->id_pages;
    $content = $currentPag->content;
    $content = html_entity_decode($content);
    // var_dump($currentPag);exit;
?>
<?php if ($currentPag != "0"){ ?>

<div class="col1">
	<div id="content2">
		<h2 class="pad8" style="margin-left:-5px;"><?=$currentPag->title;?></h2>
		<div style="float:right; margin-right:10px;">
			<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4f4ed8507e168f20"><img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="83" height="16" alt="Bookmark and Share" style="border:0"/></a>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f4ed8507e168f20"></script>
		</div>
		<div class="kontenutama">
			<img alt="<?=$currentPag->title;?>" src="<?php echo $website_url . '/po-content/po-upload/' . $currentPag->picture;?>" title="<?=$currentPag->title;?>" style="float:left; margin-right:10px; margin-top:15px; max-width:225px;"/>
			<p>
				<?=$content;?>
			</p>
		</div>
		<div class='clear'></div>
		<?php /*
		<p>
			<h3 style='margin-top:5px; margin-bottom:5px;'>Info Terkait</h3>
			<ul class='bullet_list'>
				<li>
					<a href='news3_pemerintah_sudah_niat_naikkan_bbm_premium_sejak_jauh_hari.html'>Pemerintah Sudah Niat Naikkan BBM Premium Sejak Jauh Hari</a>
				</li>
				<li>
					<a href='news2_indahnya_museum_seni_islam_di_doha_qatar.html'>Indahnya Museum Seni Islam di Doha, Qatar</a>
				</li>
				<li>
					<a href='news1_alonso_ferrari_masih_harus_banyak_berbenah.html'>Alonso: Ferrari Masih Harus Banyak Berbenah</a>
				</li>
				<li>
					<a href='news6_harga_toyota_gt_86_mulai_rp360_juta.html'>Harga Toyota GT 86 Mulai Rp360 Juta</a>
				</li>
				<li>
					<a href='news5_krakatau_steelsamator_bikin_anak_usaha_rp_720_miliar.html'>Krakatau Steel-Samator Bikin Anak Usaha Rp 720 Miliar</a>
				</li>
			</ul>
		</p>
		<div class='clear'></div> */?>
	</div>
	<div class="clear"></div>
</div>
<?php include_once "po-content/$folder/sidebar.php"; ?>

<?php }?>		


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>