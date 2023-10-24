<nav class="navbar navbar-expand-lg navbar-light bg-light mobile_menu_container">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobile_menu"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'category-menu',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'mobile_menu',
                // Change this to your menu location
                'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                'walker' => new Mobile_Nav_Walker(),
            )
        );
        ?>
    </div>
</nav>