<?php

/**
 * @package Plugin_Development
 */

namespace Config\Base;
class Deactivate
{
  public static function deactivate()
  {
    flush_rewrite_rules();
  }
}
