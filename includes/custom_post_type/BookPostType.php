<?php

/**
 * Created by PhpStorm.
 * User: romansolomashenko
 * Date: 23.02.17
 * Time: 1:11 PM
 */
namespace includes\custom_post_type;

class BookPostType
{

    public function __construct()
    {
        /*
         * Регистрируем Custom Post Type
         */
        add_action( 'init', array( $this, 'registerBookPostType' ) );
    }

    public function registerBookPostType(){
        /*
        * Регистрируем новый тип записи
        */
        register_post_type('book', array(
            'labels'             => array(
                'name'               => 'Книги', // Основное название типа записи
                'singular_name'      => 'Книга', // отдельное название записи типа Book
                'add_new'            => 'Добавить новую',
                'add_new_item'       => 'Добавить новую книгу',
                'edit_item'          => 'Редактировать книгу',
                'new_item'           => 'Новая книга',
                'view_item'          => 'Посмотреть книгу',
                'search_items'       => 'Найти книгу',
                'not_found'          =>  'Книг не найдено',
                'not_found_in_trash' => 'В корзине книг не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => 'Книги'

            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
        ) );
    }
}