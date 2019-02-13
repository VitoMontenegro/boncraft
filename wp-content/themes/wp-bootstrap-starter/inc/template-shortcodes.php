<?php

// create shortcode with parameters so that the user can define what's queried - default is to list all priorities
add_shortcode( 'perevozki', 'global_vision_priory_parameters_shortcode' );
function global_vision_priory_parameters_shortcode( $atts ) {
    ob_start();?>
    <script src="<?= get_template_directory_uri()?>/inc/assets/js/jquery.autocolumnlist.min.js"></script>
    <div class="logistic dark alignfull">
        <div class="container">
        <h2 class="s-24">Отправляем грузы по всей Росиии</h2>
        <!-- ВЫВОДИМ ПЕРЕВОЗКИ -->
        <!--noindex--> 
        <div class="list">
                <ul class="row" id="recommended">
                
                    <?php
                        function get_first_letter( $str ){
                            return mb_substr($str, 0, 1, 'utf-8');
                        }
                        //$posts = get_posts('post_type=perevozki&orderby=title&posts_per_page=100&meta_key="where"');
                        $posts = get_posts(array(
                            'post_type' => 'perevozki',
                            'posts_per_page' => '100',
                            'meta_key'          => 'where',
                            'orderby'           => 'meta_value',
                            'order' => 'ASC'
                        ));

                        foreach( $posts as $k => $post ){
                            $post_id = $post->ID;
                            $thisChar = mb_substr(get_field('where', $post_id), 0, 1);
                           
                                if($thisChar != $lastChar){
                                    $lastChar = $thisChar;
                                    echo ' <li class="flex-itm"><h3>' . $lastChar . '</h3></li>';
                                }
                                $prev_fl = isset( $posts[ ($k-1) ] ) ? get_first_letter( $posts[ ($k-1) ]->meta_key ) : '';
                                if( $prev_fl !== $fl )  ?>
                                
                                <li class="flex-itm"><a href="<?php the_permalink(); ?>">
                                    <?= $post->post_title; ?>
                                </a></li>

                                <?php
                                }

                                wp_reset_postdata();

                        ?>
                </ul>
                <!-- /.cities -->
         </div>
        <!--/noindex-->
        <!-- /.list -->
        </div>
    </div>

    <script type="text/javascript">
        (function($) {
            $(function() {
                $('#recommended').autocolumnlist({
                    classname: 'col-lg-3'
                });
            })
        }
        )(jQuery)
    </script>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
}
// [perevozki]



add_shortcode( 'auto-slide', 'global_vision_auto_slide_shortcode' );
function global_vision_auto_slide_shortcode() {
    ob_start();?>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/inc/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/inc/assets/css/slick.css">
        <script src="<?= get_template_directory_uri()?>/inc/assets/js/jquery.fancybox.min.js"></script>
        <script src="<?= get_template_directory_uri()?>/inc/assets/js/slick.min.js"></script>
        <div class="rs-slider">
            <div class="rs-slider-container articles auto">
                <?php  $cnt=0; $query = new WP_Query( array( 'post_type' => 'auto', 'showposts' => '666') ); if ($query ->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();  $cnt++;  ?>
                <div class="article slider-item-img">
                    <a href="<?php the_post_thumbnail_url('full') ;?>" data-fancybox="gallery" data-caption="">
                        <img
                        src="<?php the_post_thumbnail_url('medium') ;?>"
                        alt="<?php the_title(); ?>" class="img-responsive">
                    </a>               
                </div>
                <?php  } } else { ?> <p>Контента пока нет.</p> <? }  wp_reset_postdata();?>
            </div>
        </div>
        <script>
            //fancybox
            (function($) {
                if($('[data-fancybox]').length > 0){
                $('[data-fancybox]').fancybox({
                    loop : true,
                    infobar : false,
                    toolbar  : true,
                    
                    buttons : [
                        'close'
                    ],
                    thumbs : {
                        autoStart : true
                    }
                    });
                }
                if ($('.rs-slider-container').length > 0) {
                    $('.rs-slider-container').not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        speed: 900,
                        dots: true,
                        autoplay: true,
                        lazyLoad: 'ondemand',
                        cssEase: 'cubic-bezier(0.845, 0.045, 0.355, 1)'
                    });
                }
            })(jQuery)
    
        </script>
    <?php
    $myvariable = ob_get_clean();
    return $myvariable;
}

add_shortcode( 'auto', 'global_vision_contcts_shortcode' );
function global_vision_contcts_shortcode() {
    ob_start();?>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/inc/assets/css/jquery.fancybox.min.css">
        <script src="<?= get_template_directory_uri()?>/inc/assets/js/jquery.fancybox.min.js"></script>
        <div class="row">
            <div class="col-lg-6">
                <?php 
                $cnt=0;
                    $query = new WP_Query( array(
                        'post_type' => 'auto',
                        'showposts' => '5',
                        'orderby' => 'rand')
                    ); 
                ?>
                <?php if ($query ->have_posts() ) : ?>
                    <?php  while ( $query->have_posts() ) : ?>
                        <?php  $query->the_post(); ?>  
                        <?php if ($cnt == 0): ?>
                            <div class="article-big slider-item-img">
                                <a href="<?php the_post_thumbnail_url('full') ;?>" data-fancybox="gallery" data-caption="">
                                    <img
                                    src="<?php the_post_thumbnail_url('full') ;?>"
                                    alt="<?php the_title(); ?>" class="img-responsive">
                                </a>               
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                        <?php else: ?>
                                <div class="col-lg-6">
                                    <div class="article-small slider-item-img">
                                        <a href="<?php the_post_thumbnail_url('full') ;?>" data-fancybox="gallery" data-caption="">
                                            <img
                                            src="<?php the_post_thumbnail_url('medium') ;?>"
                                            alt="<?php the_title(); ?>" class="img-responsive">
                                        </a>               
                                    </div>                                    
                                </div>
                        <?php endif ?>
                        <?php $cnt++; ?>
                    <?php endwhile; ?>
                    </div>
                <?php else: ?>   
                    <p>Контента пока нет.</p>   
                <?php  endif; wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="text-right"><a href="/nash-avtopark/">Все фотографии</a></div>
        
        <script>
            //fancybox
            (function($) {
                if($('[data-fancybox]').length > 0){
                $('[data-fancybox]').fancybox({
                    loop : true,
                    infobar : false,
                    toolbar  : true,
                    
                    buttons : [
                        'close'
                    ],
                    thumbs : {
                        autoStart : true
                    }
                    });
                }
                if ($('.rs-slider-container').length > 0) {
                    $('.rs-slider-container').not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        speed: 900,
                        dots: true,
                        autoplay: true,
                        lazyLoad: 'ondemand',
                        cssEase: 'cubic-bezier(0.845, 0.045, 0.355, 1)'
                    });
                }
            })(jQuery)
            
        </script>
    <?php
    $myvariable = ob_get_clean();
    return $myvariable;
}