<?php

    class StocksTest extends TestCase
    {
        /**
         * @dataProvider operationsDataProvider
         */
        public function testShouldSucceed(string $expected, array $parameters): void
        {
            $response = $this->post('/', $parameters);

            $this->assertEquals($expected, $response);
        }

        public function operationsDataProvider(): array
        {
            return [
                ['[{"tax":0},{"tax":0},{"tax":0}]', [["operation" => "buy", "unit-cost" => 10, "quantity" => 100], ["operation"=>"sell", "unit-cost" => 15, "quantity" => 50], ["operation"=>"sell", "unit-cost" => 15, "quantity" => 50]],],
            ];
        }
    }
