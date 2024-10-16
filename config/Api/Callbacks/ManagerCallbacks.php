<?php

/**
 *   @package Plugin_Development
 */
namespace Config\Api\Callbacks;

use Config\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        return (isset($input) ? true : false);
    }

    public function adminSectionManager()
    {
        echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
    }

    public function checkboxField($args)
    {
        // Ensure $args is an array before accessing its elements
        if (!is_array($args)) {
            return;  // Exit early if $args is not an array
        }

        // Extract necessary variables from $args array
        $name = isset($args['label_for']) ? $args['label_for'] : '';
        $classes = isset($args['class']) ? $args['class'] : '';
        $checkbox = get_option($name);

        echo '<input type="checkbox" name="' . $name . '" value="1" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . '>';
    }
}
