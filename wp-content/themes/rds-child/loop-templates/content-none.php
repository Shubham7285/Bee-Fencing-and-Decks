<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined("ABSPATH") || exit(); ?>
<div class="col-lg-12">
    <div class="card rounded-0 p-4 blogs">
		<div class="card-head">
		<h2 class=""><?php esc_html_e(
  	"Nothing Found",
  	"understrap"
  ); ?></h2>
		</div>
		<div class="card-body px-0 py-0">
		<p class="mb-0"><?php esc_html_e(
  	"Sorry, but nothing matched your search terms. Please try again with some different keywords.",
  	"understrap"
  ); ?></p>
		</div>
    </div>
</div>