<?php
/**
 * Search form.
 *
 * @package woobits
 */
?>

<form id="searchform" class="woobits-search-form" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input-group wrapper">
        <input type="text" class="search-field form-control" name="s" value="<?php the_search_query(); ?>" placeholder="Search" aria-label="Search field" aria-describedby="search-button">
        <div class="input-group-append">
            <button class="btn btn-light search-button" type="submit" id="search-button">
                <span class="dashicons dashicons-search"></span>
            </button>
        </div>
    </div>
</form>