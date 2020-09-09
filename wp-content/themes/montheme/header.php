<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head() ?>
</head>
<body>
    <nav>
        <?php the_embed_site_title() ?>
        <div class="nav_list">
            <?php wp_nav_menu([
                'theme_location' => 'main_menu'
            ]); ?>
        </div>
    </nav>
