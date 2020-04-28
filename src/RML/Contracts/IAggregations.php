<?php

namespace Xofttion\ORM\RML\Contracts;

interface IAggregations {
    
    // Métodos de la interfaz IAggregations
    
    /**
     * 
     * @param string $key
     * @param IAggregation $aggregation
     * @return void
     */
    public function attach(string $key, IAggregation $aggregation): void;
    
    /**
     * 
     * @param string $key
     * @return bool
     */
    public function contains(string $key): bool;
    
    /**
     * 
     * @param string $key
     * @return IAggregation|null
     */
    public function getValue(string $key): ?IAggregation;
    
    /**
     * 
     * @param string $key
     * @param string $class
     * @param bool $mappable 
     * @return IAggregations
     */
    public function hasOne(string $key, string $class, bool $mappable = true): IAggregations;
    
    /**
     * 
     * @param string $key
     * @param string $class
     * @param bool $mappable 
     * @return IAggregations
     */
    public function hasMany(string $key, string $class, bool $mappable = true): IAggregations;
    
    /**
     * 
     * @param string $key
     * @param string $class
     * @param bool $mappable 
     * @return IAggregations
     */
    public function composedBy(string $key, string $class, bool $mappable = true): IAggregations;
    
    /**
     * 
     * @param string $key
     * @param string $class
     * @param string|null $column
     * @param bool $mappable
     * @return IAggregations
     */
    public function belongTo(string $key, string $class, ?string $column = null, bool $mappable = true): IAggregations;
    
    /**
     * 
     * @param string $key
     * @param string $class
     * @param bool $mappable 
     * @return IAggregations
     */
    public function containTo(string $key, string $class, bool $mappable = true): IAggregations;

    /**
     * 
     * @return IAggregationsKeys
     */
    public function keys(): IAggregationsKeys;
    
    /**
     * 
     * @return array
     */
    public function forCascade(): array;
    
    /**
     * 
     * @return array
     */
    public function forHidration(): array;
    
    /**
     * 
     * @return array
     */
    public function forBelong(): array;
    
    /**
     * 
     * @return array
     */
    public function forMappable(): array;
}