<?php
use App\Model\AsignaturaModel;

$app->group('/asignatura', function () {
    
    //$this->get('test', function ($req, $res, $args) {
    //    return $res->getBody()
    //               ->write('Hello Users');
    //});
    
    $this->get('/all', function ($req, $res, $args) {
        $um = new AsignaturaModel();
        
        $res
           ->getBody()
           ->write(
            json_encode(
                $um->GetAll()
            )
        );

        return $res->withHeader(
            'Content-type',
            'application/json; charset=utf-8'
        );

    });
    
    $this->get('/{id}', function ($req, $res, $args) {
        $um = new AsignaturaModel();
        
        $res
           ->getBody()
           ->write(
            json_encode(
                $um->Get($args['id'])
            )
        );

        
        return $res->withHeader(
            'Content-type',
            'application/json; charset=utf-8'
        );
    });
    
    $this->get('/bycode/{code}', function ($req, $res, $args) {
        $um = new AsignaturaModel();
        
        $res
           ->getBody()
           ->write(
            json_encode(
                $um->GetByCode($args['code'])
            )
        );

        
        return $res->withHeader(
            'Content-type',
            'application/json; charset=utf-8'
        );
    });

});