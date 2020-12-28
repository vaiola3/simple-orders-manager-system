<?php

$globalItens = [];

function setGlobalItens (array $itens)
{
    $globalItens = $itens;
}

function getGlobalItens () : array
{
    return $globalItens;
}

function getGlobalItem ($name = null)
{
    return $globalItens[$name];
}