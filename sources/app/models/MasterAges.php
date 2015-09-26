<?php

class MasterAges extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $age_id;

    /**
     *
     * @var string
     */
    public $age_name;

    /**
     *
     * @var string
     */
    public $age_name_ja;

    /**
     *
     * @var integer
     */
    public $min;

    /**
     *
     * @var integer
     */
    public $max;

    /**
     *
     * @var string
     */
    public $type;

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
        return 'master_ages';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterAges[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterAges
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
