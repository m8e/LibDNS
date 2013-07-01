<?php
/**
 * Builds Resource objects of a specific type
 *
 * PHP version 5.4
 *
 * @category   LibDNS
 * @package    Records
 * @author     Chris Wright <https://github.com/DaveRandom>
 * @copyright  Copyright (c) Chris Wright <https://github.com/DaveRandom>
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    2.0.0
 */
namespace LibDNS\Records;

use \LibDNS\Records\TypeDefinitions\TypeDefinitionManager,
    \LibDNS\Records\Types\TypeBuilder;

/**
 * Builds Resource objects of a specific type
 *
 * @category   LibDNS
 * @package    Records
 * @author     Chris Wright <https://github.com/DaveRandom>
 */
class ResourceBuilder
{
    /**
     * @var \LibDNS\Records\ResourceFactory
     */
    private $resourceFactory;

    /**
     * @var \LibDNS\DataTypes\DataTypeDefinitions
     */
    private $dataTypeDefinitions;

    /**
     * @var \LibDNS\DataTypes\DataTypeBuilder
     */
    private $dataTypeBuilder;

    /**
     * Constructor
     *
     * @param \LibDNS\Records\ResourceFactory $resourceFactory
     * @param \LibDNS\DataTypes\DataTypeDefinitions $dataTypeDefinitions
     * @param \LibDNS\DataTypes\DataTypeBuilder $dataTypeBuilder
     */
    public function __construct(ResourceFactory $resourceFactory, DataTypeDefinitions $dataTypeDefinitions, DataTypeBuilder $dataTypeBuilder)
    {
        $this->resourceFactory = $resourceFactory;
        $this->dataTypeDefinitions = $dataTypeDefinitions;
        $this->dataTypeBuilder = $dataTypeBuilder;
    }

    /**
     * Create a new Resource object
     *
     * @param int $type Type of the resource, can be indicated using the ResourceTypes enum
     *
     * @return \LibDNS\Records\Resource
     */
    public function build($type)
    {
        $typeDef = $this->dataTypeDefinitions->getTypeDefinition($type);
        $data = $this->dataTypeBuilder->build($type, $typeDef);

        $resource = $this->resourceFactory->create($type, $typeDef);
        $resource->setData($data);

        return $resource;
    }
}
