<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use KlaviyoAPI\KlaviyoAPI;

class KlaviyoService
{
    /**
     * @var KlaviyoAPI
     */
    protected $klaviyo;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $societyListId;

    /**
     * @var string
     */
    protected $aeyiaListId;

    /**
     * Create a new KlaviyoService instance.
     */
    public function __construct()
    {
        $this->apiKey = Config::get('aeyia.klaviyo.api_key');
        $this->initClient();
    }

    /**
     * Initialize the Klaviyo client.
     */
    protected function initClient()
    {
        $this->klaviyo = new KlaviyoAPI($this->apiKey);
    }

    /**
     * Subscribe an email to a Klaviyo list.
     *
     * @param string $email
     * @param string $listSource
     * @return array
     */
    public function subscribeToList(string $email, string $listSource = 'default'): array
    {
        try {
            // Define the list ID based on source
            // Society page uses the Society master list, all others use Aeyia master list
            if ($listSource === 'society') {
                $listId = Config::get('aeyia.klaviyo.society_list_id');
                $source = Config::get('aeyia.klaviyo.sources.society');
            } else {
                $listId = Config::get('aeyia.klaviyo.aeyia_list_id');
                $source = Config::get('aeyia.klaviyo.sources.aeyia');
            }

            // First create a profile
            $response = $this->klaviyo->Profiles->createProfile([
                'data' => [
                    'type' => 'profile',
                    'attributes' => [
                        'email' => $email,
                        'properties' => [
                            'source' => $source
                        ]
                    ]
                ]
            ]);

            // Get the profile ID
            $profileId = $response['data']['id'];

            // Subscribe the profile to the list
            $this->klaviyo->Lists->createListRelationshipsProfiles($listId, [
                'data' => [
                    [
                        'type' => 'profile',
                        'id' => $profileId
                    ]
                ]
            ]);

            return [
                'success' => true,
                'message' => 'Email successfully subscribed'
            ];
        } catch (\Exception $e) {
            Log::error('Klaviyo subscription error: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to subscribe. Please try again later.'
            ];
        }
    }
}