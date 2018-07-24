# Transliterate
Небольшой пакет для транслитерации кирилицы

Умеет:
* строку в url ```['type' => 'url']```
* строку в имя файла ```['type' => 'filename']```
* строку в нижний регистр ```['transformate_text' => 'lowercase']```
* строку в верхний регистр ```['transformate_text' => 'uppercase']```
* строку в нижний регистр, первая буква каждого слова в верхний регистр ```['transformate_text' => 'ucfirst']```

### Установка:
```
composer require alexeydg/transliterate
```

```php
//config/app.php

'providers' => [
  //...
  alexeydg\Transliterate\TransliterationServiceProvider::class,
],

'aliases' => [
  //...
  'Transliterate' => alexeydg\Transliterate\TransliterationFacade::class,
],
```

### Использование:
```php
use Transliterate;
...

$string = '\'"#^_^ Если б мишки были пчёлами, то они бы нипочем, никогда и не подумали так высо́ко строить дом.';

$string = Transliterate::make($string);
// Esli b mishki bili pchyolami to oni bi nipochem nikogda i ne podumali tak visoko stroit dom

$string = Transliterate::make($string, ['type' => 'url', 'lowercase' => true]);
// esli-b-mishki-bili-pchyolami-to-oni-bi-nipochem-nikogda-i-ne-podumali-tak-visoko-stroit-dom

$string = Transliterate::make($string, ['type' => 'filename', 'lowercase' => true]);
// esli_b_mishki_bili_pchyolami_to_oni_bi_nipochem_nikogda_i_ne_podumali_tak_visoko_stroit_dom

$string = Transliterate::make($string, ['type' => 'url', 'lowercase' => true, 'map' => 'gost2000']);
// esli-b-mishki-by'li-pchyolami-to-oni-by'-nipochem-nikogda-i-ne-podumali-tak-vy'soko-stroit`-dom
```

### Доступные параметры:
```php
[
  'type' => 'url',
  // 'url', 'filename' или 'text'. Первым заменяем пробелы на '-', вторым на '_'.
  // По дефолту 'text', который ничего не заменяет.
  
  'transformate_text' => 'lowercase', 
  // Преобразовать строку в нижний регистр.
  // по дефолту без преобразований, доступны преобразования 'lowercase', 'uppercase', 'ucfirst'
  // 'ucfirst' все слова в строке преобразовывает к нижнему регистру, первую букву переводит в верхний регистр
  'map' => 'gost2000', // Транслитерация по ГОСТ 7.79-2000.
]
```

### Дополнительно
```php
// Получить карту транслитерации, используемую по-умолчанию
Transliteration::getOldschoolMap();

// Карта по ГОСТ 2000
Transliteration::getGost2000Map();

//Транслитирация 
Transliteration::getCommonMap();
```
