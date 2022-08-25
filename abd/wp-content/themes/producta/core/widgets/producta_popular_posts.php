<?php
class Producta_Widget_Popular_Posts extends WP_Widget
{
	function __construct()
    {
		$widget_ops = array(
            'classname'   => 'producta-popular-posts',
            'description' => esc_html__('A widget that displays your popular posts from all categories or a certain', 'producta')
        );
		parent::__construct( 'producta_popular_posts_widget', esc_html__('Producta: Popular Posts', 'producta'), $widget_ops );
	}

	function widget( $args, $instance )
    {
		extract( $args );
		$title        = apply_filters('widget_title', $instance['title'] );
		$categories   = $instance['categories'];
		$number       = $instance['number'];
        
		$query = array(
            'cat'                   => $categories,
            'showposts'             => $number,
            'nopaging'              => 0,
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'meta_key'              => 'producta_post_viewed',
            'orderby'               => 'meta_value_num',
            'order'                 => 'DESC'
        );	
		
        $loop = new WP_Query($query);
        
		if ( $loop->have_posts() ) :
    		echo wp_kses_post( $before_widget );
    		if ( $title ) {
    		    echo wp_kses_post( $before_title . $title . $after_title );
    		} ?>
			<div class="list-popular-post">
			<?php
                while ( $loop->have_posts() ) : 
                $loop->the_post();
            ?>
                <article <?php post_class(); ?>>
                    <?php if ( wp_get_attachment_url(get_post_thumbnail_id()) ) {
                        $featured_image = producta_resize_image( get_post_thumbnail_id(), null, 90, 90, true, false );
                        ?>
                    <div class="post-image">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php the_title_attribute(); ?>">
                        </a>
                    </div>
                    <?php } ?>
					<div class="post-content">
                        <h4 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h4>
                        <div class="post-ft">
                            <div class="post-cats"><?php the_category(', '); ?></div>
                            <div class="post-date"><?php echo esc_html( get_the_date('d.m.Y') ); ?></div>
                        </div>
                    </div>
                </article>
			<?php endwhile; ?>
            </div><?php
            wp_reset_postdata();
            echo wp_kses_post( $after_widget );
        endif;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['categories'] = sanitize_text_field( $new_instance['categories'] );
		$instance['number'] = absint( $new_instance['number'] );
		return $instance;
	}

	function form( $instance )
    {
		$defaults = array(
            'title'         => esc_html__('Most Popular Posts', 'producta'),
            'number'        => 2,
            'categories'    => ''
        );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'producta'); ?></label>
			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"  />
		</p>
		<p>
    		<label for="<?php echo esc_attr( $this->get_field_id('categories') ); ?>"><?php echo esc_html__('Filter by Category:', 'producta');?></label> 
    		<select id="<?php echo esc_attr( $this->get_field_id('categories') ); ?>" name="<?php echo esc_attr( $this->get_field_name('categories') ); ?>" class="widefat categories" style="width:100%;">
    			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_html__('All categories', 'producta');?></option>
    			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
    			<?php foreach($categories as $category) { ?>
    			<option value='<?php echo esc_attr( $category->term_id ); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo wp_kses_post( $category->cat_name ); ?></option>
    			<?php } ?>
    		</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e('Number of posts to show:', 'producta'); ?></label>
			<input min="1" type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" size="3" />
		</p>
	<?php
	}
}

function producta_popular_posts_init() {
	register_widget( 'Producta_Widget_Popular_Posts' );
}
add_action( 'widgets_init', 'producta_popular_posts_init' );
