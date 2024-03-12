// Create 301 redirects
// This will redirect old pages to new

function custom_redirect() {
    $requested_url = $_SERVER['REQUEST_URI'];

    // Check if the requested URL is "/clients/"
    if ($requested_url == '/clients/') {
        // Redirect to the new URL with a 301 status code
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: https://www.choctawwebsites.com/current-clients/");
        exit();
    }

    // Check if the requested URL is "/work/"
    if ($requested_url == '/work/') {
        // Redirect to the new URL with a 301 status code
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: https://www.choctawwebsites.com/current-clients/");
        exit();
    }
}

// Hook the custom_redirect function to the template_redirect action
add_action('template_redirect', 'custom_redirect');
