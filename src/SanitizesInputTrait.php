<?php namespace Larasponge;


use Illuminate\Validation\Factory;

trait SanitizesInputTrait
{

	/**
	 * The sanitized input.
	 *
	 * @var array
	 */
	protected $sanitized;

	/**
	 * The sanitizer to use.
	 *
	 * @var Sanitizer
	 */
	protected $sanitizer;

	/**
	 * @param $factory \Illuminate\Validation\Factory
	 * @return \Illuminate\Validation\Validator
	 */
	public function validator(Factory $factory)
	{
		return $factory->make(
			$this->sanitize(), $this->container->call([$this, 'rules']), $this->messages()
		);
	}

	/**
	 * Sanitize the input.
	 *
	 * @return array
	 */
	protected function sanitize()
	{
		if (!is_null($this->sanitizer)) {
			return $this->sanitized = $this->sanitizer->sanitize($this->all());
		}

		return $this->all();
	}

	/**
	 * Get sanitized input.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	 */
	public function sanitized($key = null, $default = null)
	{
		$input = is_null($this->sanitized) ? $this->all() : $this->sanitized;
		return array_get($input, $key, $default);
	}

	/**
	 * @return array
	 */
	public abstract function all();

}
