<?php
/**
 * 
 * Template Name: Front Page Template
 *
 */

?>


<? get_header(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Custom Post Type Accordion</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
  <script>
  $(function() {
  $(".accordion-header").on("click", function() {
      var content = $(this).next(".accordion-content");
      content.slideToggle();
      $(this).toggleClass("expanded");
    });
  });
  </script>
</head>
<body>
 
<div class="container">
    <div class="grid-container">
        <?php
        // Obtener la página actual de la query string
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'snn_article',
            'posts_per_page' => 9,
            'paged' => $paged,
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) : 
            while ($query->have_posts()) : $query->the_post(); 
                $custom_fields = array(
                  'Teaser' => get_post_meta(get_the_ID(), 'teaser', true),
                  'Channel Url' => get_post_meta(get_the_ID(), 'channel_url', true),
                  'Channel' => get_post_meta(get_the_ID(), 'channel', true),
                  'Authors' => get_post_meta(get_the_ID(), 'authors', true),
                  'Tone' => get_post_meta(get_the_ID(), 'tone', true),
                  'Sentiment' => get_post_meta(get_the_ID(), 'sentiment', true),
                  'Discussed Game' => get_post_meta(get_the_ID(), 'discussed_game', true),
                  'Discussed Players' => get_post_meta(get_the_ID(), 'discussed_players', true),
                  'Main Points' => get_post_meta(get_the_ID(), 'main_points', true),
                  'Tags' => get_post_meta(get_the_ID(), 'tags', true),
                  'Source' => get_post_meta(get_the_ID(), 'source', true),
                );

                $post_date = get_the_date('d.m');
                ?>
                <div class="card">
                    <div class="card-body">
                      <div class="date-channel">
                        <div class="post-date"><?php echo $post_date; ?></div>
                        <div class="post-channel"><?php echo esc_html($custom_fields['Channel']); ?></div>
                      </div>
                        <div class="accordion-header">
                          <i class="fas fa-chevron-right toggle-icon"></i>
                          <h2 class="card-title"><?php the_title(); ?></h2>
                        </div>
                        <div class="accordion-content" id="accordion-<?php the_ID(); ?>">
                          <div class="accordion-body">
                            <?php foreach ($custom_fields as $field_label => $field_value) : ?>
                              <?php if ($field_label == 'Teaser') : ?>
                                    <p><?php echo esc_html($field_value); ?></p>
                                <?php elseif ($field_label == 'Source') : ?>
                                  <p><a href="<?php echo esc_url($field_value); ?>" target="_blank"><strong><?php echo $field_label; ?></strong></a></p>
                                <?php elseif ($field_label == 'Channel Url') : ?>
                                 <?php echo '';?>
                                <?php else : ?>
                                  <p><strong><?php echo $field_label; ?>:</strong> <?php echo esc_html($field_value); ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
    </div>
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $query->max_num_pages,
            'current' => $paged,
            'prev_text' => __('&laquo; Anterior'),
            'next_text' => __('Siguiente &raquo;'),
        ));
        ?>
    </div>
    <?php
        wp_reset_postdata();
        else : 
            echo 'No articles found';
        endif;
        ?>
</div>

</body>
</html>

<?php get_footer(); ?>