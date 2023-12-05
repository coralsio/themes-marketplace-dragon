<?php
$categories = [];
$posts = [];

if (\Schema::hasTable('posts')
    && class_exists(\Corals\Modules\CMS\Models\Page::class)
    && class_exists(\Corals\Modules\CMS\Models\Post::class)
) {
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'home', 'type' => 'page',],
        array(
            'title' => 'Home',
            'meta_keywords' => 'home',
            'meta_description' => 'home',
            'content' => '<h5>Welcome to</h5>
            <h1>Lara<span>ship</span></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>',
            'published' => 1,
            'published_at' => '2017-11-16 14:26:52',
            'private' => 0,
            'template' => 'home',
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2018-11-01 16:27:04',
            'updated_at' => '2018-11-01 16:27:07',
        ));
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'blog', 'type' => 'page'],
        array(
            'title' => 'Blog',
            'meta_keywords' => 'Blog',
            'meta_description' => 'Blog',
            'content' => '<div class="text-center">
<h2>Blog</h2>
<p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
</div>',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'template' => 'right',
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'pricing', 'type' => 'page'],
        array(
            'title' => 'Pricing',
            'meta_keywords' => 'Pricing',
            'meta_description' => '',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'template' => 'full',
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'how-to-shop', 'type' => 'page'],
        array(
            'title' => 'How to shop',
            'meta_keywords' => 'How to shop',
            'meta_description' => 'How to shop',
            'content' => ' 
 <div class="ht-banner-wrap">
        <div class="ht-banner void violet">
            <figure class="ht-banner-img1">
                <img src="/assets/themes/marketplace-dragon/images/how_to_shop_01.png" alt="">
            </figure>
        </div>
        <div class="ht-banner">
            <!-- HT BANNER CONTENT -->
            <div class="ht-banner-content">
                <p class="text-header">Create Your Account</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in der henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <a href="#" class="button mid dark">Create your <span class="primary">New Account</span></a>
            </div>
            <!-- /HT BANNER CONTENT -->
        </div>
        <!-- /HT BANNER -->

        <!-- HT BANNER -->
        <div class="ht-banner void pink">
            <figure class="ht-banner-img2">
                <img src="/assets/themes/marketplace-dragon/images/how_to_shop_02.png" alt="">
            </figure>
        </div>
        <!-- /HT BANNER -->

        <!-- HT BANNER -->
        <div class="ht-banner">
            <!-- HT BANNER CONTENT -->
            <div class="ht-banner-content">
                <p class="text-header">Browse Our Shop Items</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in der henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <a href="#" class="button mid dark"><span class="primary">Most Popular</span> Items</a>
            </div>
            <!-- /HT BANNER CONTENT -->
        </div>
        <!-- /HT BANNER -->

        <!-- HT BANNER -->
        <div class="ht-banner void blue">
            <figure class="ht-banner-img3">
                <img src="/assets/themes/marketplace-dragon/images/how_to_shop_03.png" alt="">
            </figure>
        </div>
        <!-- /HT BANNER -->

        <!-- HT BANNER -->
        <div class="ht-banner">
            <!-- HT BANNER CONTENT -->
            <div class="ht-banner-content">
                <p class="text-header">Shopping Cart and Checkout</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in der henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <a href="#" class="button mid dark">Our <span class="primary">Payment Methods</span></a>
            </div>
            <!-- /HT BANNER CONTENT -->
        </div>
        <!-- /HT BANNER -->
    </div>',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'template' => 'full',
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));
    \Corals\Modules\CMS\Models\Page::updateOrCreate(['slug' => 'contact-us', 'type' => 'page'],
        array(
            'title' => 'Contact Us',
            'meta_keywords' => 'Contact Us',
            'meta_description' => 'Contact Us',
            'content' => '<div class="text-center"><h2 class="color:#2b373a">Drop Your Message</h2><p class="lead" style="text-align: center;">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>',
            'published' => 1,
            'published_at' => '2017-11-16 11:56:34',
            'private' => 0,
            'type' => 'page',
            'template' => 'contact',
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2017-11-16 11:56:34',
            'updated_at' => '2017-11-16 11:56:34',
        ));

    $posts[] = \Corals\Modules\CMS\Models\Post::updateOrCreate(['slug' => 'lorem-ipsum-dolor-sit-amet1', 'type' => 'post'],
        array(
            'title' => 'LOREM IPSUM DOLOR SIT AMET',
            'meta_keywords' => NULL,
            'meta_description' => NULL,
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut iaculis arcu. Proin tincidunt, ipsum nec vehicula euismod, neque nibh pretium lorem, at ornare risus sem et risus. Curabitur pulvinar dui viverra libero lobortis in dictum velit luctus. Donec imperdiet tincidunt interdum

Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam libero lobortis in dictum velit luctus. Donec imperdiet tincidunt interdum.</p>',
            'published' => 1,
            'published_at' => '2018-10-31 11:18:23',
            'private' => 0,
            'type' => 'post',
            'template' => NULL,
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2018-10-31 23:45:51',
            'updated_at' => '2018-10-31 13:18:23',
        ));
    $posts[] = \Corals\Modules\CMS\Models\Post::updateOrCreate(['slug' => 'rutrum-nonvopxe-sapiente-delectus-aut-bonbde', 'type' => 'post'],
        array(
            'title' => 'Rutrum Nonvopxe Sapiente Delectus Aut Bonbde',
            'meta_keywords' => NULL,
            'meta_description' => NULL,
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut iaculis arcu. Proin tincidunt, ipsum nec vehicula euismod, neque nibh pretium lorem, at ornare risus sem et risus. Curabitur pulvinar dui viverra libero lobortis in dictum velit luctus. Donec imperdiet tincidunt interdum

Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam libero lobortis in dictum velit luctus. Donec imperdiet tincidunt interdum.</p>',
            'published' => 1,
            'published_at' => '2018-10-31 10:21:25',
            'private' => 0,
            'type' => 'post',
            'template' => NULL,
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2018-10-31 13:21:25',
            'updated_at' => '2018-10-31 13:21:25',
        ));
    $posts[] = \Corals\Modules\CMS\Models\Post::updateOrCreate(['slug' => 'lorem-ipsum-dolor-sit-amet', 'type' => 'post'],
        array(
            'title' => 'LOREM IPSUM DOLOR SIT AMET',
            'meta_keywords' => NULL,
            'meta_description' => NULL,
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut iaculis arcu. Proin tincidunt, ipsum nec vehicula euismod, neque nibh pretium lorem, at ornare risus sem et risus. Curabitur pulvinar dui viverra libero lobortis in dictum velit luctus. Donec imperdiet tincidunt interdum

Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adminim veniam libero lobortis in dictum velit luctus. Donec imperdiet tincidunt interdum.</p>',
            'published' => 1,
            'published_at' => '2018-10-31 10:33:19',
            'private' => 0,
            'type' => 'post',
            'template' => NULL,
            'author_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2018-10-31 10:31:46',
            'updated_at' => '2018-10-31 10:33:19',
        ));
}

if (\Schema::hasTable('categories') && class_exists(\Corals\Modules\CMS\Models\Category::class)) {
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Computers',
        'slug' => 'computers',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Smartphone',
        'slug' => 'smartphone',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Gadgets',
        'slug' => 'gadgets',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Technology',
        'slug' => 'technology',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Engineer',
        'slug' => 'engineer',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Subscriptions',
        'slug' => 'subscriptions',
    ]);
    $categories[] = \Corals\Modules\CMS\Models\Category::updateOrCreate([
        'name' => 'Billing',
        'slug' => 'billing',
    ]);
}
$posts_media = [
    0 => array(
        'id' => 10,
        'model_type' => 'Corals\\Modules\\CMS\\Models\\Post',
        'collection_name' => 'featured-image',
        'name' => 'marketplace_furnitica_one',
        'file_name' => 'marketplace_furnitica_one.jpg',
        'mime_type' => 'image/jpg',
        'disk' => 'media',
        'size' => 50.6,
        'manipulations' => '[]',
        'custom_properties' => '{"root":"demo"}',
        'order_column' => 10,
        'created_at' => '2018-10-31 23:45:51',
        'updated_at' => '2018-10-31 23:45:51',
    ),
    1 => array(
        'id' => 11,
        'model_type' => 'Corals\\Modules\\CMS\\Models\\Post',
        'collection_name' => 'featured-image',
        'name' => 'marketplace_furnitica_two',
        'file_name' => 'marketplace_furnitica_two.jpg',
        'mime_type' => 'image/jpg',
        'disk' => 'media',
        'size' => 38.5,
        'manipulations' => '[]',
        'custom_properties' => '{"root":"demo"}',
        'order_column' => 11,
        'created_at' => '2018-10-31 13:21:25',
        'updated_at' => '2018-10-31 13:21:25',
    ),
    2 => array(
        'id' => 12,
        'model_type' => 'Corals\\Modules\\CMS\\Models\\Post',
        'collection_name' => 'featured-image',
        'name' => 'marketplace_furnitica_three',
        'file_name' => 'marketplace_furnitica_three.jpg',
        'mime_type' => 'image/jpg',
        'disk' => 'media',
        'size' => 75.7,
        'manipulations' => '[]',
        'custom_properties' => '{"root":"demo"}',
        'order_column' => 12,
        'created_at' => '2018-10-31 13:33:19',
        'updated_at' => '2018-10-31 13:33:19',
    ),
];
foreach ($posts as $index => $post) {
    $randIndex = rand(0, 6);
    if (isset($categories[$randIndex])) {
        $category = $categories[$randIndex];
        try {
            \DB::table('category_post')->insert(array(
                array(
                    'post_id' => $post->id,
                    'category_id' => $category->id,
                )
            ));
        } catch (\Exception $exception) {
        }
    }

    if (isset($posts_media[$index])) {
        try {
            $posts_media[$index]['model_id'] = $post->id;
            \DB::table('media')->insert($posts_media[$index]);
        } catch (\Exception $exception) {
        }
    }
}

if (class_exists(\Corals\Menu\Models\Menu::class) && \Schema::hasTable('posts')) {
    // seed root menus
    $topMenu = Corals\Menu\Models\Menu::updateOrCreate(['key' => 'frontend_top'], [
        'parent_id' => 0,
        'url' => null,
        'name' => 'Frontend Top',
        'description' => 'Frontend Top Menu',
        'icon' => null,
        'target' => null,
        'order' => 0
    ]);

    $topMenuId = $topMenu->id;

    // seed children menu
    Corals\Menu\Models\Menu::updateOrCreate(['key' => 'home'], [
        'parent_id' => $topMenuId,
        'url' => '/',
        'active_menu_url' => '/',
        'name' => 'Home',
        'description' => 'Home Menu Item',
        'icon' => 'fa fa-home',
        'target' => null,
        'order' => 0
    ]);
    Corals\Menu\Models\Menu::updateOrCreate(['key' => 'how-to-shop'],[
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'how-to-shop',
        'active_menu_url' => 'how-to-shop',
        'name' => 'How to shop',
        'description' => 'how to shop menu item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);
    Corals\Menu\Models\Menu::updateOrCreate(['key' => 'pricing'],[
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'pricing',
        'active_menu_url' => 'pricing',
        'name' => 'Pricing',
        'description' => 'Pricing Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);


    Corals\Menu\Models\Menu::updateOrCreate(['key' => 'contact-us'], [
        'parent_id' => $topMenuId,
        'key' => null,
        'url' => 'contact-us',
        'active_menu_url' => 'contact-us',
        'name' => 'Contact Us',
        'description' => 'Contact Us Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);

    $footerMenu = Corals\Menu\Models\Menu::updateOrCreate(['key' => 'frontend_footer'], [
        'parent_id' => 0,
        'url' => null,
        'name' => 'Frontend Footer',
        'description' => 'Frontend Footer Menu',
        'icon' => null,
        'target' => null,
        'order' => 0
    ]);

    $footerMenuId = $footerMenu->id;

// seed children menu
    Corals\Menu\Models\Menu::updateOrCreate(['key' => 'footer_home'], [
        'parent_id' => $footerMenuId,
        'url' => '/',
        'active_menu_url' => '/',
        'name' => 'Home',
        'description' => 'Home Menu Item',
        'icon' => 'fa fa-home',
        'target' => null,
        'order' => 0
    ]);
    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $footerMenuId,
        'key' => null,
        'url' => 'about-us',
        'active_menu_url' => 'about-us',
        'name' => 'About Us',
        'description' => 'About Us Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);
    Corals\Menu\Models\Menu::updateOrCreate([
        'parent_id' => $footerMenuId,
        'key' => null,
        'url' => 'contact-us',
        'active_menu_url' => 'contact-us',
        'name' => 'Contact Us',
        'description' => 'Contact Us Menu Item',
        'icon' => null,
        'target' => null,
        'order' => 980
    ]);
}


if (\Schema::hasTable('cms_blocks') && class_exists(\Corals\Modules\CMS\Models\Block::class)) {
    $block = \Corals\Modules\CMS\Models\Block::updateOrCreate(['name' => 'Blocks Home', 'key' => 'blocks-home-marketplace'], [
        'name' => 'Blocks Home',
        'key' => 'blocks-home-marketplace',
    ]);

    $widgets = array(
        array(
            'title' => 'Blocks Home',
            'content' => '<div id="services-wrap">
        <section id="services">
            <div class="service-list column4-wrap">
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-present"></span>
                    </div>
                    <h3>Buy &amp; Sell Easily</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <!-- /SERVICE ITEM -->

                <!-- SERVICE ITEM -->
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-lock"></span>
                    </div>
                    <h3>Secure Transaction</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <!-- /SERVICE ITEM -->

                <!-- SERVICE ITEM -->
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-like"></span>
                    </div>
                    <h3>Products Control</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <!-- /SERVICE ITEM -->

                <!-- SERVICE ITEM -->
                <div class="service-item column">
                    <div class="circle medium gradient"></div>
                    <div class="circle white-cover"></div>
                    <div class="circle dark">
                        <span class="icon-diamond"></span>
                    </div>
                    <h3>Quality Platform</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
                <!-- /SERVICE ITEM -->
            </div>
            <!-- /SERVICE LIST -->
            <div class="clearfix"></div>
        </section>
    </div>',
            'block_id' => $block->id,
            'widget_width' => 12,
            'widget_order' => 0,
            'status' => 'active',
        ),
    );
    foreach ($widgets as $widget) {
        \Corals\Modules\CMS\Models\Widget::updateOrCreate(
            ['block_id' => $widget['block_id'], 'title' => $widget['title']],
            $widget
        );
    }
}

if (\Schema::hasTable('cms_blocks') && class_exists(\Corals\Modules\CMS\Models\Block::class)) {
    $block = \Corals\Modules\CMS\Models\Block::updateOrCreate(['name' => 'Blocks Home Content', 'key' => 'blocks-home-content'], [
        'name' => 'Blocks Home Content',
        'key' => 'blocks-home-content',
    ]);

    $widgets = array(
        array(
            'title' => 'Blocks Home Content',
            'content' => '<div class="promo-banner dark left">
        <span class="icon-wallet"></span>
        <h5>Make money instantly!</h5>
        <h1>Start <span>Selling</span></h1>
        <a href="/login" class="button medium primary">Open Your Shop!</a>
    </div>
    <div class="promo-banner secondary right">
        <span class="icon-tag"></span>
        <h5>Find anything you want</h5>
        <h1>Start Buying</h1>
        <a href="/register" class="button medium dark">Register Now!</a>
    </div>',
            'block_id' => $block->id,
            'widget_width' => 12,
            'widget_order' => 0,
            'status' => 'active',
        ),
    );
    foreach ($widgets as $widget) {
        \Corals\Modules\CMS\Models\Widget::updateOrCreate(
            ['block_id' => $widget['block_id'], 'title' => $widget['title']],
            $widget
        );
    }
}

if (\Schema::hasTable('cms_blocks') && class_exists(\Corals\Modules\CMS\Models\Block::class)) {
    $block = \Corals\Modules\CMS\Models\Block::updateOrCreate(['name' => 'Blocks Home Services', 'key' => 'blocks-home-services'], [
        'name' => 'Blocks Home Services',
        'key' => 'blocks-home-services',
    ]);

    $widgets = array(
        array(
            'title' => 'Blocks Home Services',
            'content' => '<div id="services-wrap">
            <section id="services" class="services-v2">
                <!-- SERVICE LIST -->
                <div class="service-list small column3-wrap">
                    <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <span class="icon-present"></span>
                        </div>
                        <h3>Buy &amp; Sell Easily</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <!-- /SERVICE ITEM -->

                    <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <span class="icon-lock"></span>
                        </div>
                        <h3>Secure Transaction</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <!-- /SERVICE ITEM -->

                    <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <span class="icon-like"></span>
                        </div>
                        <h3>Products Control</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <!-- /SERVICE ITEM -->

                    <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <span class="icon-diamond"></span>
                        </div>
                        <h3>Quality Platform</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <!-- /SERVICE ITEM -->

                    <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <span class="icon-earphones-alt"></span>
                        </div>
                        <h3>Assistance 24/7</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <!-- /SERVICE ITEM -->

                    <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <span class="icon-bubble"></span>
                        </div>
                        <h3>Support Forums</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <!-- /SERVICE ITEM -->
                </div>
                <!-- /SERVICE LIST -->
                <div class="clearfix"></div>
            </section>
        </div>',
            'block_id' => $block->id,
            'widget_width' => 12,
            'widget_order' => 0,
            'status' => 'active',
        ),
    );
    foreach ($widgets as $widget) {
        \Corals\Modules\CMS\Models\Widget::updateOrCreate(
            ['block_id' => $widget['block_id'], 'title' => $widget['title']],
            $widget
        );
    }
}
