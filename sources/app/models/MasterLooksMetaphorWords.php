<?php

class MasterLooksMetaphorWords extends \Phalcon\Mvc\Model
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
    public $body_ja;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $world_type;

    /**
     *
     * @var string
     */
    public $gender_type;

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
        return 'master_looks_metaphor_words';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterLooksMetaphorWords[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterLooksMetaphorWords
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
