<?php

class Router
{

    private $handlers;
    private $defaultHandler;


    public function get($path, $handler)
    {

        $method = 'GET';

        $this->addHandler($path, $method, $handler);
    }


    public function post($path, $handler)
    {

        $method = 'POST';

        $this->addHandler($path, $method, $handler);
    }

    public function notFound($handler){
        $this->defaultHandler = $handler;
    }

    private function addHandler($path, $method, $handler)
    {

        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    private function getParams($request, $path)
    {

        $pathExplode = explode("/", $path);
        $requestExplode = explode("/", $request);
        $names = array_diff($pathExplode, $requestExplode);
        $names = array_map(function($n){ return str_replace('{','',$n);}, $names);
        $names = array_map(function($n){ return str_replace('}','',$n);}, $names);
        $values = array_diff($requestExplode, $pathExplode);
        $params = array_combine($names, $values);

        return $params;
    }


    public function run()
    {

        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $requestPath = str_replace(BASE_DIR, '', $requestPath);

        $callback = $this->defaultHandler;
        $params =[];

        foreach($this->handlers as $handler){


            $regx = preg_replace('/{\w+}/', "\w+", str_replace("/", "\/", $handler['path']));
            $match = preg_match('/^' . $regx . '$/', $requestPath);
//var_dump($requestPath . "|" . $requestMethod );
//var_dump($handler);
            if ( $match > 0  && ($handler['method'] === $requestMethod)) {
//        

           //    if($handler['path']== $requestPath && $handler['method'] == $requestMethod ){

                $callback = $handler['handler'];

                $params = $this->getParams($requestPath, $handler['path']);

               }

        }

        if($callback)
            call_user_func_array($callback,[array_merge($_POST,$_GET,$params)]);


    }
}
