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
 * @package flowersandtoys
 */

get_header();
?>


            <div class="mainslider glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">

                        <?php
                        // параметры по умолчанию
                        $posts = get_posts( array(
	                        'numberposts' => -1,
	                        'category_name'    => 'slider',
	                        'orderby'     => 'date',
	                        'order'       => 'ASC',
	                        'post_type'   => 'post',
	                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );

                        global $post;

                        foreach( $posts as $post ){
	                        setup_postdata( $post );
                            ?>
                            <li style="background-image: url('<?php the_field('slider_img'); ?>')" class="glide__slide">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-7 offset-1">
                                            <h2
                                                style="
                                                <?php
                                                    $field = get_field('slider_text_color');

                                                    if ($field == 'white'){
                                                        ?>
                                                            color: #ffffff;
                                                        <?php

                                                    }
                                                ?>
                                                "
                                                    class="slider__title"><?php the_title(); ?></h2>
	                                        <?php
	                                        $field = get_field('slider_btn');

	                                        if ($field == 'on'){
		                                        ?>
                                                <a href="<?php  the_field('slider_link')?>" class="button">Узнать больше</a>
		                                        <?php

	                                        }
	                                        ?>


                                        </div>
                                    </div>
                                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                        <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.982942 13.3923L12.2253 24.631C12.7186 25.123 13.5179 25.123 14.0124 24.631C14.5057 24.1389 14.5057 23.3397 14.0124 22.8476L3.66178 12.5007L14.0112 2.15378C14.5045 1.66172 14.5045 0.862477 14.0112 0.369169C13.5179 -0.122894 12.7174 -0.122894 12.2241 0.369169L0.981696 11.6077C0.495966 12.0947 0.495966 12.9065 0.982942 13.3923Z" fill="white"/>
                                        </svg>
                                    </button>
                                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                        <svg width="15" height="25" viewBox="0 0 15 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.0171 11.6077L2.77467 0.369029C2.28137 -0.123032 1.48213 -0.123032 0.987571 0.369029C0.494263 0.861093 0.494264 1.66033 0.987572 2.15239L11.3382 12.4993L0.98882 22.8462C0.495512 23.3383 0.495512 24.1375 0.98882 24.6308C1.48213 25.1229 2.28261 25.1229 2.77592 24.6308L14.0183 13.3923C14.504 12.9053 14.504 12.0935 14.0171 11.6077Z" fill="white"/>
                                        </svg>
                                    </button>
                                </div>
                            </li>
                            <?php
                        }

                        wp_reset_postdata(); // сброс
                        ?>


                    </ul>
                </div>
            </div>

            <div class="about" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                            <div class="about__img">
                                <img src="<?php the_field('about_img'); ?>" alt="про компанию">
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                            <h1 class="title underlined"><?php the_field('about_title'); ?></h1>
                            <br>
                                <?php the_field('about_description'); ?>
                            <div class="about__text">
                            </div>
                            <a href="#" class="button">Узнать больше</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="specialists" id="specialists">
                <div class="container">
                    <div class="title"><?php the_field('showcase_title'); ?></div>
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <img class="specialists__img" src="<?php the_field('showcase_img'); ?>" alt="наша команда">
                        </div>
                    </div>
                </div>
            </div>

            <div class="toys" id="toys">
                <div class="container">
                    <h2 class="subtitle">Рекомендуемые товары</h2>
                    <div class="toys__wrapper">
                    <?php
                        // параметры по умолчанию
                        $my_posts = get_posts( array(
                        'numberposts' => -1,
                        'category_name'    => 'goods',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );

                        global $post;

                        foreach( $my_posts as $post ){
                        setup_postdata( $post );
                        ?>
                            <div class="toys__item" style="background-image: url(<?php
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail_url();
                                } else {
                                    echo get_template_directory_uri() . '/assets/img/some_goods.jpeg';
                                }
                                ?>)">
                                <div class="toys__item-info">
                                    <div class="toys__item-title"><?php the_title(); ?></div>
                                    <div class="toys__item-descr">
                                        <!-- <?php the_field('goods_decription'); ?> -->
                                        <?php get_the_content() ?>
                                    </div>
                                    <?php
                                        $field = get_field('goods_btn');

                                        if ($field == 'on') {
                                            ?>
                                                        <a href="<?php the_field('good_description_link'); ?>" class="minibutton toys__trigger">Подробнее</a>
                                                    <?php

                                        }
                                        ?>
                                    
                                </div>
                            </div>
                        <?php
                        }

                        wp_reset_postdata(); // сброс
                        ?>
                    </div>
            <div class="contacts" id="contacts">
                <h1 class="title">Где нас найти</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contacts__descr underlined">
                                <?php the_field('contacts_find_us'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contacts__map">
                                <?php the_field('map'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="title contacts__minititle">Свяжитесь с нами</div>
                            <div class="contacts__info">
                                <div class="contacts__phones">
                                    <div class="contacts__phoneblock">
                                        Телефон №1
                                        <div class="contacts__phonewrap">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                            <a href="tel:+7<?php the_field('contacts_phone_1'); ?>">+7<?php the_field('contacts_phone_1'); ?></a>
                                        </div>
                                    </div>
                                    <div class="contacts__phoneblock">
                                        Телефон №1
                                        <div class="contacts__phonewrap">
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                            <a href="tel:+7<?php the_field('contacts_phone_2'); ?>">+7<?php the_field('contacts_phone_2'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="contacts__mail">
                                    Или напишите нам на почту
                                    <a href="mailto:<?php the_field('contacts_mail'); ?>"><?php the_field('contacts_mail'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title contacts__minititle">Оставьте ваш отзыв</div>
                            <div class="contacts__feed">
                                <?php echo do_shortcode('[contact-form-7 id="100" title="Контактная форма 1"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="question">
                <div class="question__text">
                    Есть вопросы? Напишите нам!
                </div>
                <div id="reply" class="minibutton">Написать</div>
                <div class="question__close">&times</div>
            </div> -->

            <div class="reply">
                <div class="reply__body">
                    <div class="reply__title">
                        Оставьте ваш вопрос здесь
                    </div>
                    <form action="#">
                        <div class="reply__wrapper">
                            <div>
                                <label for="name">Ваше имя <span>*</span></label>
                                <input name="name" id="name" type="text" required>
                            </div>
                        </div>
                        <div class="reply__wrapper">
                            <div>
                                <label for="mail">Email</label>
                                <input name="mail" id="mail" type="email">
                            </div>
                            <div>
                                <label for="phone">Ваш телефон <span>*</span></label>
                                <input name="phone" id="phone" type="tel" required>
                            </div>
                        </div>
                        <label for="text">Ваш вопрос <span>*</span></label>
                        <textarea required name="text" id="text"></textarea>
                        <button class="minibutton">Отправить</button>
                        <div class="reply__close">&times</div>
                    </form>
                </div>
            </div>

<?php get_footer(); ?>
