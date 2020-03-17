<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ADMINISTRAÇÃO</h2>
        </div>

        <?php 

            // Count the amount of posts
            $posts_count = $modelo_posts->get_posts_count();

            // Count the amount of categories
            $categories_count = $modelo_categorias->get_categories_count();

        ?>

        <!-- Widgets -->
        <div class="row clearfix">
            <a href="<?php echo HOME_URI . '/modulo_admin/gerenciar_posts' ?>">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">POSTS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $posts_count; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo HOME_URI . '/modulo_admin/gerenciar_categorias' ?>">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">CATEGORIAS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $categories_count; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">COMENTÁRIOS</div>
                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        <!-- #END# Widgets -->
        </div>
    </div>
</section>