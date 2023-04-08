<?php
namespace Macsakini\CosmosDB;

interface CosmosInterface
{
    public function auth();
    public function delete();
    public function get();
    public function list();
    public function create();
}