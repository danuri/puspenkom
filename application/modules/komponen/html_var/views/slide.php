
  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
	<?php
		$i=0;
		foreach($daftar as $key=>$val){
		$cls = ($i==0)?'active':'';
	?>
            <div class="item <?=$cls;?>">
              <div class="thumbnail">
					<?php if($val->link=="") { ?>
                      <img src="<?=base_url();?><?=$val->foto;?>">
					<?php } else { ?>
                      <a href="http://<?=$val->link;?>" target=_blank border=0><img src="<?=base_url();?><?=$val->foto;?>"></a>
					<?php } ?>
              </div>
              <div class="down-content">
                <h4>Best Networking</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>
	<?php
		$i++;
		}
	?>
          </div>
        </div>
      </div>
    </div>
  </section>
 <style>
#banner_main<?=$idd;?> .thumbnail {
	margin-bottom:0;
}
#banner_main<?=$idd;?> .carousel-inner .item img {
	width:100%;
	height:100%;
}

.vertical .carousel-inner {
  height: 100%;
}

.carousel.vertical .item {
  -webkit-transition: 0.6s ease-in-out top;
     -moz-transition: 0.6s ease-in-out top;
      -ms-transition: 0.6s ease-in-out top;
       -o-transition: 0.6s ease-in-out top;
          transition: 0.6s ease-in-out top;
}

.carousel.vertical .active {
  top: 0;
}
.carousel.vertical .active.left {
  top: -400px;
}

.carousel.vertical .active.right {
  top: 400px;
}

.carousel.vertical .item {
    left: 0;
}
</style>
 

