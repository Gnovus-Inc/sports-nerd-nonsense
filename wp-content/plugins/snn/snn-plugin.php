<?php
/**
 * Plugin name: Snn Plugin
 * Description: Snn custom post type plugin
 * Author: Gnovus
 * Author URI: https://www.gnovus.com/
 * Version: 1.0
 */

/**
 * Remove singluar class from body_class when post is page
 *
 * @return string[]
 */
function remove_class_body_x93pwn($wp_classes){
	if(is_page()) {
		unset( $wp_classes[ array_search( "singular", $wp_classes ) ] );
	}

	return $wp_classes;
}
add_filter('body_class', 'remove_class_body_x93pwn');


/**
 * SNN Article custom type
 *
 * @since SNN Article api was completed
 *
 * @return void 
 */
function create_snn_articletype_x93pwn() {
	register_post_type('snn_article', [
		'labels' => [
			'name' => __('SNN Articles'),
			'singular_name' => __('SNN Article')
		],
		'public' => true,
		'has_archive' => true,
		'rewrite' => [
			'slug' => __('snn_article')
		],
		'show_in_rest' => true
	]);
}
add_action('init', 'create_snn_articletype_x93pwn');

function cw_post_type_snn_article_x93pwn() {
	$supports = array(
		'title',		// Title
		'author',		// Author
		'excerpt',		// Teaser
		'content',		// Raw
		'source',		// Source
		'category',		// Topics
		'tags',			// Tags
		'symbols',		// Symbols
		'snn_article_id',		// SNN Article id
		'thumbnail', 	// Thumbnail
	);
	$labels = array(
		'name' => _x('SNN Articles', 'plural'),
		'singular_name' => _x('SNN Article', 'singular'),
		'menu_name' => _x('SNN Article', 'admin menu'),
		'name_admin_bar' => _x('SNN Article', 'admin bar'),
		'add_new' => _x('Add SNN Article', 'add snn_article'),
		'add_new_item' => __('Add snn_article'),
		'new_item' => __('New snn'),
		'edit_item' => __('Edit snn'),
		'view_item' => __('View snn'),
		'all_items' => __('SNN Articles'),
		'search_items' => __('Search snns'),
		'not_found' => __('No snn_articles found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'rewrite' => [
			'slug' => 'snn_article'
		],
		'taxonomies' => ['tags'],
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_rest' => true,
		'query_var' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type('snn_article', $args);
}
add_action('init', 'cw_post_type_snn_article_x93pwn');

// custom fields
add_action("admin_init", "snn_article_admin_init");

function snn_article_admin_init(){
  add_meta_box("articles_meta", "Article fields", "articles_meta", "snn_article", "normal", "low");
}

function articles_meta() {
    $customStringFields = [
        ["snn_article_id", 'SNN Article ID'],
        ["teaser", 'Teaser'],
        ["discussed_game", 'Discussed Game'],
        ["sport", 'Sport'],
        ["league", 'League'],
        ["source", 'Source'],
        ["model", 'Model'],
        ["title", 'Title'],
        ["channel", 'Channel'],
        ["channel_url", 'Channel URL'],
        ["channel_img", 'Channel IMG'],
        ["published", 'Published']
    ];

    $customArrayFields = [
        ["authors", "Authors"],
        ["tone", "Tone"],
        ["sentiment", "Sentiment"],
        ["discussed_teams", "Discussed Teams"],
        ["discussed_players", "Discussed Players"],
        ["main_points", "Main Points"],
        ["tags", "Tags"]
    ];
    global $post;
    $custom = get_post_custom($post->ID);
    foreach($customStringFields as $customField) {
        $value = $custom[$customField[0]][0];
    ?>
        <p><label><?= $customField[1]; ?> :</label><br />
        <input type="text" cols="50" rows="5" name="<?= $customField[0]; ?>" value="<?= $value; ?>" /></p>
    <?php
    }

    foreach($customArrayFields as $customField) {
    $value = json_decode($custom[$customField[0]][0], true);
    ?>
        <p><label><?= $customField[1]; ?> :</label><br />
        <input type="text" cols="50" rows="5" name="<?= $customField[0]; ?>" value="<?= join(', ', $value); ?>" /></p>
    <?php
    }
}

add_action('save_post', 'save_ssn_details');

function save_ssn_details(){
    global $post;

    $customStringFields = [
        ["snn_article_id", 'SNN Article ID'],
        ["teaser", 'Teaser'],
        ["discussed_game", 'Discussed Game'],
        ["sport", 'Sport'],
        ["league", 'League'],
        ["source", 'Source'],
        ["model", 'Model'],
        ["title", 'Title'],
        ["channel", 'Channel'],
        ["channel_url", 'Channel URL'],
        ["channel_img", 'Channel IMG'],
        ["published", 'Published']
    ];

    $customArrayFields = [
        ["authors", "Authors"],
        ["tone", "Tone"],
        ["sentiment", "Sentiment"],
        ["discussed_teams", "Discussed Teams"],
        ["discussed_players", "Discussed Players"],
        ["main_points", "Main Points"],
        ["tags", "Tags"]
    ];
    foreach($customStringFields as $customField) {
        update_post_meta($post->ID, $customField[0], $_POST[$customField[0]]);
    }

    foreach($customArrayFields as $customField) {
        update_post_meta($post->ID, $customField[0], json_encode(explode(',', $_POST[$customField[0]])));
    }
  }
// custom fields
function add_snn_article_post_type_x1234($query) {
	if ( is_home() && $query->is_main_query() ) {
		$query->set('post_type', ['post', 'snn_article']);
	}

	return $query;
}
add_action('pre_get_posts', 'add_snn_article_post_type_x1234');

/**
 * Add snn_article id field
 *
 * @since SNN Article api was completed
 *
 * @return void 
 */
function display_custom_field_callback_x312($post) {
	$snn_article_id = get_post_meta($post->ID, 'snn_article_id', true);
	
	wp_nonce_field('snn_article_id_box_nonce', 'meta_box_nonce');
	
	echo '<p><label for="snn_article_id_label">SNN Article ID</label> <input type="text" name="snn_article_id" id="snn_article_id" value="'. $snn_article_id .'" /></p>';
}
function register_custom_fields_x93kd() {
	add_meta_box('field_snn_article_id', 'SNN Article ID', 'display_custom_field_callback_x312', 'snn');
}
add_action('add_meta_boxes', 'register_custom_fields_x93kd');

function save_snn_article_id_meta_box_x198($post_id) {
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if( !isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'snn_article_id_box_nonce') ) return;
	if( !current_user_can('edit_posts', $post_id) ) return;
	
	if( isset($_POST['snn_article_id']) ) {
		update_post_meta($post_id, 'snn_article_id', $_POST['snn_article_id'] );
	}
}
add_action('save_post', 'save_snn_article_id_meta_box_x198');

function get_user_id_post($author) {
	$username = str_replace(' ', '.', strtolower($author));
	$user_email = $username . '@mail.com';
	$user_id = username_exists($username);
	
	if (!$user_id and !email_exists($user_email)) {
		$random_password = wp_generate_password($length=12, $include_standard_special_chars=false);
		$user_id = wp_create_user($username, $random_password, $user_email);
		wp_update_user([
			'ID' => $user_id, 
			'display_name' => $author, 
			'role' => 'Author'
		]);
	}

	return $user_id;
}
function update_snn_article_taxonomies($post_id, $tags) {
	$tags_list = [];
	
	$tags_list = array_map(function ($tag) {
		return rtrim(ltrim($tag));
	}, $tags);

	if (count($tags_list) > 0) {
		wp_set_post_terms($post_id, $tags_list, 'snn_articles_tags', true);
	}
	
	return [
        'tags'=>count($tags_list)];
}
function upload_featured_image($post_id, $image_url) {
	$arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );
	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents($image_url, false, stream_context_create($arrContextOptions));
	$filename = basename( $image_url );
	$filepath = wp_mkdir_p($upload_dir['path']);
	
	if ( $filepath ) {
		$file = $upload_dir['path'] . '/' . $filename;
	} else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}
	$logImage = file_put_contents( $file, $image_data );

	$wp_filetype = wp_check_filetype( $filename, null );
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title' => sanitize_file_name($filename),
		'post_content' => '',
		'post_status' => 'inherit'
	);

	$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

	require_once( dirname(__DIR__) . '/../../wp-admin/includes/image.php' );
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	$res1= wp_update_attachment_metadata( $attach_id, $attach_data );
	$res2= set_post_thumbnail( $post_id, $attach_id );
	
	return $res2;
}

function post_snn_data(WP_REST_Request $request) {
 	$record = $request->get_params();

 	$data = [];
	$wp_error = null;
 	$queryArgs = [
 		'post_type' => 'snn_article',
 		'meta_key' => 'article_id',
 		'meta_compare' => '=',
 	];
    $customStringFields = [
        "teaser",
        "discussed_game",
        "sport",
        "league",
        "source",
        "model",
        "title",
        "channel",
        "channel_url",
        "channel_img",
        "published"
    ];
    $customArrayFields = [
        "authors",
        "tone",
        "sentiment",
        "discussed_teams",
        "discussed_players",
        "main_points",
        "tags"
    ];
    $id = null;
    $snn_articleId = uniqid('feed_', true);

    $queryArgs['meta_value'] = $snn_articleId;
    $query = new WP_Query($queryArgs);

    $record['post_type'] = $queryArgs['post_type'];
    // Insert post if not exists
    $record['post_author'] = get_user_id_post('SNNWriter');
    $record['post_content'] = $record['discussed_game'];
    $record['post_title'] = $record['title'];
    $record['post_excerpt'] = $record['teaser'];
    
    if (!$query->have_posts()) {
        $record['post_status'] = 'publish';
        
        $id = wp_insert_post($record, $wp_error);

        // $categories = isset($record['post_category']) ? explode(',', $record['post_category']) : [];
        $tags = isset($record['tags_input']) ? explode(',', $record['tags_input']) : [];
        // $symbols = isset($record['symbols']) ? explode(',', $record['symbols']) : [];
        
        update_post_meta($id, 'snn_article_id', $snn_articleId);
        foreach($customStringFields as $customField) {
            update_post_meta($id, $customField, $record[$customField]);
        }

        foreach($customArrayFields as $customField) {
            update_post_meta($id, $customField, json_encode($record[$customField]));
        }

        update_snn_article_taxonomies($id, $tags);
        
        if ($record['featured_image_url'] !== '') {
            upload_featured_image($id, $record['featured_image_url']);
        }
        // wp_update_post($record, $wp_error);
    }

    if ($id) {
        $data[$snn_articleId]['id'] = $id;
        $data[$snn_articleId]['permalink'] = get_permalink($id);
    }

    if ($wp_error) {
        $data[$snn_articleId]['error'] = $wp_error;
    }

 	return $data;
}

// http://localhost/wp-json/v2/webhooks/benzinga/
// http://localhost/wp-json/v1/snn/articles
add_action( 'rest_api_init', function () {
	register_rest_route( 'v1/snn', '/articles', [
		'methods' => 'POST',
		'callback' => 'post_snn_data',
		'permission_callback' => '__return_true',
	]);
});

