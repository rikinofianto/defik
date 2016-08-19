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
    
    <div class="gallery">
        <div class="gallery_top">
            <div class="gallery_heading">
                <h2>Galeri</h2>
            </div>
            <div class="clear"></div>
        </div>
        <div class="thumbdiv">
            <span class='gallery clearfix'>
                <ul>
                <?php
                    $p = new Paging;
                    $batas = 24;
                    $posisi = $p->cariPosisi($batas);
                    $tablegal = new PoTable('gallery');
                    $gallerys = $tablegal->findAllLimit(id_gallery, "DESC", "$posisi,$batas");
                    foreach($gallerys as $gallery){
                        $idalb = $gallery->id_album;
                        $tablecalb = new PoTable('album');
                        $currentCalb = $tablecalb->findBy(id_album, $idalb);
                        $currentCalb = $currentCalb->current();
                        if ($currentCalb->active == 'Y'){
                ?>
                    <li>
                        <a href='<?=$website_url;?>/po-content/po-upload/<?=$gallery->picture;?>' rel='prettyPhoto[gallery]' class='galleryimg' title='<?=$gallery->title;?>'>
                        <img src='<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$gallery->picture;?>' title='<?=$gallery->title;?>' />
                        </a>
                    </li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </span>
            <ul class="pagination clearfix page_margin_top_section">
                <?php
                    // $getpage = $val->validasi($_GET['page'],'sql');
                    // $jmldata = $tablegal->numRow();
                    // $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                    // $linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "gallery", "page", "1");
                    // echo "$linkHalaman";
                ?>
            </ul>
        </div>
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
<?php //} ?>