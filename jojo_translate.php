<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007 Harvey Kane <code@ragepank.com>
 * Copyright 2007 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

class JOJO_Plugin_Jojo_Translate extends JOJO_Plugin
{
    public static function translate($content)
    {
        preg_match_all("~##(.*)##~U", $content, $matches);
        if ($matches[0]) {
      
            global $page;
            $language = 'tr_' . (!empty($page->page['pg_language']) ? $page->page['pg_language'] : Jojo::getOption('multilanguage-default', 'en')); 
            $default = 'tr_default';
            if (Jojo::tableExists("{translate}") && !Jojo::fieldExists("{translate}", $language )) {
               Jojo::structureQuery("ALTER TABLE {translate} ADD $language TEXT NULL default '';");
            }          
            $translations = Jojo::selectAssoc("SELECT `" . $default . "`, `" . $language . "` FROM {translate}");
        
            foreach($matches[1] as $term) {
                $pattern = '~##' . $term . '##~';
                if (isset($translations[$term]) && $translations[$term]) {
                   /* return the new term without the hashes */
                    $content = preg_replace($pattern, $translations[$term], $content);
                } else {
                    /* return the original term without the hashes */
                    $content = preg_replace($pattern, $term, $content);
    
                    if (!isset($translations[$term])) {
                       /* add the missing term*/
                       Jojo::insertQuery("INSERT INTO {translate} (`" . $default . "`) VALUES (?)", array($term));
                    }
                }            
            }
        }
        return $content;
    }
    
}
