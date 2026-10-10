<?php
/**
 * CRISBAPRO Theme - Páginas (Política de Privacidad, Aviso legal, etc.)
 * Muestra el título y el contenido de la página creada en el editor de WordPress.
 */

get_header();
?>

<main class="page-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('page-article'); ?>>
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
