<?php

use App\Enums\AdoptionRequestsStatus;
use App\Enums\AnimalStatus;
use App\Enums\AvailableLanguage;
use App\Enums\DateRange;
use App\Enums\MessageStatus;
use App\Enums\Sex;
use App\Enums\SheetsStatus;
use App\Enums\Species;
use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Enums\YesOrNo;

return [
    // VOLUNTEER STATUS
    VolunteerStatus::Active->value => 'Active',
    VolunteerStatus::InBreak->value => 'On break',
    VolunteerStatus::Parts->value => 'Left',

    // VOLUNTEER STATUS FILTER
    VolunteerStatus::Active->value . '_filter' => 'Active',
    VolunteerStatus::InBreak->value . '_filter' => 'On break',
    VolunteerStatus::Parts->value . '_filter' => 'Left',

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

    // SheetStatus
    SheetsStatus::Modification->value => 'Modification',
    SheetsStatus::Creation->value => 'Creation',
    SheetsStatus::Validate->value => 'Validated',

    // SheetStatus filter
    SheetsStatus::Modification->value . '_filter' => 'Modifications',
    SheetsStatus::Creation->value . '_filter' => 'Creations',
    SheetsStatus::Validate->value . '_filter' => 'Validated',

    // Date Range
    DateRange::day->value . '_filter' => 'Today',
    DateRange::week->value . '_filter' => 'Week',
    DateRange::month->value . '_filter' => 'Month',

    // Message
    MessageStatus::Read->value => 'Read',
    MessageStatus::Unread->value => 'New',

    // Message filter
    MessageStatus::Read->value . '_filter' => 'Read',
    MessageStatus::Unread->value . '_filter' => 'New',

    // LANGUE
    AvailableLanguage::EN->value => 'English',
    AvailableLanguage::FR->value => 'French',
];
