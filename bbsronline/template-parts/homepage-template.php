<?php
/**
 * Template Name: Static Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 get_header();
?>

<?php 
    $args = array( 'post_type' => 'slider', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );
    if ( have_posts() ) :
?>
        <section class="single-item">
            <div class="carousel-wrapper">
                <?php 
                    while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                <div>
                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                </div>
                <?php
                    endwhile;
                ?>
            </div>
        </section>
<?php
   endif;
?>
<!-- choose your occasion -->
<?php if ( is_active_sidebar( 'choose-your-occasion' )  ) : ?>
	<div class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'choose-your-occasion' ); ?>
	</div><!-- .sidebar .widget-area -->
<?php endif; ?>
<!-- choose your location end -->
<div class="container">
    <div class=" col-xs-12 text-center">    			
        <select class="text-center">
            <option>Find more Occasions</option>
            <option>Occasions1</option>
            <option>Occasions2</option>
        </select>   	
        <?php if ( has_nav_menu( 'category-dropdown' ) ) : ?>
        <nav id="category-nav" class="text-center">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'category-dropdown',
                    'menu_class'     => 'category-dropdown',
                ) );
            ?>
        </nav><!-- .main-navigation -->	
                    <?php endif; ?>	
    </div>  
</div>
<?php if ( is_active_sidebar( 'body-content-ad' )  ) : ?>
	<section id="secondary" class="container body-content-ad text-center" role="complementary">
		<?php dynamic_sidebar( 'body-content-ad' ); ?>
    </section><!-- .sidebar .widget-area -->
<?php endif; ?>
<?php if ( is_active_sidebar( 'category-section-1' )  ) : ?>
	<?php dynamic_sidebar( 'category-section-1' ); ?>
<?php endif; ?>

<?php get_footer(); ?>