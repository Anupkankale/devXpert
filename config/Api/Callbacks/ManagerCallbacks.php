<?php

/**
 *   @package Plugin_Development
 */

namespace Config\Api\Callbacks;
use Config\Base\BaseController;

class ManagerCallbacks extends BaseController
 {
    public function checkboxSanitize( $input )
    {
      // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
      return ( isset($input) ? true : false );
    }
  
    public function adminSectionManager()
    {
      echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
    }
  
    public function checkboxField($args)
{
    // Ensure $args is an array before using it
    if (!is_array($args)) {
        error_log('Expected array, got: ' . gettype($args)); // Log the error for debugging
        return; // Exit the function early to avoid further errors
    }

    // Proceed with the array safely
    $name = esc_attr($args['label_for']);  // Escaping to prevent XSS
    $classes = esc_attr($args['class']);   // Escaping to prevent XSS
    $checkbox = get_option($name);

    // Output the checkbox input safely
    echo '<input type="checkbox" name="' . $name . '" value="1" class="' . $classes . '"' . ($checkbox ? ' checked' : '') . '>';
}
  }