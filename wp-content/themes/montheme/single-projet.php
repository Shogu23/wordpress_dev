<?php get_header() ?>
<div class="container">
    <main>

        <!-- On vérifie si on a des articles -->
        <?php if(have_posts()): ?>

            <!-- On boucle sur les articles -->
            <?php while(have_posts()): the_post(); ?>

                <!-- Titre de l'article peut etre remplacer par the title(<h1>, </h1>) -->
                <h1><?php the_title() ?></h1>

                <p>Projet du <span class="date-article"> <?= get_the_date()?> </span></p>

                <?php the_post_thumbnail('large'); ?>

                <div><?php the_content() ?></div> 

                

            <?php endwhile; ?>

        <?php else: ?>

            <p>On n'a pas de projet</p>

        <?php endif; ?>

    </main>









<?php get_sidebar() ?>

</div>

<?php get_footer() ?>