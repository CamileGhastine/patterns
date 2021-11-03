<?php

namespace Model;

class Post
{
    public function __construct(protected \PDO $pdo)
    {
        
    }

    public function all(){

        return "facade";
    }
}

namespace facade;

abstract class AbstractFacade
{
    public static function __callStatic($method, array $args)
    {

        $instance = static::resolve(static::getFacadeAccessor());

        return call_user_func([$instance, $method], $args);
    }

    public static function resolve(array $args)
    {
        [$name, $pdo] = $args;

        $className = '\\Model\\' . ucfirst($name);

        return new $className($pdo);
    }
}


class Post extends AbstractFacade
{
    public static function getFacadeAccessor()
    {
        return ['post', new \PDO('sqlite:./database.sqlite') ];
    }
}


echo Post::all();