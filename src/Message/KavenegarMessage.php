<?php

namespace Kavenegar\Laravel\Message;

class KavenegarMessage
{
    /**
     * The message content.
     *
     * @var string
     */
    public $content;

    /**
     * The phone number the message should be sent from.
     *
     * @var string
     */
    public $from;

    /**
     * The phone number the message should be received to.
     *
     * @var string
     */
    public $to;


    /**
     * The message type.
     *
     * @var string
     */
    public $type = 'text';

    /**
     * The verifing lookup method's name.
     *
     * @var string
     */
    public $method;

    /**
     * The verifing lookup tokens.
     *
     * @var array
     */
    public $tokens;

    /**
     * Create a new message instance.
     *
     * @param string $content
     * @return void
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }

    /**
     * Set the message content.
     *
     * @param string $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the phone number the message should be sent from.
     *
     * @param string $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Set the phone number the message should be received to.
     *
     * @param string $to
     * @return $this
     */
    public function to($to)
    {
        $this->to = $to;

        return $this;
    }


    /**
     * Set the verifing lookup method that the message should be sent from.
     *
     * @param string $method
     * @param array $tokens
     * @return $this
     */
    public function verifyLookup($method, $tokens)
    {
        $this->method = $method;
        $this->tokens = is_array($tokens) ? $tokens : [$tokens];
        return $this;
    }

}
