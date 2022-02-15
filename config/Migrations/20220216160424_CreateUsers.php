<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

// DPI Feedback: Migration gegenereed met "bin/cake migrations create Users"
class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        // DPI Feedback: Lowercase underscore tabel-naam volgens de mysql naming conventions
        $table = $this->table('users');

        // DPI Feedback: voornaam, achternaam en postcode kolommen
        $table->addColumn('voornaam', 'string', [
            'limit' => 255,
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('achternaam', 'string', [
            'limit' => 255,
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('postcode', 'string', [
            'limit' => 6,
            'default' => null,
            'null' => false,
        ]);
        
        // DPI Feedback: Migration toegepast met "bin/cake migrations migrate"
        $table->create();
    }
}
