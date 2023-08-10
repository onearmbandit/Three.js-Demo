<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package  ONXRP
 */

get_header();
global $post;
$page_header_title       = get_post_meta( $post->ID, 'page_header_title', true );
$page_header_sub_title   = get_post_meta( $post->ID, 'page_header_sub_title', true );
$page_header_cta_btn     = get_post_meta( $post->ID, 'page_header_cta_btn', true );
$page_header_cta_url     = get_post_meta( $post->ID, 'page_header_cta_url', true );
$page_header_cta_new_tab = get_post_meta( $post->ID, 'page_header_cta_new_tab', true );
$display_author          = get_post_meta( $post->ID, 'page_header_diaplay_author', true );
$page_header_read        = get_post_meta( $post->ID, 'page_header_read', true ) ? get_post_meta( $post->ID, 'page_header_read', true ) : OnXRPTimeToread($post);
$banner_img              = get_post_meta($post->ID,'post_banner_img',true);
$banner_img1             = explode(',', $banner_img);
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

<header class="page-header blog-header" id="headerImage">
            <div class="page-header--container">
                <div class="page-header--content">
				 <div class="page-header--breadcrum"><?php get_breadcrumb(); ?></div>

                    <h1 class="heading-one page-header--heading">
                	<?php	if( !empty($page_header_sub_title)){?>
                        <span><?php echo esc_attr($page_header_sub_title);?></span>
						<?php }
                        if( !empty($page_header_title)){
                         echo esc_attr($page_header_title);
                        }?>
                    </h1>
                    <?php if($display_author == 'yes'){ ?>
					<div class="page-header--author">
                        <div class="author">
                            <?php  $author_id=$post->post_author;
                            the_author_meta( 'display_name' , $author_id );?>
                        </div>
                            <?php
                            $author_position = get_the_author_meta('user_position', $author_id);
                            if(!empty($author_position)){
                            ?>
                             <div class="author-position">
                                <?php echo $author_position; ?>
                            </div>
                            <?php } ?>
                    </div>
                    <?php } ?>

                    <div class="page-header--date-read">
                        <div class="date">
                            <?php echo get_the_date();?>
                        </div>
                        <?php if(!empty($page_header_read)){?>
                        <div class="read">
							<?php echo wp_kses_post($page_header_read);?>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="page-header--taxonomy">
                    <?php
                    $categories = get_the_category($post->ID);//$post->ID

                    foreach($categories as $category) {
                        echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
                     }

                  ?>
                    </div>

					<?php if(!empty($page_header_cta_btn)){?>
                    <div class="page-header--cta">
                        <a href="<?php  echo esc_attr($page_header_cta_url); ?>" target="<?php echo esc_attr( $page_header_cta_new_tab ); ?>" class="btn get-started orange-border"><?php echo wp_kses_post($page_header_cta_btn);?></a>
                    </div>
					<?php } ?>
                    <div class="scroll-icon">
						<span></span> Scroll
					</div>
                </div>
			   <div class="page-header--art">
                <?php if(!empty($banner_img)) {
                     foreach ($banner_img1 as $attachment_id) { ?>
					<img src="<?php echo wp_get_attachment_url( $attachment_id );?>">
				<?php }
                } ?>
                </div>
            </div>
        </header>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
