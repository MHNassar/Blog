<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Imprint;
use App\Repositories\ImprintRepository;

trait MakeImprintTrait
{
    /**
     * Create fake instance of Imprint and save it in database
     *
     * @param array $imprintFields
     * @return Imprint
     */
    public function makeImprint($imprintFields = [])
    {
        /** @var ImprintRepository $imprintRepo */
        $imprintRepo = \App::make(ImprintRepository::class);
        $theme = $this->fakeImprintData($imprintFields);
        return $imprintRepo->create($theme);
    }

    /**
     * Get fake instance of Imprint
     *
     * @param array $imprintFields
     * @return Imprint
     */
    public function fakeImprint($imprintFields = [])
    {
        return new Imprint($this->fakeImprintData($imprintFields));
    }

    /**
     * Get fake data of Imprint
     *
     * @param array $imprintFields
     * @return array
     */
    public function fakeImprintData($imprintFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'text' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $imprintFields);
    }
}
