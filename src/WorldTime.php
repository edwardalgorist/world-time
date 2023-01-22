<?php

namespace EdwardAlgorist\WorldTime;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class WorldTime
{

    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = "https://worldtimeapi.org/api";
    }

    /**
     * Request a list of valid timezones
     * @return object|array
     */
    public function timezones(): object|array
    {

        return Cache::remember('timezones', 1440, function () {
            return $this->makeRequest("/timezone");
        });

    }

    /**
     * Request a list of valid locations for an area
     * @param string $area
     * @return object|array
     */
    public function locations(string $area): object|array
    {

        $validator = Validator::make([
            'area' => $area
        ], [
            'area' => 'required|string'
        ]);

        if ($validator->fails())
            throw new \InvalidArgumentException("Invalid area provided");

        return $this->makeRequest("/timezone/{$area}");

    }

    /**
     * Request the current time for a timezone with region
     * @param string $area
     * @param string $location
     * @param string|null $region
     * @return object|array
     */
    public function time(string $area, string $location, string $region = null): object|array
    {

        $validator = Validator::make([
            'area' => $area,
            'location' => $location
        ], [
            'area' => 'required|string',
            'location' => 'required|string'
        ]);

        if ($validator->fails())
            throw new \InvalidArgumentException("Invalid area or location provided");

        return $this->makeRequest("/timezone/{$area}/{$location}" . ($region ? "/{$region}" : ''));

    }

    /**
     * Request the current time based on your public IP, or for a specific IP
     * @param string|null $ip
     * @return object|array
     */
    public function timeForIP(string $ip = null): object|array
    {
        $validator = Validator::make(['ip' => $ip], [
            'ip' => 'ip'
        ]);

        if ($validator->fails() && $ip) {
            throw new \InvalidArgumentException("Invalid IP provided");
        }

        return $this->makeRequest('/ip' . ($ip ? "/{$ip}" : ''));
    }

    /**
     * Make a request to the API
     *
     * @param string $path
     * @param int $ttl
     * @return object|array
     */
    private function makeRequest(string $path): object|array
    {

        $cacheKey = 'worldtimeapi:' . sha1($path);

        if (Cache::has($cacheKey))
            return Cache::get($cacheKey);

        $response = Http::get($this->baseUrl . $path);

        if ($response->status() !== 200)
            throw new \RuntimeException("Failed to fetch data from API");

        $data = $response->object();

        Cache::put($cacheKey, $data, 60);

        return $data;

    }


}