<?php

namespace App\Livewire\Users;


use Livewire\Component;
use Mary\Traits\Toast;

class Home extends Component
{
    use Toast;

    public $users;

    public $searchQuery='';
    public bool $welcomeModal = true;
    public bool $searchModal = false;

    public function search()
    {
        // Check if search query is not empty
        if (!empty($this->searchQuery)) {
            // Define the base URL for the Nominatim API
            $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($this->searchQuery);

            // Send a GET request to the Nominatim API
            $response = file_get_contents($url);

            // Decode the JSON response
            $data = json_decode($response, true);

            // Check if data was returned
            if (!empty($data)) {
                // Get the first result
                $location = $data[0];

                // Set the users property to the location data
                $this->users = $location;
            } else {
                // No data was returned
                $this->users = null;
            }
        } else {
            // Search query is empty
            $this->users = null;
        }
    }

    public function closeModal()
    {
        $this->welcomeModal = false;
    }
    public function render()
    {
        return view('livewire.users.home');
    }
}
