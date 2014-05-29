# Boilerplate plugin

It does nothing but can be used as a template for a real plugin.

## Installation

1. Download files of the plugin.
2. Create folder "<mibew root>/plugins/Mibew/Mibew/Plugin/Boilerplate" (case does matter).
3. Put files of the plugins to the just created folder.
4. Add the following lines to the end of "<mibew root>/libs/config.php":
```php
$plugins_list[] = array(
    'name' => 'Mibew:Boilerplate',
    'config' => array(
        'very_important_value' => '$3.50',
    ),
);
```
5. Done
