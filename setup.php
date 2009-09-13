<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007-2008 Harvey Kane <code@ragepank.com>
 * Copyright 2007-2008 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <mikec@jojocms.org>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */


/* Edit Translations */
$data = JOJO::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/translate'");
if (count($data) == 0) {
    echo "jojo_translate: Adding <b>Translations</b> Page to menu<br />";
    JOJO::insertQuery("INSERT INTO {page} SET pg_title='Translations', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/translate', pg_parent=". JOJO::clean($_ADMIN_CUSTOMIZE_ID).", pg_order=3");
}
