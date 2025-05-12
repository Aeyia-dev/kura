<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use HubSpot\Factory;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;

class HubspotService
{
    /**
     * @var \HubSpot\Discovery\Discovery
     */
    protected $hubspot;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * Create a new HubspotService instance.
     */
    public function __construct()
    {
        $this->accessToken = Config::get('aeyia.hubspot.access_token');
        $this->initClient();
    }

    /**
     * Initialize the Hubspot client.
     */
    protected function initClient()
    {
        $this->hubspot = Factory::createWithAccessToken($this->accessToken);
    }

    /**
     * Create a contact in Hubspot from form submission.
     *
     * @param string $fullName
     * @param string $email
     * @param string|null $phone
     * @param string $message
     * @return array
     */
    public function createContact(string $fullName, string $email, ?string $phone = null, string $message = ''): array
    {
        try {
            // Split full name into first and last name
            $nameParts = $this->splitName($fullName);

            // Prepare properties for HubSpot contact
            $properties = [
                'email' => $email,
                'firstname' => $nameParts['firstName'],
                'lastname' => $nameParts['lastName'],
                'message' => $message,
                'contact_source' => Config::get('aeyia.hubspot.sources.contact_form'),
            ];

            // Add phone if provided
            if (!empty($phone)) {
                $properties['phone'] = $phone;
            }

            // Create contact input object
            $contactInput = new SimplePublicObjectInput();
            $contactInput->setProperties($properties);

            // Create the contact in HubSpot
            $contact = $this->hubspot->crm()->contacts()->basicApi()->create($contactInput);

            return [
                'success' => true,
                'message' => 'Contact created successfully',
                'hubspot_id' => $contact->getId(),
            ];
        } catch (\Exception $e) {
            Log::error('HubSpot contact creation error: ' . $e->getMessage(), [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);

            // Try to get the full error response if possible
            $errorMessage = $e->getMessage();
            $errorDetails = [];

            // If this is a GuzzleHttp exception, try to get more details
            if (method_exists($e, 'getResponse') && $e->getResponse()) {
                $errorBody = $e->getResponse()->getBody()->getContents();
                $errorDetails = json_decode($errorBody, true) ?? [];
                Log::error('HubSpot error details', $errorDetails);
            }

            return [
                'success' => false,
                'message' => 'Failed to create contact in HubSpot',
                'error' => $errorMessage,
                'details' => $errorDetails,
            ];
        }
    }

    /**
     * Split a full name into first and last name.
     *
     * @param string $fullName
     * @return array
     */
    protected function splitName(string $fullName): array
    {
        $nameParts = explode(' ', trim($fullName), 2);

        return [
            'firstName' => $nameParts[0] ?? '',
            'lastName' => $nameParts[1] ?? '',
        ];
    }
}