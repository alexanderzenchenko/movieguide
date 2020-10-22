<?php


namespace Drupal\movieguide\Services\APIClientService;


use Drupal\Core\Config\ConfigFactory;
use Drupal\movieguide\Form\MovieGuideApiSettings;
use Drupal\movieguide\Services\APIClientService\ImdbAPIClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ImdbAPIClient implements ImdbAPIClientInterface
{

    private $client;
    private $key;
    private $url;

    public function __construct(Client $client, ConfigFactory $configFactory)
    {
        $this->client = $client;
        $this->key = $configFactory->get(MovieGuideApiSettings::SETTINGS_NAME)->get('api_key');
        $this->url = $configFactory->get(MovieGuideApiSettings::SETTINGS_NAME)->get('url');
    }

    public function getContent(array $queryParameters)
    {
        try {
            if (!array_key_exists('apikey', $queryParameters)) {
                $queryParameters['apikey'] = $this->key;
            }

            $response = $this->client->request('GET', $this->url, ['query' => $queryParameters]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getCode(), 'message' => $e->getMessage()];
        }
    }
}
