<?php

use App\Enums\AdoptionRequestsStatus;
use App\Enums\AnimalStatus;
use App\Enums\Sex;
use App\Enums\Species;
use App\Enums\UserStatus;
use App\Enums\YesOrNo;

return [
    // USER
    UserStatus::Admin->value => 'Administrator',
    UserStatus::Volunteer->value => 'Volunteer',

    // YesOrNo
    YesOrNo::Yes->value => 'Yes',
    YesOrNo::No->value => 'No',

    // AdoptionRequestStatus
    AdoptionRequestsStatus::Refused->value => 'Refused',
    AdoptionRequestsStatus::InWay->value => 'In progress',
    AdoptionRequestsStatus::Closed->value => 'Closed',
    AdoptionRequestsStatus::Awaiting->value => 'Awaiting',

    // AdoptionRequestStatusFilter
    AdoptionRequestsStatus::Refused->value . '_filter' => 'Refused',
    AdoptionRequestsStatus::InWay->value . '_filter' => 'In progress',
    AdoptionRequestsStatus::Closed->value . '_filter' => 'Closed',
    AdoptionRequestsStatus::Awaiting->value . '_filter' => 'Awaiting',

    // Sex
    Sex::Male->value => 'Male',
    Sex::Female->value => 'Female',

    // AnimalStatus
    AnimalStatus::Adopted->value => 'Adopted',
    AnimalStatus::InTreatment->value => 'Under treatment',
    AnimalStatus::ProcessOfAdoption->value => 'In adoption process',
    AnimalStatus::AwaitingAdoption->value => 'Awaiting adoption',

    // AnimalStatusFilter
    AnimalStatus::Adopted->value . '_filter' => 'Adopted',
    AnimalStatus::InTreatment->value . '_filter' => 'Under treatment',
    AnimalStatus::ProcessOfAdoption->value . '_filter' => 'In adoption process',
    AnimalStatus::AwaitingAdoption->value . '_filter' => 'Awaiting adoption',

    // SPECIES
    Species::DOG->value => 'Dog',
    Species::CAT->value => 'Cat',
    Species::RABBIT->value => 'Rabbit',
    Species::HAMSTER->value => 'Hamster',
    Species::GUINEA_PIG->value => 'Guinea pig',
    Species::FERRET->value => 'Ferret',

    Species::HORSE->value => 'Horse',
    Species::COW->value => 'Cow',
    Species::SHEEP->value => 'Sheep',
    Species::GOAT->value => 'Goat',
    Species::PIG->value => 'Pig',
    Species::DONKEY->value => 'Donkey',
    Species::CHICKEN->value => 'Chicken',
    Species::DUCK->value => 'Duck',

    Species::BIRD->value => 'Bird',
    Species::PARROT->value => 'Parrot',
    Species::CANARY->value => 'Canary',

    Species::SNAKE->value => 'Snake',
    Species::LIZARD->value => 'Lizard',
    Species::TURTLE->value => 'Turtle',
    Species::FROG->value => 'Frog',

    Species::DEER->value => 'Deer',
    Species::FOX->value => 'Fox',
    Species::HEDGEHOG->value => 'Hedgehog',
];
