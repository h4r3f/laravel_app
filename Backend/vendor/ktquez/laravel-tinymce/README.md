##TinyMCE editor for Laravel and Lumen Framework
Powerful WYSIWYG editor with easy installation and already configured to use quickly and simply.

[![Latest Stable Version](https://poser.pugx.org/ktquez/laravel-tinymce/v/stable)](https://packagist.org/packages/ktquez/laravel-tinymce) [![Total Downloads](https://poser.pugx.org/ktquez/laravel-tinymce/downloads)](https://packagist.org/packages/ktquez/laravel-tinymce) [![Latest Unstable Version](https://poser.pugx.org/ktquez/laravel-tinymce/v/unstable)](https://packagist.org/packages/ktquez/laravel-tinymce) [![License](https://poser.pugx.org/ktquez/laravel-tinymce/license)](https://packagist.org/packages/ktquez/laravel-tinymce)

## How to use
Just add the line in his view, well above the ``<textarea id="tinymce">``:<br>
`` @include('tinymce::tpl')  ``

If you want to be available globally, just add the tag ``<head>``

## Instalation
``` composer require ktquez/laravel-tinymce ```

## Laravel
Add in ``config/app.php``: <br>
``` 
'Ktquez\Tinymce\TinymceServiceProvider' 
```

Finally, publish the files: <br>
```
php artisan vendor:publish --force
```

## Lumen
Add in ``bootstrap/app.php``: <br>
```
$app->configure('tinymce');
$app->register('Ktquez\Tinymce\TinymceServiceProvider');
```

As in Lumen can not run the ``vendor:publish``, you must copy the ``config/tinymce.php`` to the base path of your project in the ``config/``

And copy the ``tinymce/`` folder that is within ``assets/js/`` to your folder ``public/`` with the path you want.

## Configuration

In ``config/tinymce.php`` have the settings of your editor: <br>
Set the path of ``tinymce.min.js`` file:
```
'cdn' => config('app.url').'/vendor/js/tinymce/tinymce.min.js',
```

Set customization parameters of TinyMCE:
Set the ``id`` of the textarea
```
'params' => [
		"selector" => "#tinymce",
		...
```

Sets the language editor, available in the package ``de, es, pt_BR and fr_FR``
```
"language" => 'pt_BR',
```

Skin editor, available in the package ``lightgray, charcoal and tundora``
```
"skin" => "lightgray",
```

Add plugins and toolbar, by default:
```
"plugins" => [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contextmenu directionality emoticons template paste textcolor"
	  ],
"toolbar" => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
```

##### To learn more, just access the [TinyMCE](http://www.tinymce.com/wiki.php/TinyMCE) documentation 
TinyMCE : Current Version [4.2.1](http://www.tinymce.com/download/download.php) 











