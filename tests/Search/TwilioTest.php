<?php

namespace Zenapply\Sms\Tests\Search;

use Zenapply\Sms\Search\Twilio as Search;
use Config;

class TwilioTest extends TestCase
{
    protected $searchClass = Search::class;
    protected $driver = 'twilio';
}