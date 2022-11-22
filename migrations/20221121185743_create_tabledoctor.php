<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTabledoctor extends AbstractMigration
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
		CREATE TABLE `doctor` (
 		`NPERSONNEL` int(11) NOT NULL,
  		`name` varchar(20) NOT NULL,
  		`surname` varchar(45) NOT NULL,
  		`position` varchar(45) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
		
		ALTER TABLE `doctor`
 		ADD PRIMARY KEY (`NPERSONNEL`);
 		
 		ALTER TABLE `doctor`
  		MODIFY `NPERSONNEL` int(11) NOT NULL AUTO_INCREMENT;';
	
	$this->execute($sql);
    }
    public function down()
    {
        $sql = 'DROP TABLE `doctor`';
        $this->execute($sql);
    }
}
