// Name: CW, Query Loop by 'priority' and 'active_client'
// Modifies the native query loop in GenerateBlocks by including only posts where 'active_client' = 1, and sorts ASC by 'priority'
// Used on Clients Page

add_filter( 'generateblocks_query_loop_args', function( $query_args, $attributes ) {

    // apply filter if loop has class: order-by-priority
    if ( ! is_admin() && ! empty( $attributes['className'] ) && strpos( $attributes['className'], 'order-by-priority' ) !== false ) {
       
        $query_args = array_merge( $query_args, array(
            'meta_key' => 'priority',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'active_client',
                    'value' => '1', // Adjusted to '1' for True
                    'compare' => '=',
                    'type' => 'NUMERIC', // Specify the type as numeric
                ),
            ),
        ));
    }

    return $query_args;
}, 10, 2 );
