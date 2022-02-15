<?php
// DPI Feedback: User Entity gegenereerd met "bin/cake bake controller User"
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $voornaam
 * @property string $achternaam
 * @property string $postcode
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'voornaam' => true,
        'achternaam' => true,
        'postcode' => true,
    ];

    // DPI Feedback: Voornaam Transformatie
    protected function _setVoornaam(string $value)
    {
        $value = ucfirst(strtolower($value));
        return $value;
    }

    // DPI Feedback: Achternaam Transformatie
    protected function _setAchternaam(string $value)
    {
        $value = ucfirst(strtolower($value));
        return $value;
    }

    // DPI Feedback: Postcode Uppercase Transformatie
    protected function _setPostcode(string $value)
    {
        $value = strtoupper($value);
        return $value;
    }
}
