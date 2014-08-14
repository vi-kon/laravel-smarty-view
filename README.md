# Laravel 4 Smarty view

Smarty template engine for Laravel 4

## Table of content

* [Known issues](#known-issues)
* [TODO](#todo)
* [Features](#features)
* [Installation](#installation)
* [Usage](#usage)
* [Config files](#config-files)
* [Custom plugins](#custom-plugins)
    * [auth_check](#auth-check)
    * [auth_user](#auth-user)
    * [config](#config)
    * [datatable](#datatable)
    * [datatable_column](#datatable-column)
    * [form](#form)
    * [form_checkbox](#form-checkbox)
    * [form_file](#form-file)
    * [form_hidden](#form-hidden)
    * [form_label](#form-label)
    * [form_password](#form-password)
    * [form_radio](#form-radio)
    * [form_select](#form-select)
    * [form_submit](#form-submit)
    * [form_text](#form-text)
    * [form_textarea](#form-textarea)
    * [html_script](#html-script)
    * [lang](#lang)
    * [url](#url)
    * [url_current](#url-current)
    * [url_full](#url-full)
* [License](#license)

## Known issues

* none

---
[Back to top](#laravel-4-smarty-view)

## TODO

* Fix incoming bugs
* Finish documentation

---
[Back to top](#laravel-4-smarty-view)

## Features

* using smarty templates
* using multiple template engines

---
[Back to top](#laravel-4-smarty-view)

## Installation

To your `composer.json` file add following lines:

```javascript
// to your "require" object
"vi-kon/laravel-smarty-view": "1.*"
```

In your Laravel 4 project add following lines to `app.php`:

```php
// to your providers array
'ViKon\Auth\AuthServiceProvider',
```

---
[Back to top](#laravel-4-smarty-view)

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

---
[Back to top](#laravel-4-smarty-view)

## Config file

On custom config easily publish it with `php artisan config:publish vi-kon/laravel-smarty-view` command. The command will create new file `app/config/packages/vi-kon/laravel-smarty-view/config.php`. The file need to move to `app/config/packages/vi-kon/smarty-view/config.php` location.

`config.php` content:

```php
return array(
    // Enable or disable caching
    'caching'         => false,
    // Enable or disable debugging
    'debugging'       => false,
    // Set cache lifetime
    'cache_lifetime'  => 3600,
    // Check compile
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

---
[Back to top](#laravel-4-smarty-view)

## Custom plugins

* [auth_check](#auth-check)
* [auth_user](#auth-user)
* [config](#config)
* [datatable](#datatable)
* [datatable_column](#datatable-column)
* [form](#form)
* [form_checkbox](#form-checkbox)
* [form_file](#form-file)
* [form_hidden](#form-hidden)
* [form_label](#form-label)
* [form_password](#form-password)
* [form_radio](#form-radio)
* [form_select](#form-select)
* [form_submit](#form-submit)
* [form_text](#form-text)
* [form_textarea](#form-textarea)
* [html_script](#html-script)
* [lang](#lang)
* [url](#url)
* [url_current](#url-current)
* [url_full](#url-full)

### Auth check

The **auth_check** tag is alias for:

```php
return Auth::check();
```

---
[Back to top](#laravel-4-smarty-view)

Return value is type of `boolean`.

### Auth user

The **auth_user** tag is alias for (if no `assign` attribute provided):

```php
return Auth::getUser();
```

Return value is type of `UserInterface` or `null`.

#### Attributes

| Type   | Name      | Description                                       | Required | Default |
| ------ | --------- | ------------------------------------------------- |:--------:| ------- |
| string | `assign`  | Assign user data to named variable instead return | -        | -       |


---
[Back to top](#laravel-4-smarty-view)

### Config

The **config** tag is alias for:

```php
return Config::get($key, $default);
```

Return value is type of `mixed`.

#### Attributes

| Type   | Name      | Description                            | Required | Default |
| ------ | --------- | -------------------------------------- |:--------:| ------- |
| string | `key`     | Config variable key                    | x        | -       |
| mixed  | `default` | Default value if config key not exists | -        | -       |

#### Usage

```smarty
{config key="app.locale"}
```

---
[Back to top](#laravel-4-smarty-view)


### Datatable

The **datatable** block tag is for [chumper/datatable](https://github.com/Chumper/Datatable) Laravel 4 package to make datatables.

Plugin can load localization (language) data from `lang\{local}\datatable.php`. If language file not exists datatables default localization data will be used.

#### Attributes

| Type    | Name           | Description                            | Required | Default       |
| ------- | -------------- | -------------------------------------- |:--------:| ------------- |
| string  | `url`          | Full URL for AJAX data                 | -        | -             |
| string  | `action`       | Route name for AJAX data               | -        | -             |
| boolean | `searching`    | Enable or disable searching            | -        | `true`        |
| boolean | `lengthChange` |                                        | -        | -             |
| string  | `class`        | Add custom class to datatable          | -        | -             |
| string  | `view`         | Custom view to render datatable        | -        | `"datatable"` |

#### Usage

```smarty
{datatable action="route name" class="table-own" searching=false lengthChange=false}

...

{/datatable}
```

Sample **datatable.php** language file:
```php
return array(
    'sEmptyTable'     => 'No data available in table',
    'sInfo'           => 'Showing _START_ to _END_ of _TOTAL_ entries',
    'sInfoEmpty'      => 'Showing 0 to 0 of 0 entries',
    'sInfoFiltered'   => '(filtered from _MAX_ total entries)',
    'sInfoPostFix'    => '',
    'sInfoThousands'  => ',',
    'sLengthMenu'     => 'Show _MENU_ entries',
    'sLoadingRecords' => 'Loading...',
    'sProcessing'     => 'Processing...',
    'sSearch'         => 'Search:',
    'sZeroRecords'    => 'No matching records found',
    'oPaginate'       => array(
        'sFirst'    => 'First',
        'sLast'     => 'Last',
        'sNext'     => 'Next',
        'sPrevious' => 'Previous',
    ),
    'oAria'           => array(
        'sSortAscending'  => '=> activate to sort column ascending',
        'sSortDescending' => '=> activate to sort column descending',
    ),
);
```

---
[Back to top](#laravel-4-smarty-view)

### Datatable column

Add column to Datatable. Have to declared in `{datatable}` block, otherwise it won't work.

#### Attributes

| Type    | Name        | Description                               | Required | Default  |
| ------- | ----------- | ----------------------------------------- |:--------:| -------- |
| string  | `label`     | Column label                              | x        | -        |
| string  | `token`     | Column label token for translator         | x        | -        |
| boolean | `sortable`  | Enable or disable column sorting          | -        | `true`   |
| boolean | `orderable` | Enable or disable column sorting (alias)  | -        | `true`   |
| string  | `width`     | Column width                              | -        | `"auto"` |
| string  | `class`     | Column class (individual `td` classes)    | -        | -        |
| string  | `type`      | Column type (html, string, numeric, date) | -        | `"html"` |

Only either of `label` or `token` is required.

#### Usage

```smarty
{datatable_column token="language/file.and.token" width="120px" sortable=false}
```

---
[Back to top](#laravel-4-smarty-view)

### Form

The **form** block tag opens and closes form:

```php
return Form::open($params)
       . $content
       . Form::close()
```

Return value is type of `string`, with generated HTML form.

#### Attributes

All parameters passed to `Form::open` method as HTML attributes.

#### Usage

```smarty
{form action="route name" class="form-horizontal" role="form"}

...

{/form}
```

HTML output:

```html
<form action="generated route from name" method="POST" accept-charset="UTF-8" class="form-horizontal" role="form">
    ...
</form>
```

---
[Back to top](#laravel-4-smarty-view)

### Form checkbox

The `form_checkbox` is alias for `Form::checkbox`.

Return value is type of `string`, with generated HTML checkbox input field.

#### Attributes

| Type    | Name        | Description                                       | Required | Default |
| ------- | ----------- | ------------------------------------------------- |:--------:| ------- |
| string  | `_name`     | HTML `name` attribute                             | x        | -       |
| mixed   | `_value`    | checkbox `value` attribute                        | -        | `null`  |
| boolean | `_checked`  | if `true` checkbox will be checked, otherwise not | -        | `false` |
| boolean | `_populate` | if `true` old input data will be used             | -        | `false` |

#### Usage

```smarty
{form_checkbox _name="field-checkbox" _checked=true class="checkbox"}
```

---
[Back to top](#laravel-4-smarty-view)

### Form file

The `form_file` is alias for `Form::file`.

Return value is type of `string`, with generated HTML file input field.

#### Attributes

| Type    | Name        | Description                                       | Required | Default |
| ------- | ----------- | ------------------------------------------------- |:--------:| ------- |
| string  | `_name`     | HTML `name` attribute                             | x        | -       |

#### Usage

```smarty
{form_file _name="field-file"}
```

---
[Back to top](#laravel-4-smarty-view)

### Form hidden

The `form_hidden` is alias for `Form::hidden`.

Return value is type of `string`, with generated HTML hidden input field.

#### Attributes

| Type    | Name        | Description                                       | Required | Default |
| ------- | ----------- | ------------------------------------------------- |:--------:| ------- |
| string  | `_name`     | HTML `name` attribute                             | x        | -       |
| mixed   | `_value`    | hidden field `value` attribute                    | -        | `null`  |
| boolean | `_populate` | if `true` old input data will be used             | -        | `false` |

#### Usage

```smarty
{form_hidden _name="field-hidden" value="hidden-value"}
```

### Form password

The `form_password` is alias for `Form::password`.

Return value is type of `string`, with generated HTML password input field.

#### Attributes

| Type    | Name        | Description                                       | Required | Default |
| ------- | ----------- | ------------------------------------------------- |:--------:| ------- |
| string  | `_name`     | HTML `name` attribute                             | x        | -       |

#### Usage

```smarty
{form_password _name="field-password"}
```

---
[Back to top](#laravel-4-smarty-view)

### Form radio

The `form_radio` is alias for `Form::radio`.

Return value is type of `string`, with generated HTML radio input field.

#### Attributes

| Type    | Name        | Description                                       | Required | Default |
| ------- | ----------- | ------------------------------------------------- |:--------:| ------- |
| string  | `_name`     | HTML `name` attribute                             | x        | -       |
| mixed   | `_value`    | radio `value` attribute                           | -        | `null`  |
| boolean | `_checked`  | if `true` radio will be checked, otherwise not    | -        | `false` |
| boolean | `_populate` | if `true` old input data will be used             | -        | `false` |

#### Usage

```smarty
{form_radio _name="field-radio" _checked=true class="radio"}
```

---
[Back to top](#laravel-4-smarty-view)

### Form select

The `form_select` is alias for `Form::select` or `Form::selectRange`.

Return value is type of `string`, with generated HTML select field.

#### Attributes

| Type     | Name        | Description                                       | Required         | Default   |
| -------- | ----------- | ------------------------------------------------- |:----------------:| --------- |
| string   | `_name`     | HTML `name` attribute                             | x                | -         |
| string   | `_default`  | radio `value` attribute                           | -                | `null`    |
| string[] | `_list`     | select items as associative array                 | -                | `array()` |
| mixed    | `_selected` | selected index value                              | -                | `array()` |
| boolean  | `_range`    | if `true` radio will be generated as select range | -                | `false`   |
| string   | `_begin`    | range start value                                 | if range is true | `""`      |
| string   | `_end`      | range end value                                   | if range is true | `""`      |
| boolean  | `_populate` | if `true` old input data will be used             | -                | `false`   |

#### Usage

```smarty
{form_select _name="field-checkbox" _list=$data}
```
```smarty
{form_select _name="field-checkbox" _range=true _begin=5 _end=100 class="checkbox"}
```

---
[Back to top](#laravel-4-smarty-view)

### Form text

The `form_text` is alias for `Form::text`.

Return value is type of `string`, with generated HTML text field.

#### Attributes

| Type     | Name        | Description                                       | Required         | Default   |
| -------- | ----------- | ------------------------------------------------- |:----------------:| --------- |
| string   | `_name`     | HTML `name` attribute                             | x                | -         |
| string   | `_value`    | text `value` attribute                            | -                | `null`    |
| boolean  | `_populate` | if `true` old input data will be used             | -                | `false`   |

#### Usage

```smarty
{form_text _name="field-text" class="text"}
```

---
[Back to top](#laravel-4-smarty-view)

### Form textarea

The `form_text` is alias for `Form::textarea`.

Return value is type of `string`, with generated HTML textarea field.

#### Attributes

| Type     | Name        | Description                                       | Required         | Default   |
| -------- | ----------- | ------------------------------------------------- |:----------------:| --------- |
| string   | `_name`     | HTML `name` attribute                             | x                | -         |
| string   | `_value`    | textarea `value` attribute                        | -                | `null`    |
| boolean  | `_populate` | if `true` old input data will be used             | -                | `false`   |

#### Usage

```smarty
{form_textarea _name="field-textarea" class="textarea"}
```

---
[Back to top](#laravel-4-smarty-view)

## License

This package is licensed under the MIT License

---
[Back to top](#laravel-4-smarty-view)