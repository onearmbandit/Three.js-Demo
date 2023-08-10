<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package  Fox_PKG
 */

get_header();

$search_image = get_theme_mod('404_image');
$title        = get_theme_mod('fox_pkg_404_title') ? get_theme_mod('fox_pkg_404_title') : '404';
$sub_title    = get_theme_mod('fox_pkg_404_subtitle');
$content      = get_theme_mod('fox_pkg_404_content');
?>

<div class="common-page">
    <div class="body-content">

    <section class="not-found">
        <div class="not-found--container">
                <div class="not-found--left">
                    <div class="number">
                        <?php echo wp_kses_post($title);?>
                    </div>
                    <?php if($sub_title && !empty($sub_title)) {?>
                        <div class="title">
                            <?php echo wp_kses_post($sub_title);?>
                        </div>
                    <?php }?>
                    <?php if($content && !empty($content)) {?>
                        <div class="content-para">
                            <?php echo wp_kses_post($content);?>
                        </div>
                    <?php }?>
                    <div class="cta">
                        <a href="<?php echo esc_url(home_url());?>" class="btn get-started orange-border">Go Home</a>
                    </div>
                </div>

                <?php if($search_image && !empty($search_image)) {?>
                <div class="not-found--right">
                    <img src="<?php echo esc_url($search_image); ?>" alt="fox_pkg" />
                </div>
                <?php }?>
        </div>
    </section>

    </div>
</div>

<?php
get_footer();
