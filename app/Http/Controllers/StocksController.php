<?php

    namespace App\Http\Controllers;

    use App\Libraries\OperationBuilder;
    use App\Services\TaxService;
    use Illuminate\Http\Request;
    use Laravel\Lumen\Routing\Controller as BaseController;

    class StocksController extends BaseController
    {
        public function operate(Request $request): void
        {
            $payload = $request->all();
            if (empty($payload)) {
                echo "The request is empty, please send a json array as payload";
                return;
            }

            try {
                $operationBuilder = new OperationBuilder();
                $operations       = $operationBuilder->buildOperationsArrayByPayload($payload);

                $taxService = new TaxService();
                echo json_encode($taxService->processOperations($operations));
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }
    }
