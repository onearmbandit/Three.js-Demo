<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  Fox_PKG
 */

get_header();
$page_header_type        = get_post_meta( $post->ID, 'page_header_type', true );
$page_header_title       = get_post_meta( $post->ID, 'page_header_title', true );
$page_header_sub_title   = get_post_meta( $post->ID, 'page_header_sub_title', true );
$page_header_description = get_post_meta( $post->ID, 'page_header_description', true );
$page_header_cta_btn     = get_post_meta( $post->ID, 'page_header_cta_btn', true );
$page_header_cta_url     = get_post_meta( $post->ID, 'page_header_cta_url', true );
$page_header_cta_new_tab = get_post_meta( $post->ID, 'page_header_cta_new_tab', true );
$banner_img              = get_post_meta($post->ID,'post_banner_img',true);
$banner_img1             = explode(',', $banner_img);
$icon_img                = get_post_meta($post->ID,'post_icon_img',true);
$icon_img1               = explode(',', $icon_img);
$header_background_img   = get_post_meta($post->ID,'header_background_img',true);

if($page_header_cta_new_tab == 'yes'){
	$page_header_cta_new_tab = '_blank';
}
else{
	$page_header_cta_new_tab = '_self';
}

?>

<script>
    jQuery( document ).ready(function() {
        if (screen.width > 767) {
            document.getElementById("headerImage").style.backgroundImage = "url('<?php echo wp_get_attachment_url($header_background_img); ?>')";
        }
    });
</script>

<!-- Page Header -->
<?php if(!empty($page_header_type)){?>
	<header class="page-header" id="headerImage">
            <div class="page-header--container">
                <div class="page-header--content">
					<?php if($page_header_type == 'fea_img_bred' || $page_header_type == 'no_fea_img_bred') {?>
                    <div class="page-header--breadcrum"><?php get_breadcrumb();?></div>
					<?php } else { ?>
                        <div class="page-header--icon">
						<?php if(!empty($icon_img)) {
                            foreach ($icon_img1 as $attachment_id1) { ?>
                            <img src="<?php echo wp_get_attachment_url( $attachment_id1 );?>">
                        <?php }
                        }?>
						</div>
                    <?php } ?>
                    <h1 class="heading-one page-header--heading">
					<?php if($page_header_type == 'fea_img_no_bred' || $page_header_type == 'fea_img_bred'){
						if( !empty($page_header_sub_title)){?>
                        <span><?php echo esc_attr($page_header_sub_title);?></span>
						<?php }
					}
					if( !empty($page_header_title)){
						 echo esc_attr($page_header_title);
					}
					?>
                    </h1>
					<?php  if($page_header_type == 'fea_img_no_bred' || $page_header_type == 'fea_img_bred'){ ?>
                    <div class="page-header--para">
                        <div class="content-para">
						<?php	if( !empty($page_header_description)){
							 echo wp_kses_post($page_header_description);
						}?>
                        </div>
                        <?php if(!empty($page_header_cta_btn)){?>
                        <div class="page-header--cta">
                            <a href="<?php  echo esc_attr($page_header_cta_url); ?>" target="<?php echo esc_attr( $page_header_cta_new_tab ); ?>"  class="btn get-started orange-border"><?php echo esc_attr($page_header_cta_btn);?></a>
                        </div>
                        <?php } ?>
                    </div>
					<?php } ?>
					<?php if($page_header_type == 'fea_img_no_bred' || $page_header_type == 'fea_img_bred') {?>
					<div class="scroll-icon">
						<span></span> Scroll
					</div>
					<?php }?>
                </div>
				<?php if($page_header_type == 'fea_img_no_bred' || $page_header_type == 'fea_img_bred') {?>
                <div class="page-header--art">
				<?php if(!empty($banner_img)) {
                     foreach ($banner_img1 as $attachment_id) { ?>
					<img src="<?php echo wp_get_attachment_url( $attachment_id );?>">
				<?php }
                } ?>
                </div>
				<?php } ?>
            </div>
    </header>
	<?php }?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
