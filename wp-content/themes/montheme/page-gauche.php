<?php
/*
Template Name: Colonne à gauche
*/
get_header() ?>
<div class="container">
    <?php get_sidebar() ?>
        <main>

            <!-- On vérifie si on a des articles -->
            <?php if(have_posts()): ?>

                <!-- On boucle sur les articles -->
                <?php while(have_posts()): the_post(); ?>

                    <!-- Titre de l'article peut etre remplacer par the title(<h1>, </h1>) -->
                    <h1><?php the_title() ?></h1>

                    <p>Page écrite le <?= get_the_date()?> par <?php the_author() ?></p>

                    <div><?php the_content() ?></div> 

                <?php endwhile; ?>

            <?php else: ?>

                <p>On n'a pas d'article ou page</p>

            <?php endif; ?>

        </main>



</div> <!-- Fin div container -->

<?php get_footer() ?>