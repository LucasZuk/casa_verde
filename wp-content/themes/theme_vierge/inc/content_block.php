<?php
if( have_rows('contenu') ):

    $num_block = 0;

    while ( have_rows('contenu') ) : the_row();
        
        ?>
        <section class="blockContent blockContent-<?php echo $num_block; ?>" id="blockContent-<?php echo $num_block; ?>">
            <?php
            requireBlock(get_row_layout(), []);
            ?>
        </section>
        <?php

        $num_block ++;

    endwhile;
endif;