<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['db_invalid_connection_str'] = 'Kan de database-instellingen niet bepalen op basis van de verbindingsreeks die u hebt verzonden.';
$lang['db_unable_to_connect'] = 'Kan geen verbinding maken met uw databaseserver met behulp van de opgegeven instellingen.';
$lang['db_unable_to_select'] = 'Kan de gespecificeerde database niet selecteren: %s';
$lang['db_unable_to_create'] = 'Kan de opgegeven database niet maken: %s';
$lang['db_invalid_query'] = 'De opgevraagde query is niet geldig.';
$lang['db_must_set_table'] = 'U moet de databasetabel instellen die bij uw query moet worden gebruikt.';
$lang['db_must_use_set'] = 'U moet de "set" -methode gebruiken om een item bij te werken.';
$lang['db_must_use_index'] = 'U moet de "set" -methode gebruiken om een item bij te werken.';
$lang['db_batch_missing_index'] = 'Een of meer rijen die zijn ingediend voor batchupdates missen de opgegeven index.';
$lang['db_must_use_where'] = 'Updates zijn niet toegestaan tenzij ze een "where" -clause bevatten.';
$lang['db_del_must_use_where'] = 'Verwijderingen zijn niet toegestaan tenzij ze een "where" of "like" -clause bevatten.';
$lang['db_field_param_missing'] = 'Voor het ophalen van velden is de naam van de tabel als parameter vereist.';
$lang['db_unsupported_function'] = 'Deze functie is niet beschikbaar voor de database die u gebruikt.';
$lang['db_transaction_failure'] = 'Transactiestoring: Rollback uitgevoerd.';
$lang['db_unable_to_drop'] = 'Kan de opgegeven database niet verwijderen.';
$lang['db_unsupported_feature'] = 'Niet-ondersteunde functie van het databaseplatform dat u gebruikt.';
$lang['db_unsupported_compression'] = 'De bestandscompressie-indeling die u kiest, wordt niet ondersteund door uw server.';
$lang['db_filepath_error'] = 'Kan geen gegevens schrijven naar het bestandspad dat u hebt verzonden.';
$lang['db_invalid_cache_path'] = 'Het cachepad dat u hebt opgegeven, is niet geldig of schrijfbaar.';
$lang['db_table_name_required'] = 'Voor die bewerking is een tabelnaam vereist.';
$lang['db_column_name_required'] = 'Voor die bewerking is een kolomnaam vereist.';
$lang['db_column_definition_required'] = 'Voor die bewerking is een kolomdefinitie vereist.';
$lang['db_unable_to_set_charset'] = 'Kan tekenset voor clientverbinding niet instellen: %s';
$lang['db_error_heading'] = 'Er is een databasefout opgetreden';