<?php
/*
  Template Name: Template for "3d printing materials"
*/
?>


<!-- Include Header -->
<?php get_header(); ?>

<div class="main-top-banner-wrapper printing-materials">
    <div class="img-block">
        <img src="<?php echo get_template_directory_uri(); ?>/images/HeroShot-2.png" alt="">
    </div>
    <div class="content-block">
        <h1 class="header">3D PRINTING MATERIALS</h1>
        <p class="text">Poly-Med provides fully traceable, medical grade polymers and filaments for additive
            manufacturing. Our materials offer distinct advantages by their unique properties based on their
            composition, architecture, and desired performance. Poly-Med’s bioresorbable materials are not only
            guaranteed to have the best quality standards, they also provide innovative properties that yield a better
            printing experience, coupled with enhanced part functionality. With over 910 polymer solutions we are
            continuously developing the next bioresorbable materials for your device needs.
        </p>
    </div>
</div>


<div class="centered-container">

    <section class="making-filaments">
        <h2 class="header-content-general">MAKING FILAMENTS FOR 3D PRINTING</h2>
        <div class="filaments-wrapper-items">

            <div class="first-item-block">
                <div class="img-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/filaments-1.png" alt="">
                </div>
                <div class="content-block">
                    <div class="content-item">
                        <span class="circle">1</span>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias
                            eaque facere facilis
                            iure, labore minus modi molestias, quae repellendus sed, suscipit voluptatem voluptates.
                            Debitis, in, temporibus?
                        </p>
                    </div>
                </div>
            </div>

            <div class="third-item-block">
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/making-filaments-1.png" alt="">
                    <p class="text">Poly-Med is an FDA and ISO 13485 registered company that operates a manufacturing
                        facility in compliance to 21 CFR Part 820, Quality System Regulation. Because we have the
                        ability to see our products from raw monomer to extruded 3D filament, our quality assurance
                        standards are engrained in the very core of our company.</p>
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/making-filaments-2.png" alt="">
                    <p class="text">All 3D filaments are further inspected and assessed for molecular properties to
                        ensure consistent and repeatable printing. Our materials are tested for molecular weight,
                        monomer content, and thermal properties.</p>
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/making-filaments-3.png" alt="">
                    <p class="text">As all of our bioresorbable polymers degrade by hydrolytic degradation, minimizing
                        water content is of the utmost importance for enhancing 3DP filament shelf life and maintaining
                        functionality. All products are thoroughly dried to less than 1000 ppm moisture and hermetically
                        packaged in foil.</p>
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/making-filaments-4.png" alt="">
                    <p class="text">The final product! Enjoy printing a first-in-class 3D filament that can be used for
                        bioresorbable scaffold and device development on your own 3D printer!</p>
                </div>
            </div>

            <div class="purple-btn-block">
                <a href="http://poly-med.local/3d-printing-services#print-with-us" class="purple-btn">print with us</a>
            </div>

        </div>
    </section>

    <section class="printing-materials-goods-wrapper">
        <h2 class="header-content-general">3D PRINTING MATERIALS</h2>
        <p class="text-content-general">We currently offer the polymers below and also can provide custom material
            solutions for your 3D
            printing applications. <a href="mailto:sales@poly-med3d.com">Contact Us</a> sales@poly-med3d.com
        </p>

        <div class="key-wrapper">
            <div class="key-block">
                <span class="header">Key</span>
                <span class="plus-btn"><i class="icon-plus"></i></span>
            </div>
            <div class="key-info-block">
                <ul>
                    <li><span>G = Glycolide</span></li>
                    <li><span>L = Lactide</span></li>
                    <li><span>D = Dioxanone</span></li>
                    <li><span>PEG = Polyethylene Glycol</span></li>
                    <li><span>TMC = Trimethylene Carbonate</span></li>
                    <li><span>C = Caprolactone</span></li>
                    <li><span>PPS = Polypropylene succinate</span></li>
                </ul>
            </div>
        </div>

        <div class="printing-materials-goods-block">
            <ul class="items-list">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'stock_status' => 'publish',
                    'category' => 'dual_products',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => 'dual_products'
                        )
                    ),
                    'meta_query' => array(
                        array(
                            'key' => '_stock_status',
                            'value' => 'instock'
                        )
                    )
                );

                $loop = new WP_Query($args);


                while ($loop->have_posts()) : $loop->the_post();

                    global $product; ?>

                    <li>


                        <h3 class="header"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </h3>

                        <p class="description"><?php echo $product->post->post_excerpt; ?></p>

                        <div class="gallery-info-block">

                            <?php
                            $attachment_ids = $product->get_gallery_attachment_ids();
                            $i = 0; ?>

                            <div class="images-block">

                                <?php
                                foreach ($attachment_ids as $attachment_id) {
                                    if ($i < 2) { ?>
                                        <a href="<?php echo get_permalink(); ?>"><img
                                                    src="<?php echo $image_link = wp_get_attachment_url($attachment_id); ?>"></a>
                                        <?php $i++;
                                    }
                                }
                                ?>
                            </div>

                            <?php

                            $keys_repeater = get_field('keys');

                            if ($keys_repeater) {

                                ?>

                                <div class="shop_attributes">
                                    <ul>

                                        <?php foreach ($keys_repeater as $keys) { ?>

                                            <li>
                                                <span><?php echo $keys['name']; ?> :</span>
                                                <span class="product_weight"><?php echo $keys['value']; ?></span>
                                            </li>

                                        <?php } ?>

                                    </ul>
                                </div>

                            <?php } ?>

                            <a class="more-info-about" href="<?php echo get_permalink(); ?>">Request more info
                                about <?php echo get_the_title(); ?></a>

                        </div>

                        <div class="bottom-buttons-block">
                            <a href="<?php echo get_permalink(); ?>" class="purple-btn">SELECT OPTIONS</a>
                            <a href="http://poly-med.local/3d-printing-services#print-with-us" class="purple-btn">print
                                with us</a>
                        </div>

                    </li>
                <?php
                endwhile;

                wp_reset_query();
                ?>
            </ul>
        </div>

    </section>

</div>


<?php get_footer(); ?>
