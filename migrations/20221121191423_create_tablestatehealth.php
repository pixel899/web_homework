<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTablestatehealth extends AbstractMigration
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
    public function up()
    {
	$sql = '
		CREATE TABLE `state_health` (
  		`ID` int(11) NOT NULL,
  		`title` varchar(20) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
		
		ALTER TABLE `state_health`
  		ADD PRIMARY KEY (`ID`);
  		
  		ALTER TABLE `state_health`
  		MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;';
	
	$this->execute($sql);
    }
    public function down()
    {
        $sql = 'DROP TABLE `state_health`';
        $this->execute($sql);
    }
}
