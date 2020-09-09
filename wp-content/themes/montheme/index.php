<?php get_header() ?>
<div class="container">
    <main>

        <!-- On vérifie si on a des articles -->
        <?php if(have_posts()): ?>

            <!-- On boucle sur les articles -->
            <?php while(have_posts()): the_post(); ?>

                <!-- Titre de l'article peut etre remplacer par the title(<h1>, </h1>) -->
                <h1><?php the_title() ?></h1>

                <p><?= __('Post published', 'montheme') ?> <span class="date-article"> <?= __('on', 'montheme') ?> <?= get_the_date()?> </span>  
                <span class="cat-article"> <?= __('in', 'montheme') ?> <?php the_category(' - ') ?> <?= __('by', 'montheme') ?> </span> 
                <?php the_author() ?></p>

                <div><?php the_content() ?></div> 

            <?php endwhile; ?>

        <?php else: ?>

            <p><?= __('There\'s no content to show', 'montheme') ?></p>

        <?php endif; ?>

    </main>









<?php get_sidebar() ?>

</div>

<?php get_footer() ?>