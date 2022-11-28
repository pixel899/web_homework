<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProcedure extends AbstractMigration
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
			CREATE PROCEDURE `insert document`(IN `a` int, IN `b` int, IN `c` date, IN `d` int, IN `e` int, IN `f` text, IN `g` text, IN `i` smallint(3), IN `p` text)
			BEGIN
			INSERT INTO document (ID_NCARD,ID_NPERSONNEL,date,ID_diagnosis,ID_state,prescription,procedures,room,comment) value (a,b,c,d,e,f,q,i,p);
			END';
		
	$this->execute($sql);
    }
}
