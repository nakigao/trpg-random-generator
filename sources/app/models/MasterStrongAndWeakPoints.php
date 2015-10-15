<?php

class MasterStrongAndWeakPoints extends \Phalcon\Mvc\Model
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
    public $body;

    /**
     *
     * @var string
     */
    public $body_ja;

    /**
     *
     * @var string
     */
    public $category;

    /**
     *
     * @var string
     */
    public $category_ja;

    /**
     *
     * @var string
     */
    public $word_type;

    /**
     *
     * @var string
     */
    public $world_type;

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
        return 'master_strong_and_weak_points';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterStrongAndWeakPoints[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterStrongAndWeakPoints
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
