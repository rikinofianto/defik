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
                                
    <div id="banner">
        <div id="slider2">
        <!-- slide-->
           <div id='sliderFrame'>
                <div id='slider'>
                <?php
                    $tableslider = new PoTable('post');
                    $sliders = $tableslider->findAllLimitByAnd(id_post, active, headline, 'Y', 'Y', DESC, '3');
                    foreach($sliders as $slider){
                        $tablecatsl = new PoTable('category');
                        $currentCatsl = $tablecatsl->findBy(id_category, $slider->id_category);
                        $currentCatsl = $currentCatsl->current();
                ?>
                    <a href='index.html'><img src="<?=$website_url;?>/po-content/po-upload/<?=$slider->picture;?>" alt='<?=$slider->title;?>' title='<?=$slider->title;?>'/></a>
                <?php } ?>
                </div>
            </div>    
            <!-- /slide-->
        </div> 
        <div id="paginate-slider2" class="pagination"></div>
        <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/slider.js"></script>
    </div>

    <div class='content_links'><ul class='runningtext'><li><marquee>SELAMAT DATANG DI WEBSITE MI 2 GIRILOYO</marquee></li></ul></div>
    <?php
    $tablepag = new PoTable('pages');
    $currentPag = $tablepag->findByAnd(home, 'Y', active, 'Y');
    $currentPag = $currentPag->current();
    $content = $currentPag->content;
    $content = html_entity_decode($content);
    ?>
    <div class="content_heading">
        <div class="heading"><h2><?=$currentPag->title;?></h2></div>
        <div class="share">
            <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4f4ed8507e168f20"><img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="83" height="16" alt="Bookmark and Share" style="border:0"/></a>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f4ed8507e168f20"></script>
        </div>
    </div>
    <p>
        <img alt="<?=$currentPag->title;?>" src="<?=$website_url;?>/po-content/po-upload/<?=$currentPag->picture;?>" title="<?=$currentPag->title;?>" style="float:left; margin-right:10px; margin-top:5px; max-width:150px;"/>
        <?=$content;?>
    </p>
    <div class="clear"></div>

    <div class="contentblock">
        <div class="tabwrapper">
            <div class="tabs_links">
                <ul>
                    <li><a href="#tab1"><i class="fa fa-info-circle fa-fw"></i>Info Terbaru</a></li>
                    <li><a href="#tab2"><i class="fa fa-book fa-fw"></i>Agenda Pendidikan</a></li>
                </ul>
            </div>
            <div class="tab_content" id="tab1" style="display:none">
                <ul>
                <?php 
                    $tabel1 = new PoTable('post');
                    $find1 = $tabel1->findAllLimitByAnd(id_post, id_category, active, '1', 'Y', DESC, '5');
                    foreach ($find1 as $key => $value) :
                ?>
                    <li>
                        <div class='thumb'>
                            <a href='<?php echo "$website_url/detailpost/$value->seotitle"; ?>'>
                                <img src='<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$value->picture;?>' alt='<?=$value->title;?>' width='55' />
                            </a>
                        </div>
                        <div class='descripton'>
                            <h6>
                                <a href='<?php echo "$website_url/detailpost/$value->seotitle"; ?>'>
                                    <?=$value->title;?>
                                </a>
                            </h6>
                            <em><?=tgl_indo($value->date);?></em>
                            <p><?=cuthighlight('post', $value->content, '100');?>. . .</p>
                        </div>
                    </li>
                <?php
                    endforeach;
                ?>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="tab_content" id="tab2" style="display:none">
                <ul>

                    <li>
                        <div class='descripton'>
                            <h6><a href='schedule3_bakti_sosial_dalam_rangka_hari_pahlawan.html'>Bakti Sosial Dalam Rangka Hari Pahlawan</a></h6>
                            <em>10 November 2012 - 10 November 2012 di Yogyakarta</em>
                            <p>Duis at velit ac ante dictum scelerisque. Nam vehicula suscipit nisi ut dictum. Sed blandit ultrices enim...</p>
                        </div>
                    </li>

                </ul>
                <div class="clear"></div>
            </div>
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