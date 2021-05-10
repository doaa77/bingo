<?php
/**
 *
 * @package Academy Lite
 */

get_header(); 

if (!is_home() && is_front_page()) {
	$hideslide = esc_html(get_theme_mod('hide_slider', '1'));
	 if($hideslide == ''){   
$academy_lite_pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $academy_lite_pages[] = $mod;
    }	
} 
if( !empty($academy_lite_pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $academy_lite_pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $academy_lite_slideno[] = $i;
          $academy_lite_slidetitle[] = get_the_title();
		  $academy_lite_slidedesc[] = get_the_excerpt();
          $academy_lite_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $academy_lite_slideno as $academy_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $academy_lite_sln ); ?>" class="nivo-html-caption">
      <div class="top-bar">
        <h2><a href="<?php echo esc_url($academy_lite_slidelink[$k] ); ?>"><?php echo esc_html($academy_lite_slidetitle[$k] ); ?></a></h2>
        <p><?php echo esc_html($academy_lite_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide-button" href="<?php echo esc_url($academy_lite_slidelink[$k] ); ?>">
          <?php echo esc_html(get_theme_mod('slide_text',__('Read More','academy-lite')));?>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
?>

<div class="main-container">

  
  <?php
    $hidesec = esc_html(get_theme_mod( 'hide_first_section','1' ));
    if( $hidesec == '' ){
  ?>
    <section id="icon-boxes">
      <div class="container">
        <div class="flex-element">
          <?php
            for( $fsec = 1; $fsec<4; $fsec++ ){
              if( get_theme_mod( 'page-setting'.$fsec,true ) !='' ){
                $fsecquery = new WP_Query(array('page_id' => esc_html(get_theme_mod('page-setting'.$fsec))));
                while( $fsecquery->have_posts() ) : $fsecquery->the_post();
          ?>
          <div class="col">
            <div class="icon-box">
              <div class="inner-icon-box">
                <?php if( has_post_thumbnail() ) { ?>
                  <div class="icon-box-icon">
                    <?php the_post_thumbnail('icon-box-thumb'); ?>
                  </div><!-- icon box icon -->
                <?php } ?>
                <div class="icon-box-content">
                  <h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><?php the_excerpt(); ?></p>
                </div><!-- icon box-content -->
              </div><!-- inner icon box -->
            </div><!-- icon box -->
          </div>
          <?php endwhile; wp_reset_postdata();
              }
            }
          ?>
        </div><!-- flex element -->
      </div><!-- container -->
    </section>
  <?php 
    }
  $hidebox = esc_html(get_theme_mod('hide_second_section', '1')); ?>  
  <?php if($hidebox  == '') { ?>
  <?php if(get_theme_mod('ser-setting1',true) != '' ) { ?>  
  <section id="pagearea">
    <div class="full-container">
      <div class="flex-element">
      <?php if(get_theme_mod('ser-setting1') != '') { ?>
      <?php $page_query = new WP_Query(array('page_id' => esc_html(get_theme_mod('ser-setting1')))); ?>
      <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
      <div class="col">
        
          <?php if( has_post_thumbnail() ) { 
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
            $url = $src[0];
            echo '<div class="thumb" style="background-image:url('.$url.');"></div><!-- thumb -->';
          } ?>
        
      </div><!-- one_half -->
      <div class="col">
        <div class="pagearea-content">
          <?php
            $sec_subttl = esc_html(get_theme_mod('ser-second-sec-ttl','1'));
            if( !empty( $sec_subttl ) ){
              echo '<h6 class="sub_ttl">'.$sec_subttl.'</h6>';
            }
          ?>
          <h2><?php the_title(); ?></h2>
          <p> <?php the_content(); ?> </p>
          <a href="<?php the_permalink(); ?>" class="wel-read"><?php esc_html_e('Read More','academy-lite'); ?></a>
        </div>
      </div><!-- one_half -->
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php } ?>
      <div class="clear"></div>
      </div><!-- .flex -->
    </div><!-- container-->
  </section>
  <?php } } ?>
                                     
     <div class="content-area">
      <div class="middle-align content_sidebar">
          <div class="site-main" id="sitemain">
			<?php
              if ( have_posts() ) :
                  // Start the Loop.
                  while ( have_posts() ) : the_post();
                      /*
                       * Include the post format-specific template for the content. If you want to
                       * use this in a child theme, then include a file called called content-___.php
                       * (where ___ is the post format) and that will be used instead.
                       */
                      get_template_part( 'content-page', get_post_format() );
					
                  endwhile;
                  // Previous/next post navigation.
                  the_posts_pagination();
				wp_reset_postdata();
              
              else :
                  // If no content, include the "No posts found" template.
                   get_template_part( 'no-results' );
              
              endif;
              ?>
          </div>
          <?php get_sidebar();?>
          <div class="clear"></div>
      </div>
  </div>
<?php get_footer(); ?>