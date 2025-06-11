<?php
function getBreadcrumbs()
{
    $CI = &get_instance();
    $CI->load->config('segments');
    $segment_names = $CI->config->item('segment_names');
    $base_url = base_url();
    $current_url = current_url();
    $relative_url = str_replace($base_url, '', $current_url);
    $segments = array_filter(explode('/', $relative_url));
    $breadcrumbs = [];
    $path = '';
    $total_segments = count($segments);
    $i = 0;
    // Add Home link
    $breadcrumbs[] = '<li class="breadcrumb-item">
    <a href="' . $base_url . '" aria-label="Home">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" style="vertical-align: middle;">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
    </a>
</li>';
    foreach ($segments as $segment) {
        $i++;
        $path .= $segment . '/';
        $display = isset($segment_names[$segment]) ? $segment_names[$segment] : ucwords(str_replace('-', ' ', $segment));
        if ($i == $total_segments) {
            $breadcrumbs[] = '<li class="breadcrumb-item active" aria-current="page">' . $display . '</li>';
        } else {
            $breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . base_url($path) . '">' . $display . '</a></li>';
        }
    }
    return implode("\n", $breadcrumbs); // Return only the list items
}
function testPrint($x)
{
    echo "<pre>";
    var_dump($x);
    echo "</pre>";
}
function getSessionVariables($x, $y, $z)
{
    $result = [];
    if (isset($_SESSION[$x])) {
        $result[$x] = $_SESSION[$x];
    } else {
        $result[$x] = null;
    }
    if (isset($_SESSION[$y])) {
        $result[$y] = $_SESSION[$y];
    } else {
        $result[$y] = null;
    }
    if (isset($_SESSION[$z])) {
        $result[$z] = $_SESSION[$z];
    } else {
        $result[$z] = null;
    }
    return json_decode(json_encode($result), FALSE);
}
