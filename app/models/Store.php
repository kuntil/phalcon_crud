<?php

class Store extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="store_id", type="integer", length=11, nullable=false)
     */
    public $store_id;

    /**
     *
     * @var string
     * @Column(column="store_name", type="string", length=200, nullable=false)
     */
    public $store_name;

    /**
     *
     * @var string
     * @Column(column="store_address", type="string", length=2000, nullable=false)
     */
    public $store_address;

    /**
     *
     * @var string
     * @Column(column="store_telp", type="string", length=13, nullable=false)
     */
    public $store_telp;

    /**
     *
     * @var string
     * @Column(column="store_istagram", type="string", length=200, nullable=true)
     */
    public $store_istagram;

    /**
     *
     * @var string
     * @Column(column="store_facebook", type="string", length=200, nullable=true)
     */
    public $store_facebook;

    /**
     *
     * @var string
     * @Column(column="store_tagline", type="string", length=200, nullable=true)
     */
    public $store_tagline;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("crud");
        $this->setSource("store");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'store';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Store[]|Store|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Store|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
