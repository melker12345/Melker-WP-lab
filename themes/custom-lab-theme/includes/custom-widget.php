<?php
/**
 * Custom Lab Theme Featured Posts Widget
 */
class Custom_Lab_Featured_Posts_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'custom_lab_featured_posts',
            __('Featured Posts', 'custom-lab-theme'),
            array('description' => __('Display featured posts with thumbnails', 'custom-lab-theme'))
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $number_of_posts = isset($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 3;

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $featured_posts = new WP_Query(array(
            'posts_per_page' => $number_of_posts,
            'meta_key' => '_thumbnail_id',
            'post_type' => 'post',
            'post_status' => 'publish'
        ));

        if ($featured_posts->have_posts()) :
            echo '<ul class="featured-posts">';
            while ($featured_posts->have_posts()) : $featured_posts->the_post();
                echo '<li>';
                if (has_post_thumbnail()) {
                    echo '<div class="featured-thumbnail">';
                    the_post_thumbnail('thumbnail');
                    echo '</div>';
                }
                echo '<div class="featured-content">';
                echo '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
                echo '<span class="post-date">' . get_the_date() . '</span>';
                echo '</div>';
                echo '</li>';
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : __('Featured Posts', 'custom-lab-theme');
        $number_of_posts = isset($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 3;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'custom-lab-theme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>"><?php _e('Number of posts to show:', 'custom-lab-theme'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="number" step="1" min="1" value="<?php echo $number_of_posts; ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number_of_posts'] = (!empty($new_instance['number_of_posts'])) ? absint($new_instance['number_of_posts']) : 3;
        return $instance;
    }
}
