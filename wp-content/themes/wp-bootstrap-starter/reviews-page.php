<?php
/*
Template Name: Отзывы
*/

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="linemenu"><a href="/">Главная</a>  »  <span>Отзывы о центрах Президент-Мед</span></div>
            </div>
        </div>
    </div>
</nav>
<div class="block_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zag">
                <a class="zapis create_review" href="#">Оставить отзыв</a>
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>


    <div class="block_main">
        <div class="container">
            
            <?php
             
                if(isset($_POST['uname']))
                {
                    echo '<div class="block_info row">Спасибо за отзыв ' . $_POST['uname'] . '</div>';
                }
            ?>
            
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <?php
                    global $wpdb;
                    $rows = $wpdb->get_results("SELECT * FROM  `wp_wpcreviews` WHERE  `status` =1 order by date_time DESC");
                    $count = count($rows);

/*                    echo "<pre>";
                    print_r($rows);
                    echo "</pre>";*/
                    $test=0;
                    foreach ($rows as $key => $value) 
                    {

                        if($key >= (($count / 2)-1) AND $test==0)
                        {
                            echo '</div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
                             $test++;
                        }
                        $str = $value->date_time;

                        # 12 апреля 2015
                        $month = array("", "Января","Февраля","Марта","Апреля","Мая","Июня",
                                "Июля","Августа","Сентября","Октября","Ноября","Декабря");

                        $time = strtotime($str);

                        $custom_fields = unserialize($value->custom_fields);
                        $date_str = date('d', $time) . ' ' . $month[intval(date('m', $time))] . ' ' . date('Y', $time);
                        
                        $center_name = $custom_fields['Медцентр'];
                        $center_name = explode('Центр ', $center_name);
                        $p_center = get_page_by_title($center_name[1]);
                        $p_doctor = get_page_by_title($custom_fields['Доктор'], OBJECT, 'doctors');
                        
                        if($center_name[1]=="в Видном")$go_url = "/med_center/vidnoe/";
                        if($center_name[1]=="на Ярославском шоссе")$go_url = "/med_center/vdnh/";
                        if($center_name[1]=="на Коломенской")$go_url = "/med_center/kolomenskaya/";
                        //get_permalink($p_center->ID);
                        ?>
                        <div class="otz review-<?php echo $value->id; ?>">
                            <div class="data"><?php echo $date_str;?></div>
                            <h4><?php echo $value->reviewer_name; ?></h4>
                            <p><?php echo nl2br($value->review_text); ?></p>
                            <div class="opt"><?php if(!empty($custom_fields['Заболевание'])) { ?><b>Заболевание:</b> <em><?php echo $custom_fields['Заболевание']; ?></em><?php } ?></div>
                            <div class="opt"><?php if(!empty($custom_fields['заболевание'])) { ?><b>Заболевание:</b> <em><?php echo $custom_fields['заболевание']; ?></em><?php } ?></div>
                            <div class="opt"><?php if(!empty($custom_fields['Медцентр'])) { ?><b>Медцентр:</b> <a href="<?php echo $go_url ?>"><?php echo $custom_fields['Медцентр']; ?></a><?php } ?></div>
                            <div class="opt"><?php if(!empty($custom_fields['медцентр'])) { ?><b>Медцентр:</b> <a href="<?php echo $go_url ?>"><?php echo $custom_fields['медцентр']; ?></a><?php } ?></div>
                            <div class="opt"><?php if(!empty($custom_fields['Доктор'])) { ?><b>Доктор:</b> <a href="<?php echo get_permalink($p_doctor->ID); ?>"><?php echo $custom_fields['Доктор']; ?></a><?php } ?></div>
                            <div class="opt"><?php if(!empty($custom_fields['доктор'])) { ?><b>Доктор:</b> <a href="<?php echo get_permalink($p_doctor->ID); ?>"><?php echo $custom_fields['доктор']; ?></a><?php } ?></div>
                        </div>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

<?php endwhile; // End of the loop. ?>
<?php echo do_shortcode('[WPCR_INSERT]');?>
<script type="text/javascript">
    jQuery(function() {
        var choices = [
            <?php
                $args = array( 'post_type' => 'doctors', 'posts_per_page' => 200, 'order' => 'ASC' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                  ?>
                      {text: '<?php the_title(); ?>', value: '<?php the_title(); ?>'},
                <?php
                endwhile; ?>
            ];
        jQuery('#custom_2').immybox({
            'choices': choices,
            defaultSelectedValue: '', maxResults:choices.length
        });
    })
</script>
<?php get_footer(); ?>
