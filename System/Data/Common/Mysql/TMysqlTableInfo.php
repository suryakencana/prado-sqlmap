<?php namespace System\Data\Common\Mysql;
/**
 * TMysqlTableInfo class file.
 *
 * @author Wei Zhuo <weizhuo[at]gmail[dot]com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2005-2013 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @version $Id: TMysqlTableInfo.php 3245 2013-01-07 20:23:32Z ctrlaltca $
 * @package System.Data.Common.Mysql
 */

/**
 * Loads the base TDbTableInfo class and TMysqlTableColumn class.
 */
use System\Data\Common\TDbTableInfo;
use System\Data\Common\Mysql\TMysqlTableColumn;
use System\Data\Common\Mysql\TMysqlCommandBuilder;

/**
 * TMysqlTableInfo class provides additional table information for MySQL database.
 *
 * @author Wei Zhuo <weizho[at]gmail[dot]com>
 * @version $Id: TMysqlTableInfo.php 3245 2013-01-07 20:23:32Z ctrlaltca $
 * @package System.Data.Common.Mysql
 * @since 3.1
 */
class TMysqlTableInfo extends TDbTableInfo
{
	/**
	 * @return string name of the schema this column belongs to.
	 */
	public function getSchemaName()
	{
		return $this->getInfo('SchemaName');
	}

	/**
	 * @return string full name of the table, database dependent.
	 */
	public function getTableFullName()
	{
		if(($schema=$this->getSchemaName())!==null)
			return '`'.$schema.'`.`'.$this->getTableName().'`';
		else
			return '`'.$this->getTableName().'`';
	}

	/**
	 * @param TDbConnection database connection.
	 * @return TDbCommandBuilder new command builder
	 */
	public function createCommandBuilder($connection)
	{
		return new TMysqlCommandBuilder($connection,$this);
	}
}

