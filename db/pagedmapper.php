<?php

/**
 * ownCloud - Music app
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Morris Jobke <hey@morrisjobke.de>
 * @copyright Morris Jobke 2013, 2014
 */

namespace OCA\Music\Db;

use OCP\AppFramework\Db\Mapper;
use OCP\IDb;

class PagedMapper extends Mapper {

	 protected function findEntities($sql, array $params=[], $limit=null, $offset=null) {
		 if (isset($_GET['page']) && isset($_GET['per_page']) &&
		 	!empty($_GET['page']) && !empty($_GET['per_page'])) {
			 $limit = (int)$_GET['per_page'];
			 $page = (int)$_GET['page'];
			 if ($limit > 0 && $page > 0) {
			 	$offset = ($page - 1) * $limit;
			} else {
				$limit = null;
			}
		 }
		 return parent::findEntities($sql, $params, $limit, $offset);
	 }

}
