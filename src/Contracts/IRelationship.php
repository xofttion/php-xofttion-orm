<?php

namespace Xofttion\ORM\Contracts;

use Illuminate\Database\Eloquent\Relations\Relation;

interface IRelationship
{

    // Métodos de la interfaz IRelationship

    /**
     * 
     * @param Relation $relation
     * @return void
     */
    public function setRelation(Relation $relation): void;

    /**
     * 
     * @return Relation|null
     */
    public function getRelation(): ?Relation;

    /**
     * 
     * @param object $value
     * @return void
     */
    public function setValue($value): void;

    /**
     * 
     * @return object
     */
    public function getValue();
}
