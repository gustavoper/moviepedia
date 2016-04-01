<?php
/**
 * Created by PhpStorm.
 * User: gustavopereira
 * Date: 01/04/16
 * Time: 00:02
 */
class Application_Model_Movie
{
    protected $id;
    protected $name;
    protected $publisher;
    protected $genre;
    protected $launchYear;
    protected $plot;
    protected $billboard;


    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }


    /**
     * @param $name
     * @param $value
     * @throws Exception
     */
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propriedade invalida (Movie)');
        }
        $this->$method($value);
    }

    /**
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Propriedade invalida (Movie)');
        }
        return $this->$method();
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }





    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getLaunchYear()
    {
        return $this->launchYear;
    }

    /**
     * @param mixed $launchYear
     */
    public function setLaunchYear($launchYear)
    {
        $this->launchYear = $launchYear;
    }





    /**
     * @return mixed
     */
    public function getPlot()
    {
        return $this->plot;
    }

    /**
     * @param mixed $plot
     */
    public function setPlot($plot)
    {
        $this->plot = $plot;
    }

    /**
     * @return mixed
     */
    public function getBillboard()
    {
        return $this->billboard;
    }

    /**
     * @param mixed $billboard
     */
    public function setBillboard($billboard)
    {
        $this->billboard = $billboard;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }



}

