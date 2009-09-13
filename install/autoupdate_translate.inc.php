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
 * did not receive this file, see http:/* www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http:/* www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http:/* www.jojocms.org JojoCMS
 */


if (!defined('_MULTILANGUAGE')) {
    define('_MULTILANGUAGE', Jojo::getOption('multilanguage', 'no') == 'yes');
}


$table = 'translate';
$o = 1;

$default_td[$table]['td_displayfield']  = 'tr_default';
$default_td[$table]['td_orderbyfields'] = 'tr_default';
$default_td[$table]['td_parentfield']   = '';
$default_td[$table]['td_topsubmit']     = 'yes';
$default_td[$table]['td_filter']        = 'yes';
$default_td[$table]['td_deleteoption']  = 'yes';
$default_td[$table]['td_menutype']      = 'list';

/* ID */
$field = 'translateid';
$default_fd[$table][$field]['fd_order']     = $o++;
$default_fd[$table][$field]['fd_type']      = 'readonly';
$default_fd[$table][$field]['fd_help']      = 'A unique ID, automatically assigned by the system';
$default_fd[$table][$field]['fd_mode']      = 'advanced';


/* Default */
$field = 'tr_default';
$default_fd[$table][$field]['fd_order']     = $o++;
$default_fd[$table][$field]['fd_type']      = 'hidden';
$default_fd[$table][$field]['fd_mode']      = 'advanced';

$languages = Jojo::selectQuery("SELECT * from {language} WHERE `active` = 'yes'");

foreach ($languages as $l ){    
$field = 'tr_' . $l['languageid'];
$default_fd[$table][$field]['fd_order']     = $o++;
$default_fd[$table][$field]['fd_name'] = $l['english_name'];
$default_fd[$table][$field]['fd_type']      = 'text';
$default_fd[$table][$field]['fd_size']      = 80;
$default_fd[$table][$field]['fd_mode']      = 'advanced';
}      
