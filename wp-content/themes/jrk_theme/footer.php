<footer>
    <div class="menu-footer py-2">
        <div class="container">
                <?php wp_nav_menu(array(
					'theme_location'  => 'menu-principal',
					'container'       => 'nav',
					'container_class' => 'menu-home',
					'items_wrap'      => '<ul id="%1$s" class="menu_main">%3$s</ul>'));
				?>
        </div>
    </div>
    <div class="info-footer py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-4">
                    <h3></h3>
                    <div class="logos-ft">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ft4.png" alt="OAK">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ft2.png" alt="inclusive Design">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ft3.png" alt="JRK">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logot.png" alt="Tecnologico Comfenalco">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ft1.png" alt="Alcaldia Cartagena Secretaría">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="menu-link-social float-right pt-4">
                        <a href="#" class="pl-2">Facebook</a>
                        <a href="#" class="pl-2">Twitter</a>
                        <a href="#" class="pl-2">Instagram</a>
                        <a href="#" class="pl-2">Youtube</a>
                        <a href="#" class="pl-2">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>