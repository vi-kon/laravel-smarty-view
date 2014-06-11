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

## Config file

Plugin has custom config file:

```php
return array(
    // Enable or disable caching
    'caching'         => false,
    // Enable or disable debugging
    'debugging'       => false,
    // Set cache lifetime
    'cache_lifetime'  => 3600,
    // Check complie
    'compile_check'   => true,
    // Set error reporting level in Smarty templates
    'error_reporting' => null,

    // Template directory
    'template_dir'    => app_path() . '/views',
    // Cache directory
    'cache_dir'       => app_path() . '/storage/views/cache',
    // Compile directory
    'compile_dir'     => app_path() . '/storage/views/compile',

    // Plugins directory
    'plugins_path'    => array(),
);
```

## Custom plugins

* auth_check
* auth_user
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

### Auth check

Auth_check tag is alias for:

```php
return Auth::check();
```

### Auth user

Auth_user tag is alias for:

```php
return Auth::getUser();
```

### Config

Config tag is alias for:

```php
return Config::get($key, $default);
```

Return value is `mixed`.

#### Attributes

| Type   | Name      | Description                            | Required | Default |
| ------ | --------- | -------------------------------------- |:--------:| ------- |
| string | `key`     | Config variable key                    | x        | -       |
| mixed  | `default` | Default value if config key not exists | -        | -       |

### Usage

```smarty
{config key="app.locale"}
```


## Datatable

Datatable block tag is for [chumper/datatable](https://github.com/Chumper/Datatable) Laravel 4 package to make datatables.

#### Attributes

| Type    | Name           | Description                            | Required | Default   |
| ------- | -------------- | -------------------------------------- |:--------:| --------- |
| string  | `url`          | Full URL for AJAX data                 | -        | -         |
| string  | `action`       | Route name for AJAX data               | -        | -         |
| boolean | `searching`    | Enable or disable searching            | -        | true      |
| boolean | `lengthChange` |                                        | -        | -         |
| string  | `class`        | Add custom class to datatable          | -        | -         |
| string  | `view`         | Custom view to render datatable        | -        | datatable |

### Usage

```smarty
{datatable action="route name" class="table-own" searching=false lengthChange=false}

...

{/datatable}
```

## Datatable column

Add column to Datatable. Have to declared in `{datatable}` block, otherwise it won't work.

#### Attributes

| Type    | Name        | Description                               | Required | Default |
| ------- | ----------- | ----------------------------------------- |:--------:| ------- |
| string  | `label`     | Column label                              | x        | -       |
| string  | `token`     | Column label token for translator         | x        | -       |
| boolean | `sortable`  | Enable or disable column sorting          | -        | true    |
| boolean | `orderable` | Enable or disable column sorting (alias)  | -        | true    |
| string  | `width`     | Column width                              | -        | auto    |
| string  | `class`     | Column class (individual `td` classes)    | -        | -       |
| string  | `type`      | Column type (html, string, numeric, date) | -        | html    |

Only either of `label` or `token` is required.

### Usage

```smarty
{datatable_column token="language/file.and.token" width="120px" sortable=false}
```

## License

This package is licensed under the MIT License
