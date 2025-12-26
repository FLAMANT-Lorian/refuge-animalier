<?php

use App\Enums\AdoptionRequestsStatus;
use App\Enums\AnimalStatus;
use App\Enums\Sex;
use App\Enums\Species;
use App\Enums\UserStatus;
use App\Enums\YesOrNo;

return [
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
];
