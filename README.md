# WP Dynamic CSS Enqueue

Automatically enqueues all CSS files in the `/css/` folder of your WordPress theme, with cache-busting using file modification times. Easy to drop into any theme and extend with additional CSS files.

## Features
- Automatically loads all CSS in `/css/`
- Main stylesheet included with cache-busting
- Unique handle for each file
- Simple integration with any theme

## Installation
1. Copy `dynamic-enqueue.php` to your theme folder.
2. Include in `functions.php`:
```php
require_once get_template_directory() . '/dynamic-enqueue.php';
