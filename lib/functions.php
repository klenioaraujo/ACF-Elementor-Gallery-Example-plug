<?php

function subfieldacfposicao($acfitem){

global $xfield; 
$xfield = $acfitem;
}

add_action( 'init', 'subfieldacfposicao' );

add_shortcode( 'view-portees', 'ovm_view_portees' );

function ovm_view_portees() {

    $loop = new WP_Query(array(
            'post_type' => 'portees',
            'posts_per_page' => -1,
            'post_status' => array('publish'),
            'meta_query' => array(
              'relation'  => 'AND',      
                    array(
                            'key'       => 'status_de_la_portee',
                            'value'     => '36',
                            'compare'   => 'IN',
                        ),
          )
        ));
    ///Loop dos posts
    while ( $loop->have_posts() ) : $loop->the_post();
    $id = get_the_ID();
    //Esquema Principal pai e mae
    echo do_shortcode('[elementor-template id="3636"]');
    echo do_shortcode('[elementor-template id="3602"]');

    $qtdpost = get_post_meta( $id, 'chiots', true ); 
    $xfield = 0;
    //Inicia Galeria  de Filhores  
        while($xfield < $qtdpost) {
        subfieldacfposicao($xfield); 
        $photogaleriaatt = get_post_meta( $id, 'chiots_'.$xfield.'_galerie_chiots', true );
        $commentaire =  get_post_meta( $id, 'chiots_'.$xfield.'_commentaire', true );
        $nom_du_chiot =  get_post_meta( $id, 'chiots_'.$xfield.'_nom_du_chiot', true );
        $genre_du_chiot =  get_post_meta( $id, 'chiots_'.$xfield.'_genre_du_chiot', true );
        $disponibilite =  get_post_meta( $id, 'chiots_'.$xfield.'_disponibilite_du_chiot', true );

        echo '<h3>'.$nom_du_chiot.'</h3>';
        echo do_shortcode('[elementor-template id="3561"]');
        echo $genre_du_chiot.'       '.$disponibilite.'<br>';
        echo '<strong>Commentaire : </strong>'.$commentaire.'<br>';
                    
        $images = $photogaleriaatt;
        if( $images ):
            $photosgalery = array();
            foreach( $images as $idimage ): 
            $photosgalery[] = $idimage;
            endforeach; 
            endif;
        $xfield++;
    } 
    endwhile;  
  }

function photos_chiots() {
       
        global $xfield;
        $postId  = get_the_ID();    
        $fieldACF = '_Photo Galerie do Chiot';
        $postId = get_the_ID();
        $qtdpost = get_post_meta( $postId, 'chiots', true );            
        $images = get_post_meta( $postId, 'chiots_'.$xfield.$fieldACF, true ); 
        if( $images ):
            $photosgalery1 = array();
            foreach( $images as $idimage ): 
            $photosgalery1[] = array( 'id' => $idimage );
            endforeach; 
            endif;

        return $photosgalery1;
}


function name_chien() {

        $postId = get_the_ID();
        $nomechien = get_post_meta( $postId, 'nom_du_chien', true ); 
        return $nomechien;                    
}

