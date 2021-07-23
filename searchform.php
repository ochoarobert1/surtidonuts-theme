<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="search" id="s" name="s" value="" class="form-control" placeholder="<?php _e('Buscar por Términos:','surtidonuts'); ?>" aria-label="<?php _e('Buscar por Términos:','surtidonuts'); ?>" aria-describedby="searchsubmit">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
