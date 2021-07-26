<?php get_header(); ?>
<p>ceci est le template page.php qui affiche le contenue de tout les pages du site</p>
<!-- <h1>page.php</h1> -->

<h1 class="titre-de-page"><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php get_footer(); ?>