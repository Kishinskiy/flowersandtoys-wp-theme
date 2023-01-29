<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flowersandtoys
 */

?>

	            <footer>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                            <div href="#" class="footer__logo">
                                <?php the_custom_logo(); ?>
                            </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="footer__social">
                                    <div class="footer__social-item">
                                        Мы в соцсетях:
                                    </div>

                                    <?php
                                    // параметры по умолчанию
                                    $posts = get_posts(
                                        array(
                                            'numberposts' => -1,
                                            'category_name' => 'social_media',
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                            'post_type' => 'post',
                                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                        ));

                                    global $post;

                                    foreach ($posts as $post) {
                                        setup_postdata($post);
                                    ?>
                                        <a href="<?php the_field('social_media_link'); ?>" class="footer__social-item">
                                            <?php the_field('social_media_icon'); ?>
                                        </a>
                                    <?php
                                    }

                                    wp_reset_postdata(); // сброс
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-0 col-lg-6 col-xl-5 offset-xl-1">
                                <div class="footer__contacts">
                                    <div class="footer__contacts-item">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/svg/phone.svg" alt="телефон" class="footer__contacts-logo">
                                        <div class="footer__contacts-tel">
                                            <a href="tel:+7<?php the_field('contacts_phone_1'); ?>">+7<?php the_field('contacts_phone_1'); ?></a>
                                            <a href="tel:+7<?php the_field('contacts_phone_2'); ?>">+7<?php the_field('contacts_phone_2'); ?></a>
                                        </div>
                                    </div>
                                    <div class="footer__contacts-item">
                                        <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/svg/pointer.svg" alt="указатель" class="footer__contacts-logo">
                                        <address><?php the_field('contacts_address'); ?></address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <?php wp_footer(); ?>
            </body>
        </html>
