<?php

namespace Xofttion\ORM\RML;

use Traversable;
use ArrayIterator;

use Xofttion\ORM\RML\Contracts\IEntity;
use Xofttion\ORM\RML\Contracts\IEntityCollection;

class EntityCollection implements IEntityCollection {
    
    // Atributos de la clase EntityCollection
    
    /**
     *
     * @var array 
     */
    protected $entities = array();

    // Métodos sobrescritos de la interfaz IEntityCollection
    
    public function isEmpty(): bool {
        return !($this->count() > 0);
    }
    
    public function attach(IEntity $entity): void {
        array_push($this->entities, $entity);
    }
    
    public function indexOf(IEntity $entity): int {
        return array_search($entity, $this->entities);
    }
    
    public function getValue(int $index): ?IEntity {
        if ($this->isEmpty()) {
            return null; // Esta vacío
        }
        
        if ($this->count() < ($index + 1)) {
            return null; // Posición desborda
        }
        
        return $this->entities[$index]; // Entidad
    }
    
    public function first(): ?IEntity {
        return $this->getValue(0);
    }
    
    public function last(): ?IEntity {
        return $this->getValue($this->count() - 1);
    }
    
    public function detach(IEntity $entity): void {
        $key = $this->indexOf($entity); // Posición de la entidad
        
        if ($key > -1) {
            unset($this->entities[$key]); // Eliminando clave
        }
    }

    public function clear(): void {
        $this->entities = [];
    }

    public function toArray(): array {
        return array_map(function (IEntity $entity) { 
            return $entity->toArray(); 
        }, $this->entities); // Datos para transacción
    }
    
    public function jsonSerialize() {
        return array_map(function (IEntity $entity) { 
            return $entity->jsonSerialize(); 
        }, $this->entities); // Datos para respuesta
    }

    public function count(): int {
        return count($this->entities);
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->entities);
    }
}