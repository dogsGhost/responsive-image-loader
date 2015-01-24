<?php

// imagecopyresampled(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h);

// Set breakpoints.
$bp1 = 480;
$bp2 = 768;

// Store our image dimensions.
$imgSizes = array(
    'small' => array(
        'width' => 500,
        'height' => 375
    ),
    'medium' => array(
        'width' => 800,
        'height' => 600
    )
);

// Store data from our request.
$data = array(
    'src' => $_POST['src'],
    'width' => $_POST['width'],
    'alt' => $_POST['alt'],
    'parent' => $_POST['parent']
);

// Creates the str
function combineDims ($arr, $d) {
  // Create string using image dimensions.
  $dims = '-' . $arr['width'] . 'x' . $arr['height'];

  // Find out the file extension.
  $ext = explode('.', $d['src']);
  $ext = end($ext);

  // Change image source to reference the correct image size we want.
  $search = array('.jpg', '.jpeg', '.gif', '.png');
  $replace = $dims . '.' . $ext;
  $src = str_replace($search, $replace, $d['src']);

  return $src;
}

if ($data['width'] < $bp1) {
    echo "<img src='" . combineDims($imgSizes['small'], $data) . "' alt='" . $data['alt'] . "'>";

} elseif ($data['width'] < $bp2 || $data['parent'] === 'p') {
    // If element is narrower than $bp2 or if the parent element is a paragraph.
    // This prevents the large image from loading inside a paragraph.
    echo "<img src='" . combineDims($imgSizes['medium'], $data). "' alt='" . $data['alt'] . "'>";

} else {
    // Fallback to original image.
    echo "<img src='" . $data['src'] . "' alt='" . $data['alt'] . "'>";
}