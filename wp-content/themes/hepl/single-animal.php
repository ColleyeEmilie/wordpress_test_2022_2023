<?php get_header()?>
<?php if(have_posts()): while(have_posts()):the_post();?>
    <main class="animal">
        <h1 class="animal__title"><?= get_the_title(); ?></h1>
        <dl class="animal__details">
            <dt class="sro"><?=__hepl('Espèce')?></dt>
            <dd class="animal__attribute"><?= __hepl(get_field('species')); ?></dd>
            <dt class="sro"><?=__hepl('Âge')?></dt>
            <dd class="animal__attribute"><?= get_field('age'); ?></dd>
            <dt class="sro"><?=__hepl('Sexe')?></dt>
            <dd class="animal__attribute"><?= __hepl(get_field('gender')); ?></dd>
        </dl>
    </main>
<?php endwhile;endif;?>
<?php get_footer()?>