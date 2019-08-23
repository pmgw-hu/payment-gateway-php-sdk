<?php

namespace BigFish\Tests\PaymentGateway\Transport\Response;


use BigFish\PaymentGateway\Transport\Response\Response;

class ResponseTest extends \PHPUnit\Framework\TestCase
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
	public function createFromObject_withJsonData()
	{
		$class = new \stdClass();
		$class->foo = json_encode(array('foo2'=>'bar'));
		$class->test = 1;

		$response = Response::createFromObject($class);
		$data = $response->getData();
		$this->assertEquals('bar', $data['foo']['foo2']);

	}

	/**
	 * @test
	 */
	public function createFromObject_multiClassObject_2()
	{
		$class = new \stdClass();
		$class->foo = 'bar';
		$class->test = 1;

		$subClass = new \stdClass();
		$subClass->foo2 = 'bar2';

		$class->sub_object = $subClass;

		$response = Response::createFromObject($class);
		$this->assertResponse($response);
		$data = $response->getData();
		$this->assertEquals('bar2', $data['sub_object']['foo2']);
	}

	/**
	 * @test
	 */
	public function createFromObject_multiClassObject3()
	{
		$class = new \stdClass();
		$class->foo = 'bar';
		$class->test = 1;

		$subSubClass = new \stdClass();
		$subSubClass->foo3 = 3;

		$subClass = new \stdClass();
		$subClass->foo2 = 'bar2';
		$subClass->sub = $subSubClass;

		$class->sub_object = $subClass;

		$response = Response::createFromObject($class);
		$this->assertResponse($response);
		$data = $response->getData();
		$this->assertEquals(3, $data['sub_object']['sub']['foo3']);
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
		$this->assertInstanceOf('\BigFish\PaymentGateway\Transport\Response\Response', $response);
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
