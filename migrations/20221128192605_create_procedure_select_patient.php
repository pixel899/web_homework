<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProcedureSelectPatient extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
	$sql = '
			CREATE PROCEDURE `select_patient`(IN `a` int, IN `b` varchar(20), IN `c` varchar(45), IN `d` tinyint(3))
			BEGIN
			SELECT * FROM patient WHERE `NCARD` = a OR `name`= b OR `surname` = c OR `age` = d;
			END';
		
	$this->execute($sql);
    }
}
