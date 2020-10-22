<?php

namespace Drupal\movieguide\Services\APIClientService;


interface ImdbAPIClientInterface
{
    public function getContent(array $queryParameters);
}
