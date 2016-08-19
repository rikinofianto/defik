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
    $title = $val->validasi($_GET['idc'],'xss');
    $tabledcat = new PoTable('category');
    $currentDcat = $tabledcat->findByAnd(seotitle, $title, active, 'Y');
    $currentDcat = $currentDcat->current();
    $iddcat = $currentDcat->id_category;
?>
<?php if ($currentDcat != "0"){ ?>

<div class="col1">
    <div id="content2">
        <h2 class="pad8" style="margin-left:-5px;">Berita / Info</h2>
        <div style="float:right; margin-right:10px;">
            <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4f4ed8507e168f20"><img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="83" height="16" alt="Bookmark and Share" style="border:0"/></a>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f4ed8507e168f20"></script>
        </div>
        <ul class='listing'>
            <?php
                $p = new Paging;
                $batas = 3;
                $posisi = $p->cariPosisi($batas);
                $tabledcpost = new PoTable('post');
                $dcposts = $tabledcpost->findAllLimitByAnd(id_post, id_category, active, "$iddcat", "Y", "DESC", "$posisi,$batas");
                foreach($dcposts as $dcpost){
                    $tabledccom = new PoTable('comment');
                    $totaldccom = $tabledccom->numRowByAnd(id_post, $dcpost->id_post, active, 'Y');
                    $tableuser = new PoTable('users');
                    $currentUser = $tableuser->findBy(id_user, $dcpost->editor);
                    $currentUser = $currentUser->current();
            ?>        
            <li>
                <div class="description">
                    <h3><a href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>" class="colr"><?=$dcpost->title;?></a></h3>
                    <div class="kontenutama">
                        <img alt="<?=$dcpost->title;?>" src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$dcpost->picture;?>" title="<?=$dcpost->title;?>" style="float:left; margin-right:10px; margin-top:5px; max-width:54px;"/>
                        <?=cuthighlight('post', $dcpost->content, '150');?>...
                    </div>
                    <div class="clear"></div>
                    <div class="info">
                        <span class="lastupdte">Update terakhir: <?=tgl_indo($dcpost->date);?></span>
                        <span class="comments"><strong><?=$totaldccom;?></strong> Komentar</a></span>
                        <a class="moreinfo" href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>">Selengkapnya &raquo;</a>
                    </div>
                </div>
                <div class="clear"></div>
            </li>
            <?php } ?>  
        </ul>
        <div class='clear'></div>
        <div class='pginaiton pad9'>
        <?php
            $getpage = $val->validasi($_GET['page'],'sql');
            $jmldata = $tabledcpost->numRowByAnd(id_category, "$iddcat", active, "Y");
            $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
            $linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "category", $currentDcat->seotitle, "1");
            echo "$linkHalaman";
        ?>
        </div>
        <div class='clear'></div>
    </div>
    <div class="clear"></div>
</div>
 

<?php include_once "po-content/$folder/sidebar.php"; ?>
<?php } ?>


<!-- 
*******************************************************
    Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>