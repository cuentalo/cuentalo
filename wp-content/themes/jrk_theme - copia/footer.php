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
                    <h3>Justice Repair Kit</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis velit inventore eum! Esse id magnam, sapiente molestiae ipsa dignissimos quas corrupti quasi culpa assumenda deserunt perferendis inventore, ut, commodi dolorem!</p>
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