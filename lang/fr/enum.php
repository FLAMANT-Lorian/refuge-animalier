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
    VolunteerStatus::Active->value => 'Actif·ve',
    VolunteerStatus::InBreak->value => 'En pause',
    VolunteerStatus::Parts->value => 'Parti·e',

    // VOLUNTEER STATUS FILTER
    VolunteerStatus::Active->value. '_filter' => 'Actif·ve',
    VolunteerStatus::InBreak->value . '_filter'=> 'En pause',
    VolunteerStatus::Parts->value . '_filter'=> 'Parti·e',

    // USER
    UserStatus::Admin->value => 'Administrateur',
    UserStatus::Volunteer->value => 'Bénévole',

    // YesOrNo
    YesOrNo::Yes->value => 'Oui',
    YesOrNo::No->value => 'Non',

    // AdoptionRequestStatus
    AdoptionRequestsStatus::Refused->value => 'Refusé',
    AdoptionRequestsStatus::InWay->value => 'En cours',
    AdoptionRequestsStatus::Closed->value => 'Clôturé',
    AdoptionRequestsStatus::Awaiting->value => 'En attente',

    // AdoptionRequestStatusFilter
    AdoptionRequestsStatus::Refused->value . '_filter' => 'Refusées',
    AdoptionRequestsStatus::InWay->value . '_filter' => 'En cours',
    AdoptionRequestsStatus::Closed->value . '_filter' => 'Clôturées',
    AdoptionRequestsStatus::Awaiting->value . '_filter' => 'En attente',

    // Sex
    Sex::Male->value => 'Mâle',
    Sex::Female->value => 'Femelle',

    // AnimalStatus
    AnimalStatus::Adopted->value => 'Adopté',
    AnimalStatus::InTreatment->value => 'En soin',
    AnimalStatus::ProcessOfAdoption->value => 'En cours d’adoption',
    AnimalStatus::AwaitingAdoption->value => 'En attente d’adoption',

    // AnimalStatusFilter
    AnimalStatus::Adopted->value . '_filter' => 'Adoptés',
    AnimalStatus::InTreatment->value . '_filter' => 'En soins',
    AnimalStatus::ProcessOfAdoption->value . '_filter' => 'En cours d’adoption',
    AnimalStatus::AwaitingAdoption->value . '_filter' => 'En attente d’adoption',

    // SPECIES
    Species::DOG->value => 'Chien',
    Species::CAT->value => 'Chat',
    Species::RABBIT->value => 'Lapin',
    Species::HAMSTER->value => 'Hamster',
    Species::GUINEA_PIG->value => 'Cochon d’Inde',
    Species::FERRET->value => 'Furet',

    Species::HORSE->value => 'Cheval',
    Species::COW->value => 'Vache',
    Species::SHEEP->value => 'Mouton',
    Species::GOAT->value => 'Chèvre',
    Species::PIG->value => 'Cochon',
    Species::DONKEY->value => 'Âne',
    Species::CHICKEN->value => 'Poule',
    Species::DUCK->value => 'Canard',

    Species::BIRD->value => 'Oiseau',
    Species::PARROT->value => 'Perroquet',
    Species::CANARY->value => 'Canari',

    Species::SNAKE->value => 'Serpent',
    Species::LIZARD->value => 'Lézard',
    Species::TURTLE->value => 'Tortue',
    Species::FROG->value => 'Grenouille',

    Species::DEER->value => 'Cerf',
    Species::FOX->value => 'Renard',
    Species::HEDGEHOG->value => 'Hérisson',

    // SheetStatus
    SheetsStatus::Modification->value => 'Modification',
    SheetsStatus::Creation->value => 'Création',
    SheetsStatus::Validate->value => 'Validée',

    // SheetStatus filter
    SheetsStatus::Modification->value . '_filter' => 'Modifications',
    SheetsStatus::Creation->value . '_filter' => 'Créations',
    SheetsStatus::Validate->value . '_filter' => 'Validées',

    // Date Range
    DateRange::day->value . '_filter' => 'Aujourd’hui',
    DateRange::week->value . '_filter' => 'Semaine',
    DateRange::month->value . '_filter' => 'Mois',

    // Message
    MessageStatus::Read->value => 'Lu',
    MessageStatus::Unread->value => 'Nouveau',

    // Message filter
    MessageStatus::Read->value . '_filter' => 'Lus',
    MessageStatus::Unread->value . '_filter' => 'Nouveaux',

    // LANGUAGE
    AvailableLanguage::EN->value => 'Anglais',
    AvailableLanguage::FR->value => 'Français',
];
