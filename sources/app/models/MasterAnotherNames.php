<?php

class MasterAnotherNames extends \Phalcon\Mvc\Model
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
    public $ruby;

    /**
     *
     * @var string
     */
    public $type;

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
        return 'master_another_names';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterAnotherNames[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterAnotherNames
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * @param int $numberOf いくつ生成するか
     * @return array
     */
    public function findAnotherNames($numberOf = 3)
    {
        //
        $sqlForTypePrevious = <<< EOM
SELECT body
FROM MasterAnotherNames
WHERE type = 'previous'
ORDER BY RAND()
LIMIT :numberOf:
EOM;
        $bind = array(
            'numberOf' => $numberOf
        );
        $bindTypes = array(
            'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
        );
        $previousObject = $this->modelsManager->executeQuery($sqlForTypePrevious, $bind, $bindTypes);
        $previousRows = array();
        foreach ($previousObject as $row) {
            $previousRows[] = $row->body;
        }
        //
        $sqlForTypeFollowing = <<< EOM
SELECT body
FROM MasterAnotherNames
WHERE type = 'following'
ORDER BY RAND()
LIMIT :numberOf:
EOM;
        $bind = array(
            'numberOf' => $numberOf
        );
        $bindTypes = array(
            'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
        );
        $followingObject = $this->modelsManager->executeQuery($sqlForTypeFollowing, $bind, $bindTypes);
        $followingRows = array();
        foreach ($followingObject as $row) {
            $followingRows[] = $row->body;
        }
        //
        $joinedRows = array();
        for ($i = 0; $i < $numberOf; $i++) {
            $joinedRows[] = $previousRows[$i] . $followingRows[$i];
        }
        return $joinedRows;
    }

}
