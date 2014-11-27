# Boilerplate plugin

It does nothing but can be used as a template for a real plugin.

## Installation

1. Download files of the plugin.
2. Create folder "```<Mibew root>```/plugins/Mibew/Mibew/Plugin/Boilerplate" (case does matter).
3. Put files of the plugins to the just created folder.
4. Add plugins configs to "plugins" structure in "```<Mibew root>```/configs/config.yml".
If the "plugins" stucture looks like ```plugins: []``` it will become:
```yaml
plugins:
    "Mibew:Boilerplate":
        very_important_value: "$3.50"
```
5. Navigate to "`<Mibew Base URL>`/operator/plugin" page and enable the plugin.


## License

[Apache License 2.0](http://www.apache.org/licenses/LICENSE-2.0.html)
