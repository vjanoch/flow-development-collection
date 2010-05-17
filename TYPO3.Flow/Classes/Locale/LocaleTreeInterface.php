<?php
declare(ENCODING = 'utf-8');
namespace F3\FLOW3\Locale;

/* *
 * This script belongs to the FLOW3 framework.                            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * An interface implemented by LocaleTree class
 *
 * @version $Id$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @author Karol Gusak <firstname@lastname.eu>
 */
interface LocaleTreeInterface {

	/**
	 * Adds locale to the tree, inserting it in position which retains sorting.
	 * Locales are sorted in such way that each subtree of root node contains
	 * locales wich are related to themselves, starting with the most generic
	 * locale node on top of subtree (eg "az"). Children of this node are more
	 * specific (eg "az_Cyryl" and "az_Latin"), which in turn can contain even
	 * more specific locales (accordingly "az_Cyryl_AZ" and "az_Latin_AZ").
	 *
	 * @param \F3\FLOW3\Locale\Locale $locale The Locale to be inserted
	 * @return boolean
	 */
	public function addLocale(\F3\FLOW3\Locale\Locale $locale);

	/**
	 * Returns a parent Locale object of the locale provided. The parent is
	 * a locale which is more generic than the one given as parameter. For
	 * example, the parent for locale en_GB will be locale en, of course if
	 * it exists in the locale tree of available locales.
	 *
	 * @param \F3\FLOW3\Locale\Locale $locale The Locale to search parent for
	 * @return mixed Existing \F3\FLOW3\Locale\Locale instance or NULL on failure
	 */
	public function getParentLocaleOf($locale);

	/**
	 * Returns Locale object which represents one of locales installed and which
	 * is most similar to the "template" Locale object given as parameter.
	 *
	 * @param \F3\FLOW3\Locale\Locale $locale The "template" Locale to be matched
	 * @return mixed Existing \F3\FLOW3\Locale\Locale instance on success, FALSE on failure
	 */
	public function findBestMatchingLocale(\F3\FLOW3\Locale\Locale $locale);
}
?>