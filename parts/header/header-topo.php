<div class="container ifs-topo-menu">

    <div class="row">

        <div class="ifs-sociais-enova col-xs-4 col-sm-6">
            

                <p class="ifs-compartilhar ft-gray ft-w-sb hidden-xs"><?php _e('Compartilhe:', 'enova-foods'); ?></p>

                <a onclick="window.open(this.href, 'mywin','left=100,top=100,width=490,height=505,toolbar=0,resizable=0'); return false;" href="http://www.facebook.com/sharer/sharer.php?u=http://www.enovafoods.com.br&title=ENOVAFOODS" class="m-r-10">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon-facebook.png" alt="" style="width:9px">
                </a>

                <a onclick="window.open(this.href, 'mywin','left=100,top=100,width=490,height=505,toolbar=none,resizable=0'); return false;" href="http://twitter.com/intent/tweet?status=Produtos de alta qualidade que conquistam e fidelizam os consumidores. Acesse: www.enovafoods.com.br" class="m-r-10">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon-twitter.png" alt="" style="width:17px">
                </a>

                <a onclick="window.open(this.href, 'mywin','left=100,top=100,width=490,height=505,toolbar=0,resizable=0'); return false;" href="https://plus.google.com/share?url=http://www.enovafoods.com.br" class="m-r-10">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon-g.png" alt="" style="width:22px">
                </a>

            
            
        </div>

        <div class="col-xs-8 col-sm-6 ifs-lang-bol">
            <p class="ifs-boleto ft-gray ft-w-sb ft-red"><a href="http://www.portaldeboletos.com.br/enova?ctr=acessoSacado" target="_blank" ><?php _e('Portal de Boletos', 'enova-foods'); ?></a></p>
            <?php //print flag 
                $translations = pll_the_languages( array( 'raw' => 1 ) );
                foreach ($translations as $value) {
                    if($value["current_lang"]){
                        echo '<img src="' . $value["flag"]  . '" alt="Lang" id="flag-top" />'; 
                    }
                }
            ?>
            
            
            <div class="lang-top">

                <label class="meuSelectsContatosAfter">
                        
                <?php 
                // imprime as bandeiras
                if(function_exists('pll_the_languages') )
                        pll_the_languages(array('dropdown'=> 1)); 
                    ?> 

            </div>

            
        </div>

    </div><!-- fim row -->
</div><!-- fim container -->