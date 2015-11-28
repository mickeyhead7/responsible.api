<?php

namespace Mickeyhead7\Api\Controllers;

use \Symfony\Component\HttpFoundation\JsonResponse;
use \Mickeyhead7\Rsvp\Manager;
use \Mickeyhead7\Api\Scope\Scope;
use \Mickeyhead7\Api\Scope\IncludesScope;

class Base
{

    /**
     * Use the container trait
     */
    use \Mickeyhead7\Api\Container\ContainerTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this
            ->setIncludesScope()
            ->setResourceManager()
            ->setView();
    }

    /**
     * Set the appropriate data model and place it in the container instance
     *
     * @param $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->setContainerItem('Model', $model);

        return $this;
    }

    /**
     * Get the data model from the container
     *
     * @return mixed|null|object
     */
    public function getModel()
    {
        return $this->getContainerItem('Model');
    }

    /**
     * Set the resource adapter
     *
     * @param $adapter
     * @return $this
     */
    public function setResourceAdapter($adapter)
    {
        $this->setContainerItem('ResourceAdapter', $adapter);

        return $this;
    }


    public function getResourceAdapter()
    {
        return $this->getContainerItem('ResourceAdapter');
    }

    /**
     * Set the appropriate data transformer and place it in the container instance
     *
     * @param $transformer
     * @return $this
     */
    public function setTransformer($transformer)
    {
        $this->setContainerItem('Transformer', $transformer);

        return $this;
    }

    /**
     * Set the appropriate data transformer and place it in the container instance
     *
     * @return mixed|null|object
     */
    public function getTransformer()
    {
        return $this->getContainerItem('Transformer');
    }

    /**
     * Set the appropriate data resource manager and place it in the container instance
     *
     * @return $this
     */
    public function setResourceManager()
    {
        $manager = new Manager();
        $this->setContainerItem('ResourceManager', $manager);

        return $this;
    }

    /**
     * Get the data resource manager from the container
     *
     * @return mixed|null|object
     */
    public function getResourceManager()
    {
        return $this->getContainerItem('ResourceManager');
    }

    /**
     * Set the appropriate response view and place it in the container instance
     *
     * @return $this
     */
    public function setView()
    {
        $response = new JsonResponse();
        $this->setContainerItem('View', $response);

        return $this;
    }

    /**
     * Get the response view from the container
     *
     * @return mixed|null|object
     */
    public function getView()
    {
        return $this->getContainerItem('View');
    }

    /**
     * Set the appropriate query scope and place it in the container instance
     *
     * @return $this
     */
    public function setIncludesScope()
    {
        $this->setContainerItem('IncludesScope', IncludesScope::createFromGlobals());

        return $this;
    }

    /**
     * Get the query scope from the container
     *
     * @return mixed|null|object
     */
    public function getIncludesScope()
    {
        return $this->getContainerItem('IncludesScope');
    }

}
