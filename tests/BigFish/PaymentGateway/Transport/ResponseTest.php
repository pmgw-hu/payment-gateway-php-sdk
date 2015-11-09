<?php

namespace BigFish\Tests\PaymentGateway\Transport;

use BigFish\PaymentGateway\Transport\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
	public function createFormValidJson()
	{
		$this->assertResponse(
			Response::createFromJson(
				json_encode(
					array(
						'test' => 1,
						'foo' => 'bar'
					)
				)
			)
		);
	}

	/**
	 * @test
	 */
	public function createFromObject()
	{
		$class = new \stdClass();
		$class->foo = 'bar';
		$class->test = 1;

		$this->assertResponse(Response::createFromObject($class));
	}

	/**
	 * @test
	 */
	public function returnNullWhenVariableNotSet()
	{
		$response = new Response();
		$this->assertEquals('', $response->somethingThatNotSet);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function createFormInvalidJson()
	{
		Response::createFromJson('not valid json');
	}

	/**
	 * @param Response $response
	 */
	protected function assertResponse(Response $response)
	{
		$this->assertInstanceOf('\BigFish\PaymentGateway\Transport\Response', $response);
		$data = $response->getData();
		$this->assertInternalType('array', $data);
		$this->assertArrayHasKey('test', $data);
		$this->assertArrayHasKey('foo', $data);
		$this->assertEquals(1, $data['test']);
		$this->assertEquals('bar', $data['foo']);
		$this->assertEquals($response->test, 1);
		$this->assertEquals($response->foo, 'bar');
	}
}
