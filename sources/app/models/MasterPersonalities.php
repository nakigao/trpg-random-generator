<?php

class MasterPersonalities extends \Phalcon\Mvc\Model
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
        return 'master_personalities';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterPersonalities[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterPersonalities
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * @param int $numberOf いくつ生成するか
     * @return array
     */
    public function findPersonalities($numberOf = 3)
    {
        //
        $sqlForTypePrevious = <<< EOM
SELECT body
FROM MasterPersonalities
ORDER BY RAND()
LIMIT :numberOf:
EOM;
        $bind = array(
            'numberOf' => $numberOf
        );
        $bindTypes = array(
            'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
        );
        $rowObject = $this->modelsManager->executeQuery($sqlForTypePrevious, $bind, $bindTypes);
        $rows = array();
        foreach ($rowObject as $row) {
            $rows[] = $row->body;
        }
        return $rows;
    }

}
