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
        <section class="page__animals animals">
            <h2 class="animals__title">Nos derniers pensionnaires</h2>
            <div class="animals__container">
                <?php
                //FAIRE UNE REQUETE EN DB POUR OBTENIR LES ANIMAUX
                $animals = new WP_Query([
                    'post_type'=>'animal',
                    'posts_per_page'=>4,
                ]);
                //lancer la boucle pour afficher chaque animal
                if($animals->have_posts()):while($animals->have_posts()):$animals->the_post();
                ?>
                <article class="animal">
                    <a href="<?= get_the_permalink()?>" class="animal__link">
                        <!-- sro = screen reader only -> On le cache avec du css-->
                        <span class="sro">Découvrir <?= get_the_title()?></span>
                    </a>
                    <div class="animal__card">
                        <div class="animal__detail">
                            <h3 class="animal__name"><?= get_the_title()?></h3>
                            <dl class="animal__attributes">
                                <dt class="sro">Espece</dt>
                                <dd class="animal__atribute"><?= get_field('species')?></dd>
                                <dt class="sro">Age</dt>
                                <dd class="animal__atribute"><?= get_field('age')?></dd>
                                <dt class="sro">Sexe</dt>
                                <dd class="animal__atribute"><?= get_field('gender')?></dd>
                            </dl>
                        </div>
                    </div>
                    <figure class="animal__fig">
                        <?= get_the_post_thumbnail(null, 'animal_thumbnail') ?>
                    </figure>
                </article>
                <?php endwhile; else:?>
                <p class="animals__empty">Nous n'avons pas d'animaux pour le moment</p>
                <?php endif;?>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>