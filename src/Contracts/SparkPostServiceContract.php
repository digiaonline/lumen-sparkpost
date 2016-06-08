<?php

namespace Nord\Lumen\SparkPost\Contracts;

use SparkPost\APIResponseException;

/**
 * Interface SparkPostServiceContract.
 *
 * @package Nord\Lumen\SparkPost\Contracts
 */
interface SparkPostServiceContract
{
    /**
     * This method assumes that all the appropriate fields have been populated by the user through configuration.
     * Acceptable configuration values are:
     *
     *  'attachments': array,
     *  'campaign': string,
     *  'customHeaders': array,
     *  'description': string,
     *  'from': string,
     *  'html': string,
     *  'inlineCss': boolean,
     *  'inlineImages': array,
     *  'metadata': array,
     *  'recipientList': string,
     *  'recipients': array,
     *  'replyTo': string,
     *  'rfc822': string,
     *  'sandbox': boolean,
     *  'startTime': string | \DateTime,
     *  'subject': string,
     *  'substitutionData': array,
     *  'template': string,
     *  'text': string,
     *  'trackClicks': boolean,
     *  'trackOpens': boolean,
     *  'transactional': boolean,
     *  'useDraftTemplate': boolean
     *
     * @param array $config
     *
     * @return array
     *
     * @throws APIResponseException
     */
    public function send(array $config);
}
