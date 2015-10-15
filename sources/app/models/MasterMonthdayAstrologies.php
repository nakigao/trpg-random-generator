<?php

class MasterMonthdayAstrologies extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $month;

    /**
     *
     * @var integer
     */
    public $day;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $name_sign;

    /**
     *
     * @var string
     */
    public $name_sign_ja;

    /**
     *
     * @var string
     */
    public $symbol;

    /**
     *
     * @var string
     */
    public $divition_2;

    /**
     *
     * @var string
     */
    public $divition_3;

    /**
     *
     * @var string
     */
    public $divition_4;

    /**
     *
     * @var string
     */
    public $rouler;

    /**
     *
     * @var string
     */
    public $color;

    /**
     *
     * @var string
     */
    public $material;

    /**
     *
     * @var string
     */
    public $house_base;

    /**
     *
     * @var string
     */
    public $house_number;

    /**
     *
     * @var string
     */
    public $house_thing;

    /**
     *
     * @var string
     */
    public $house_tendency;

    /**
     *
     * @var string
     */
    public $house_body;

    /**
     *
     * @var integer
     */
    public $is_available;

    /**
     *
     * @var string
     */
    public $created;

    /**
     *
     * @var string
     */
    public $modified;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'master_monthday_astrologies';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterMonthdayAstrologies[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterMonthdayAstrologies
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
