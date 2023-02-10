<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <div class="hero">
        <h2 class="hero__title"><?= get_the_title(); ?></h2>
        <p><?= get_field('subtitle');?></p>
    </div>
    <main class="page">
        <div class="page__content">
            <?php the_content(); ?>
        </div>
        <figure class="page__picture">
            <?php $img = get_field('accueil'); ?>
            <img src="<?= $img['sizes']['thumbnail']?>" alt="<?= $img['alt'];?>">
        </figure>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>