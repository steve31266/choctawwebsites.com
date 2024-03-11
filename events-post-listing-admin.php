// Title: CW, Add ACF Fields to Post Listing
// Add "Location" and "Active Client" columns to the "clients" post type listing within WP Admin
// Removes the "Meta title" and "Meta desc." columns

function custom_clients_columns($columns) {
    // Add ACF field columns
    $columns['location'] = 'Location';
    $columns['active_client'] = 'Active Client';

    return $columns;
}
add_filter('manage_edit-clients_columns', 'custom_clients_columns');

// Display the values of ACF fields in the "clients" post type listing
function custom_clients_custom_column($column, $post_id) {
    switch ($column) {
        case 'location':
            echo get_field('location', $post_id);
            break;

        case 'active_client':
            $active_client = get_field('active_client', $post_id);
            echo $active_client ? 'Yes' : 'No';
            break;

        // Add more cases for additional fields

        default:
            break;
    }
}
add_action('manage_clients_posts_custom_column', 'custom_clients_custom_column', 10, 2);
