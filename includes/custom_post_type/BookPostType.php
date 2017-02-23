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

        // хук, через который подключается функция
        // регистрирующая новые таксономии  createBookTaxonomies
        add_action( 'init', array( &$this, 'createBookTaxonomies' ) );

        // Сообщения при публикации или изменении типа записи book
        add_filter('post_updated_messages',  array( &$this, 'bookUpdatedMessages' ));
        // Раздел "помощь" типа записи book
        add_action( 'contextual_help', array( &$this, 'addHelpText' ), 10, 3 );

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
            'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
            'taxonomies'          => array( 'genre', 'writer' ),
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


    public function addHelpText($contextual_help, $screen_id, $screen ){
//$contextual_help .= print_r($screen); // используйте чтобы помочь определить параметр $screen->id
        if('book' == $screen->id ) {
            $contextual_help = '
		<p>Напоминалка при редактировании записи book:</p>
		<ul>
			<li>Указать жанр, например Фантастика или История.</li>
			<li>Указать автора книги.</li>
		</ul>
		<p>Если нужно запланировать публикацию на будущее:</p>
		<ul>
			<li>В блоке с кнопкой "опубликовать" нажмите редактировать дату.</li>
			<li>Измените дату на нужную, будущую и подтвердите изменения кнопкой ниже "ОК".</li>
		</ul>
		<p><strong>За дополнительной информацией обращайтесь:</strong></p>
		<p><a href="/" target="_blank">Блог о WordPress</a></p>
		<p><a href="http://wordpress.org/support/" target="_blank">Форум поддержки</a></p>
		';
        }
        elseif( 'edit-book' == $screen->id ) {
            $contextual_help = '<p>Это раздел помощи показанный для типа записи Book и т.д. и т.п.</p>';
        }

        return $contextual_help;
    }


    public function createBookTaxonomies(){
        // определяем заголовки для 'genre'
        $labels = array(
            'name' => _x( 'Genres', 'taxonomy general name' ),
            'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Genres' ),
            'all_items' => __( 'All Genres' ),
            'parent_item' => __( 'Parent Genre' ),
            'parent_item_colon' => __( 'Parent Genre:' ),
            'edit_item' => __( 'Edit Genre' ),
            'update_item' => __( 'Update Genre' ),
            'add_new_item' => __( 'Add New Genre' ),
            'new_item_name' => __( 'New Genre Name' ),
            'menu_name' => __( 'Genre' ),
        );

        // Добавляем древовидную таксономию 'genre' (как категории) жанр
        register_taxonomy('genre', array('book'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'genre' ),
        ));

        // определяем заголовки для 'writer'
        $labels = array(
            'name' => _x( 'Writers', 'taxonomy general name' ),
            'singular_name' => _x( 'Writer', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Writers' ),
            'popular_items' => __( 'Popular Writers' ),
            'all_items' => __( 'All Writers' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Writer' ),
            'update_item' => __( 'Update Writer' ),
            'add_new_item' => __( 'Add New Writer' ),
            'new_item_name' => __( 'New Writer Name' ),
            'separate_items_with_commas' => __( 'Separate writers with commas' ),
            'add_or_remove_items' => __( 'Add or remove writers' ),
            'choose_from_most_used' => __( 'Choose from the most used writers' ),
            'menu_name' => __( 'Writers' ),
        );

        // Добавляем НЕ древовидную таксономию 'writer' (как метки)
        register_taxonomy('writer', 'book',array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'writer' ),
        ));

    }
}