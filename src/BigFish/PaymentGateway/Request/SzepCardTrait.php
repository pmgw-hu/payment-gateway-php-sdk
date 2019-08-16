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
	 * @param string $otpCardNumber
	 * @return $this
	 */
	public function setOtpCardNumber(string $otpCardNumber): self
	{
		return $this->setData($otpCardNumber, 'otpCardNumber');
	}

	/**
	 * @param string $otpExpiration
	 * @return $this
	 */
	public function setOtpExpiration(string $otpExpiration): self
	{
		return $this->setData($otpExpiration, 'otpExpiration');
	}

	/**
	 * @param string $otpCvc
	 * @return $this
	 */
	public function setOtpCvc(string $otpCvc): self
	{
		return $this->setData($otpCvc, 'otpCvc');
	}

	/**
	 * @param string $otpCardPocketId
	 * @return $this
	 */
	public function setOtpCardPocketId(string $otpCardPocketId): self
	{
		return $this->setData($otpCardPocketId, 'otpCardPocketId');
	}

	/**
	 * @param string $otpConsumerRegistrationId
	 * @return $this
	 */
	public function setOtpConsumerRegistrationId(string $otpConsumerRegistrationId): self
	{
		return $this->setData($otpConsumerRegistrationId, 'otpConsumerRegistrationId');
	}

	/**
	 * @param string $mkbSzepCafeteriaId
	 * @return $this
	 */
	public function setMkbSzepCafeteriaId(string $mkbSzepCafeteriaId): self
	{
		return $this->setData($mkbSzepCafeteriaId, 'mkbSzepCafeteriaId');
	}
}