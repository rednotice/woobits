<?php
/**
 * Search form.
 *
 * @package woobits
 */
?>

<form id="searchform" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input type="text" class="search-field form-control" name="s" value="<?php the_search_query(); ?>" placeholder="Search" aria-label="Search field" aria-describedby="search-button">
        <div class="input-group-append">
            <button class="btn btn-light" type="submit" id="search-button">
                <span class="dashicons dashicons-search"></span>
            </button>
        </div>
    </div>
</form>