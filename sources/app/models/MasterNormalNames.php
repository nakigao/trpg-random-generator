<?php

class MasterNormalNames extends \Phalcon\Mvc\Model
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
    public $body_kana;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $nation;

    /**
     *
     * @var string
     */
    public $gender;

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
        return 'master_normal_names';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterNormalNames[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MasterNormalNames
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * @param int $numberOf いくつ生成するか
     * @param string $whatNation どの国名を対象にするか
     * @param string $whatGender どの性別を対象にするか
     * @return array
     */
    public function findNormalNames($numberOf = 3, $whatNation = 'all', $whatGender = 'all')
    {
        // get last name pool
        // FIXME: 可読性優先でSQL全部べた書きしてますけど、なんとかならない？
        $sqlForLastName = '';
        $bindForLastName = '';
        $bindTypesForLastName = '';
        if ($whatNation == 'all' && $whatGender == 'all') {
            $sqlForLastName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'last'
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForLastName = array(
                'numberOf' => $numberOf
            );
            $bindTypesForLastName = array(
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        } else if ($whatNation == 'all' && $whatGender != 'all') {
            $sqlForLastName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'last'
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForLastName = array(
                'numberOf' => $numberOf
            );
            $bindTypesForLastName = array(
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        } else if ($whatNation != 'all' && $whatGender == 'all') {
            $sqlForLastName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'last' AND nation = :whatNation:
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForLastName = array(
                'whatNation' => $whatNation,
                'numberOf' => $numberOf
            );
            $bindTypesForLastName = array(
                'whatNation' => Phalcon\Db\Column::BIND_PARAM_STR,
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        } else {
            $sqlForLastName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'last' AND nation = :whatNation:
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForLastName = array(
                'whatNation' => $whatNation,
                'numberOf' => $numberOf
            );
            $bindTypesForLastName = array(
                'whatNation' => Phalcon\Db\Column::BIND_PARAM_STR,
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        }
        $lastNameObject = $this->modelsManager->executeQuery($sqlForLastName, $bindForLastName, $bindTypesForLastName);
        $lastNameRows = array();
        foreach ($lastNameObject as $row) {
            $lastNameRows[] = array(
                'body' => $row->body,
                'body_kana' => $row->body_kana
            );
        }
        // get first name pool
        // FIXME: 可読性優先でSQL全部べた書きしてますけど、なんとかならない？
        $sqlForFirstName = '';
        $bindForFirstName = '';
        $bindTypesForFirstName = '';
        if ($whatNation == 'all' && $whatGender == 'all') {
            $sqlForFirstName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'first'
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForFirstName = array(
                'numberOf' => $numberOf
            );
            $bindTypesForFirstName = array(
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        } else if ($whatNation == 'all' && $whatGender != 'all') {
            $sqlForFirstName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'first' AND gender = :whatGender:
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForFirstName = array(
                'whatGender' => $whatGender,
                'numberOf' => $numberOf
            );
            $bindTypesForFirstName = array(
                'whatGender' => Phalcon\Db\Column::BIND_PARAM_STR,
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        } else if ($whatNation != 'all' && $whatGender == 'all') {
            $sqlForFirstName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'first' AND nation = :whatNation:
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForFirstName = array(
                'whatNation' => $whatNation,
                'numberOf' => $numberOf
            );
            $bindTypesForFirstName = array(
                'whatNation' => Phalcon\Db\Column::BIND_PARAM_STR,
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        } else {
            $sqlForFirstName = <<< EOM
SELECT
  body,
  body_kana
FROM MasterNormalNames
WHERE type = 'first' AND nation = :whatNation: AND gender = :whatGender:
ORDER BY RAND()
LIMIT :numberOf:
EOM;
            $bindForFirstName = array(
                'whatNation' => $whatNation,
                'whatGender' => $whatGender,
                'numberOf' => $numberOf
            );
            $bindTypesForFirstName = array(
                'whatNation' => Phalcon\Db\Column::BIND_PARAM_STR,
                'whatGender' => Phalcon\Db\Column::BIND_PARAM_STR,
                'numberOf' => Phalcon\Db\Column::BIND_PARAM_INT
            );
        }
        $firstNameObject = $this->modelsManager->executeQuery($sqlForFirstName, $bindForFirstName, $bindTypesForFirstName);
        $firstNameRows = array();
        foreach ($firstNameObject as $row) {
            $firstNameRows[] = array(
                'body' => $row->body,
                'body_kana' => $row->body_kana
            );
        }
        // join last name pool and first name pool
        $joinedRows = array();
        for ($i = 0; $i < $numberOf; $i++) {
            $joinedRows[] = array(
                'body' => $lastNameRows[$i]['body'] . ' ' . $firstNameRows[$i]['body'],
                'body_kana' => $lastNameRows[$i]['body_kana'] . ' ' . $firstNameRows[$i]['body_kana'],
            );
        }
        return $joinedRows;
    }

}
