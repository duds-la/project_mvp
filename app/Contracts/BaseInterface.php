<?php

namespace App\Contracts;

interface BaseInterface
{
    public function index();

    public function show();

    public function create();

    public function store();

    public function update();

    public function delete();
}