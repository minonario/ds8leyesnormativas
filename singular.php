<?php
/**
 * The template for displaying all pages, single posts and attachments.
 *
 * This is a new template file that WordPress introduced in
 * version 4.3.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */

?>

<?php get_header(); ?>

<div class="headerView">
  <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAQACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP0+8YXk37Z//BRjUP2K/wBoaOx8bfATwp+z1B8RPB3h9dK0vStR8I+LdR8JubzVNB1TTrKBoXcaRbLbrdwXi6cklymmfYlnIH59kOR4TCZvOjhalbD4fBYbBvAYahHC0qOX+zhBKOBjDDRlhqbhQp03RpyVJU04QhCLsftGa55iMJwhDEUaGG9vm2NxazirUeLqSzf2c8Q6LzBTxcoV50ZYyvKFRRhNzcZ1ZVJxUj8z/E/7Bn7C3gbxL4h8E6d+yF8FdT0/wfrmreFrDUvENl4w1fX9QsvD9/caTa32uatN4wWbVNYu4LRJ9T1GVVlvb2Se5kUNKRX6BOeOcpNZliopybUVRy1qKu7JOWAlJpbJylKT6yb1PyqGYYWMIReSZVNqEU5ylmvNNpJOUuXNIx5pbvljGN3pFLQ//9k=" alt="imgBlur">
  <img class="segunda" src="<?php echo get_template_directory_uri()?>/_next/static/images/Header Leyes-887d49b23f5fde97a176d90cfc7b86a9.jpg.webp" alt="">
</div>

<section class="page-ley-normativa">
  <div data-test="container" class="container">
    <div data-test="row" class="row title">
      <h1><?php the_title(); ?></h1> 
    </div>
    <div class="row date metadate">
        <?php
          $args = array();
          $defaults = array(
                  'show_published' => true,
                  'show_modified'  => false,
                  'modified_label' => esc_html__( 'Last updated on', 'sinatra' ),
                  'date_format'    => '',
                  'before'         => '<span class="posted-on">',
                  'after'          => '</span>',
          );
          $args = wp_parse_args( $args, $defaults );

          $time_string = '<time class="entry-date published updated" datetime="%1$s"%2$s>%3$s</time>';
          $args['modified_label'] = $args['modified_label'] ? $args['modified_label'] . ' ' : '';

          $time_string = sprintf(
                  $time_string,
                  esc_attr( get_the_date( DATE_W3C ) ),
                  '',
                  esc_html( get_the_date( $args['date_format'] ) ),
                  esc_attr( get_the_modified_date( DATE_W3C ) ),
                  '',
                  esc_html( $args['modified_label'] ) . esc_html( get_the_modified_date( $args['date_format'] ) )
          );

          echo wp_kses(
                  sprintf(
                          '%1$s%2$s%3$s',
                          $args['before'],
                          $time_string,
                          $args['after'],
                  ),
                  ds8_get_allowed_html_tags()
          );
        ?>
    </div>
    <div data-test="row" class="row leyes">
    <!--<div class="si-container">-->
    <?php
    if ( have_posts() ) :
            while ( have_posts() ) :
                    the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'sinatra-article' ); ?>>

                    <div class="td-post-header">
                        <header class="td-post-title">
                        <h1 class="entry-title"></h1>

                        </header>
                    </div>

                      <?php
                          echo render_image();
                      ?>

                      <?php
                          the_content();
                      ?>

                    </article><!-- #post-<?php the_ID(); ?> -->

            <?php

            endwhile;
            else :
                    get_template_part( 'template-parts/content/content', 'none' );
    endif;

    include_once('template-parts/entry-prev-next-post.php' );
    ?>
                    
    </div>
    
</div><!-- END .si-container -->
</section>

<?php
get_footer();
