<?php get_header(); ?>

    <section id="b-cart_default">
        <div class="b-not_found">
            <div class="text-center">
                <div class="b-page_header">
                    <h1 class="page-title">Not Found</h1>
                </div>
                <h2><b>THIS IS SOMEWHAT EMBARRASSING, ISN’T IT?</b></h2>
                <p>
                    It looks like nothing was found at this location. Maybe try a search?
                </p>
                <form role="search" method="" id="" class="b-searchform" action="<?= get_home_url() ?>">
                    <div>
                        <input type="text" placeholder="Search for products" value="" name="s" id="S">
                        <input type="hidden" name="post_type" id="post_type" value="product">
                        <button type="submit" class="btn" id="">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php get_footer(); ?>