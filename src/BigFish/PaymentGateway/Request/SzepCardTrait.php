<?php

namespace BigFish\PaymentGateway\Request;


trait SzepCardTrait
{
	/**
	 * @param string $mkbSzepCardNumber
	 * @return $this
	 */
	public function setMkbSzepCardNumber(string $mkbSzepCardNumber): self
	{
		return $this->setData($mkbSzepCardNumber, 'mkbSzepCardNumber');
	}

	/**
	 * @param string $mkbSzepCvv
	 * @return $this
	 */
	public function setMkbSzepCvv(string $mkbSzepCvv): self
	{
		return $this->setData($mkbSzepCvv, 'mkbSzepCvv');
	}

	/**
	 * @param string $mkbSzepCafeteriaId
	 * @return $this
	 */
	public function setMkbSzepCafeteriaId(string $mkbSzepCafeteriaId): self
	{
		return $this->setData($mkbSzepCafeteriaId, 'mkbSzepCafeteriaId');
	}

	/**
	 * @param string $otpCardPocketId
	 * @return $this
	 */
	public function setOtpCardPocketId(string $otpCardPocketId): self
	{
		return $this->setData($otpCardPocketId, 'otpCardPocketId');
	}
}