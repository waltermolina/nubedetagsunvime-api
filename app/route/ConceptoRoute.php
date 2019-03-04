<?php
use App\Model\ConceptoModel;

$app->group('/concepto', function () {
    
    //$this->get('test', function ($req, $res, $args) {
    //    return $res->getBody()
    //               ->write('Hello Users');
    //});
    
    $this->get('/all', function ($req, $res, $args) {
        $um = new ConceptoModel();
        if($req->getParam("weight") != true){
            $res
                ->getBody()
                ->write(
                    json_encode(
                        $um->GetAll()
                    )
                );
        } else{
            $res
                ->getBody()
                ->write(
                    json_encode(
                        $um->GetAllWeight()
                    )
                );
        }
        
        return $res->withHeader(
            'Content-type',
            'application/json; charset=utf-8'
        );

    });
    
    $this->get('/{id}', function ($req, $res, $args) {
        $um = new ConceptoModel();
        
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
    
    $this->post('/save', function ($req, $res) {
        $um = new ConceptoModel();
        
        return $res
           ->withHeader('Access-Control-Allow-Origin', '*')
           
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $um->InsertOrUpdate(
                    $req->getParsedBody()
                )
            )
        );
    });

    
});