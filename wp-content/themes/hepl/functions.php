<?php

// Désactiver l'éditeur "Gutenberg" de Wordpress
add_filter('use_block_editor_for_post', '__return_false', 10);

//Navigation menu
register_nav_menu('main', 'Navigation principale du site web (en-tête) ');
register_nav_menu('footer', 'Navigation de pied de page');
register_nav_menu('social-media', 'liens vers les réseaux sociaux');

//custom function that returns a menu structure for giver location
function hepl_get_menu(string $location, ?array $attributes = []): array
{
    // 1. récupérer les liens en base de données pour la location $location
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location];
    $items = wp_get_nav_menu_items($menuId);
    //2. formater les liens récupérés en objet qui contiennent les attributs suivants
        // - href : l'URL complete pour ce lien
        // - label : le libellé affichable pour ce lien
    $links = [];
    foreach($items as $item){
        $link = new stdClass(); // crée un objet vide qui ne contient rien du tout.
        $link->href = $item->url;
        $link->label= $item->title;

        foreach($attributes as $attribute){
            $link->$attribute = get_field($attribute,$item->ID);
        }
        $links[] = $link;
    }
    //3. Retourner l'ensemble des liens formatés en un seul tableau non-associatif
    return $links;
};