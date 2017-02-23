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
        add_action( 'init', array( &$this, 'registerBookPostType' ) );

        // Сообщения при публикации или изменении типа записи book
        add_filter('post_updated_messages',  array( &$this, 'bookUpdatedMessages' ));
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


    public function bookUpdatedMessages(){
        global $post;

        $messages['book'] = array(
            0 => '', // Не используется. Сообщения используются с индекса 1.
            1 => sprintf( 'Book обновлено. <a href="%s">Посмотреть запись book</a>', esc_url( get_permalink($post->ID) ) ),
            2 => 'Произвольное поле обновлено.',
            3 => 'Произвольное поле удалено.',
            4 => 'Запись Book обновлена.',
            /* %s: дата и время ревизии */
            5 => isset($_GET['revision']) ? sprintf( 'Запись Book восстановлена из ревизии %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => sprintf( 'Запись Book опубликована. <a href="%s">Перейти к записи book</a>', esc_url( get_permalink($post->ID) ) ),
            7 => 'Запись Book сохранена.',
            8 => sprintf( 'Запись Book сохранена. <a target="_blank" href="%s">Предпросмотр записи book</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
            9 => sprintf( 'Запись Book запланирована на: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр записи book</a>',
                // Как форматировать даты в PHP можно посмотреть тут: http://php.net/date
                date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post->ID) ) ),
            10 => sprintf( 'Черновик записи Book обновлен. <a target="_blank" href="%s">Предпросмотр записи book</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
        );

        return $messages;
    }
}