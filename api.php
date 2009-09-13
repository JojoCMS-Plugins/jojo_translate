<?php
/**
 *
 * Copyright 2007 Michael Cochrane <code@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

$_options[] = array(
    'id'          => 'translate_filter',
    'category'    => 'Translate',
    'label'       => 'Filter for translatable terms in',
    'description' => 'The plugin can check for the filter text in templates or body content, or run twice to check both. (force refresh to update the api.txt after changing this option)',
    'type'        => 'radio',
    'default'     => 'template',
    'options'     => 'content,template,both',
    'plugin'      => 'jojo_translate'
);


$translate_filter = Jojo::getOption('translate_filter');
/* Translate filter */
if (!$translate_filter || $translate_filter=='content' || $translate_filter=='both') Jojo::addFilter('content', 'translate', 'jojo_translate');
if (!$translate_filter || $translate_filter=='template' || $translate_filter=='both') Jojo::addFilter('output', 'translate', 'jojo_translate');



