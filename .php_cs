<?php

$finder = PhpCsFixer\Finder::create()
  ->exclude('database/migrations')
  ->exclude('bootstrap/cache')
  ->exclude('storage')
  ->notPath('_ide_helper.php')
  ->notPath('.phpstorm.meta.php')
  ->in(__DIR__)
;

return PhpCsFixer\Config::create()
  ->setUsingCache(false)
  ->setRules([
      '@PSR2' => true,
      //'strict_param' => true,
      'array_syntax' => ['syntax' => 'short'],
  ])
  ->setFinder($finder);
