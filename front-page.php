<?php
/**
 * Template Name: Home Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fuehrungswerk
 */

get_header(); ?>

<?php get_sidebar('intro'); ?>
<?php get_sidebar('services'); ?>
<?php get_template_part( 'template-parts/testimonials' ); ?>
<?php get_footer(); ?>
