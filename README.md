# Laravel 4 Smarty view

Smarty template engine for Laravel 4

## Known issues

* none

## TODO

* Fix incomming bugs
* Finish documentation

## Features

* using smarty templates
* using multiple template engines

## Installation

To your `composer.json` file add following lines:

```javascript
// to your "repositories" array
{
    "type": "vcs",
    "url" : "git@github.com:vi-kon/laravel-smary-view.git"
}

// to your "require" object
"vi-kon/laravel-smarty-view": "1.*"
```

In your Laravel 4 project add following lines to app.php:

```php
// to your providers array
'ViKon\Auth\AuthServiceProvider',
```

## Usage

Simply create new template file with `.tpl` extension and load with `View` class.

```php
\View::make('route/to/template/file')
     ->with("param", null);
```

On extending or loading another smarty template need path prefix with `view:path`.

```smarty
{extends file="view:layout-site"}
...
```

## Custom plugins

* config
* datatable
* datatable_column
* form
* form_checkbox
* form_file
* form_hidden
* form_label
* form_password
* form_radio
* form_select
* form_submit
* form_text
* form_textarea
* html_script
* html_style
* lang
* url
* url_current
* url_full

### Config

Config tag is alias to:
```php
return Config::get(key, default);
```

Return value is `mixed`.

#### Attributes

| Type   | Name      | Description                            | Required |
| ------ | --------- | -------------------------------------- |:--------:|
| string | `key`     | Config variable key                    | x        |
| mixed  | `default` | Default value if config key not exists | -        |

### Usage

```smarty
{config key="app.locale"}
```


## Datatable

Datatable block tag is for [chumper/datatable](https://github.com/Chumper/Datatable) Laravel 4 package to make datatables.

#### Attributes

| Type    | Name           | Description                            | Required |
| ------- | -------------- | -------------------------------------- |:--------:|
| string  | `url`          | Full URL for AJAX data                 | -        |
| string  | `action`       | Route name for AJAX data               | -        |
| boolean | `searching`    | Enable or disable searching            | -        |
| boolean | `lengthChange` |                                        | -        |
| string  | `class`        | Add custom class to datatable          | -        |
| string  | `view`         | Custom view to render datatable        | -        |

### Usage

```smarty
{datatable action="action URL" class="table-own" searching=false lengthChange=false}

...

{/datatable}
```
