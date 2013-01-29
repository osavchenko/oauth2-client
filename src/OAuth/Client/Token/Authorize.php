<?php
/**
 * OAuth2 Token
 *
 * @package    OAuth2
 * @category   Token
 * @author     Phil Sturgeon
 * @copyright  (c) 2011 HappyNinjas Ltd
 */

namespace OAuth2\Client\Token;

use InvalidArgumentException;

class Authorize extends AbstractToken
{
    /**
     * @var  string  code
     */
    protected $code;

    /**
     * @var  string  redirect_uri
     */
    protected $redirectUri;

    /**
     * Sets the token, expiry, etc values.
     *
     * @param   array   token options
     * @return  void
     */
    public function __construct(array $options)
    {
        if ( ! isset($options['code'])) {
            throw new InvalidArgumentException('Required option not passed: code');
        } elseif ( ! isset($options['redirect_uri'])) {
            throw new InvalidArgumentException('Required option not passed: redirect_uri');
        }

        $this->code = $options['code'];
        $this->redirectUri = $options['redirect_uri'];
    }

    /**
     * Returns the token key.
     *
     * @return  string
     */
    public function __toString()
    {
        return (string) $this->code;
    }

}