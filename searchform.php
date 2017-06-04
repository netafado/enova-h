<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="txt" 
        placeholder="<?php esc_html_e( 'Digite a palavra chave aqui...', 'enova-foods'); ?>" style="height: 30px; line-height: 30px; border: 0;width: 100%;"  
        style="height: 30px; line-height: 30px; border: 0;width: 100%;" />       
    </div>
</form>


