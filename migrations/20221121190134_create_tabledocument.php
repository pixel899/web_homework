<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTabledocument extends AbstractMigration
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
		CREATE TABLE `document` (
  		`ID` int(11) NOT NULL,
  		`date` date NOT NULL,
		`prescription` text DEFAULT NULL,
  		`procedures` text DEFAULT NULL,
  		`room` smallint(3) DEFAULT NULL,
  		`comment` text DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
		
		ALTER TABLE `document`
 		ADD PRIMARY KEY (`ID`);
 		
 		ALTER TABLE `document`
  		MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT';
	
	$this->execute($sql);
    }
    public function down()
    {
        $sql = 'DROP TABLE `document`';
        $this->execute($sql);
    }
}
