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
$title = $val->validasi($_GET['id'],'xss');
$detail = new PoTable('post');
$currentDetail = $detail->findManualQuery($tabel = "post,users,category", $field = "", $condition = "WHERE users.id_user = post.editor AND category.id_category = post.id_category AND category.active = 'Y' AND post.active = 'Y' AND post.seotitle = '".$title."'");
$currentDetail = $currentDetail->current();
$idpost = $currentDetail->id_post;

if ($currentDetail > 0){
$tabledpost = new PoTable('post');
$currentDpost = $tabledpost->findByPost(id_post, $idpost);
$currentDpost = $currentDpost->current();

$contentdet = html_entity_decode($currentDetail->content);
$biodet = html_entity_decode($currentDetail->bio);

$tabledcat = new PoTable('category');
$currentDcat = $tabledcat->findBy(id_category, $currentDetail->id_category);
$currentDcat = $currentDcat->current();

$p = new Paging;
$batas = 5;
$posisi = $p->cariPosisi($batas);
$tabledcom = new PoTable('comment');
$composts = $tabledcom->findAllLimitByAnd(id_comment, id_post, active, "$idpost", "Y", "ASC", "$posisi,$batas");
$totaldcom = $tabledcom->numRowByAnd(id_post, $idpost, active, 'Y');

mysql_query("UPDATE post SET hits = $currentDetail->hits+1 WHERE id_post = '".$idpost."'");
?>

<div class="col1">
    <div id="content2">
        <h2 class="pad8" style="margin-left:-5px;"><?=$currentDpost->title;?></h2>
        <div style="float:right; margin-right:10px;">
              <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4f4ed8507e168f20"><img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="83" height="16" alt="Bookmark and Share" style="border:0"/></a>
              <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f4ed8507e168f20"></script>
        </div>
        <div class="tanggal">
              <?=$currentDetail->time;?>, <?=tgl_indo($currentDetail->date);?> &raquo; Diposting oleh : <?=$currentDetail->nama_lengkap;?> &raquo; Hits : <?=$currentDetail->hits;?>
        </div>
        <div class="kontenutama">
              <img alt="<?=$currentDpost->title;?>" src="<?=$website_url;?>/po-content/po-upload/<?=$currentDetail->picture;?>" title="<?=$currentDpost->title;?>" style="float:left; margin-right:10px; margin-top:15px; max-width:225px;"/>
              <p>
                    <?=$contentdet;?>
              </p>
        </div>
        <div class="tags">
              Tags : 
            <?php
                $tabletag = new PoTable('tag');
                $tags = $tabletag->findAll(id_tag, DESC);
                $arrtags = explode(',', $currentDetail->tag);
                foreach($tags as $tag){
                $cek = (array_search($tag->tag_seo, $arrtags) != false)? '' : 'display:none;';
                    echo " <a href='$website_url/search-result/$tag->tag_title' title='$tag->tag_title'  style='$cek'>$tag->tag_title</a> ";
                }
            ?>
        </div>
        <div class='clear'></div>
        <?php
            $tablerelated = new PoTable('post');
            $tablerelateds = $tablerelated->findRelatedPost($currentDetail->tag, $idpost, id_post, "DESC", "5");
            if(count($tablerelateds) > 1){
        ?>
        <p>
              <h3 style='margin-top:5px; margin-bottom:5px;'>Info Terkait</h3>
              <ul class='bullet_list'>
                    <?php
                        foreach($tablerelateds as $tablerelated){
                    ?>
                    <li>
                          <a href='<?php echo "$website_url/detailpost/$tablerelated->seotitle"; ?>'><?=$tablerelated->title;?></a>
                    </li>
                    <?php } ?>
              </ul>
        </p>
        <?php } ?>
        <div class='clear'></div>
        <h3 style='margin-top:5px; margin-bottom:5px;'>Tinggalkan Komentar</h3>
        <div class="contactblock">
              <div class="block4">
                    <form action="<?=$website_url;?>/po-postcom.php" method="post">
                          <input type="hidden" name="id" value="7"/>
                          <ul class="inquiry">
                                <li>
                                      Nama<br/><input name="name" type="text" size="35" value=""/>
                                </li>
                                <li>
                                      Website<br/><input name="email" type="text" size="35" value=""/>
                                </li>
                                <li>
                                      Website<br/><input name="url" type="text" size="35" value=""/>
                                </li>
                                <li>
                                      Komentar<br/><textarea rows="0" cols="0" name="comment" class="txtarea"></textarea>
                                </li>
                                <li>Kode Verifikasi</li>
                                <li>                                      
                                    <br /><div class="g-recaptcha" data-sitekey="6LckEgETAAAAAPdqrQSY_boMDLZRL1vpkAatVqKf"></div>
                                    <input type="hidden" name="id" value="<?=$idpost;?>" />
                                    <input type="hidden" name="seotitle" value="<?=$currentDpost->seotitle;?>" />
                                </li>
                                <li>
                                      <input type="text" name="captcha" size="5" maxlength="5"><input type="hidden" name="captcha_bener" value="189"></li>
                          </ul>
                          <div class="action1">
                                <input type="submit" name="submitkomentar" value="Kirim" class="btn1 left"></div>
                    </form>
              </div>
              <div class="clear"></div>
            <?php if ($totaldcom > 0){ ?>
            <ul id="comments_list">
            <?php
                foreach($composts as $compost){
                $comcontent = nl2br($compost->comment);
            ?>
                <li class="comment clearfix" id="comment-1">
                    <div class="comment_author_avatar">&nbsp;</div>
                    <div class="comment_details">
                        <div class="posted_by clearfix">
                            <?php if ($compost->url != ''){ ?>
                                <h5><a class="author" href="<?=addhttp($compost->url);?>" target="_blank"><?=$compost->name;?></a></h5>
                            <?php }else{ ?>
                                <h5><a class="author" href="#"><?=$compost->name;?></a></h5>
                            <?php } ?>
                            <abbr title="<?php echo "$compost->time, $compost->date"; ?>" class="timeago"><?php echo "$compost->date | $compost->time"; ?></abbr>
                        </div>
                        <p><?=autolink($comcontent);?></p>
                    </div>
                </li>
            <?php } ?>
            </ul>
            <ul class="pagination page_margin_top_section">
            <?php
                $getpage = $val->validasi($_GET['page'],'sql');
                $jmldata = $tabledcom->numRowByAnd(id_post, $idpost, active, 'Y');
                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "detailpost", $currentDpost->seotitle, "1");
                echo "$linkHalaman";
            ?>
            </ul>
            <?php } ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

<?php include_once "po-content/$folder/sidebar.php"; ?>
        <?php } ?>
?>


<!-- 
*******************************************************
      Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>