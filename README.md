# Demo of PHP Serializers
Demo of some readily available PHP Serializers.

## Why Serializers?
Serializers in PHP provide us with a structured way of replacing array-indexed assignments of values to structured data, with object oriented and separated handlers, akin to DataTransferObjects (DTO's) and DataValueTransformers, as they are commonly known to OOP-familiar developers.

Serializers provide an SOLID-approach solution to ingesting and outputting structured data; Common data-structures, such as Date-values, and/or arrays-of-similar-data-values can be handled by some serializers by default, while specialization demands definitions of task-specific Normalizers.
We will look at some flavors of these serializers, as most appropriate to our work at FFW.com...

## Select serializer flavors
* Drupal 9 Serializers
  * [A good explanation](https://www.drupal.org/docs/8/api/serialization-api/how-the-serializer-works))
  * Small Symfony-like [code snippets demo'ing the Drupal Serializers](https://www.drupal.org/docs/drupal-apis/serialization-api/serialization-api-overview)
* [Symfony 6+ Serializers](https://symfony.com/doc/current/components/serializer.html)
* [A more generic PHP-serializer](https://jmsyst.com/libs/serializer)
* ... And maybe honorable mentions and nods should go to other targetted popular ones, as found integrated into [API-platform](https://api-platform.com/docs/core/serialization/)
