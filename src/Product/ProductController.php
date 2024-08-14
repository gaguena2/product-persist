<?php
namespace Gaguena\ProductPersist\Product;

use PDO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Gaguena\ProductPersist\Infra\Rest\RestSupport;

class ProductController extends RestSupport
{

    public static function get(Request $request, Response $response, $args)
    {
        $code = $args['code'];
        $pdo = self::Connect();
        $stmt = $pdo->prepare('SELECT * FROM TB_PRODUCTS WHERE P_ID=?');
        $stmt->execute([$code]);
        $products = $stmt->fetchAll(PDO::FETCH_OBJ);

        $response->getBody()->write(json_encode($products));
        return $response->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }

    public static function CreateRouter($app) {
        $app->get('/products/{code}', 'Gaguena\ProductPersist\Product\ProductController::get');
    }
}