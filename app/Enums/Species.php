<?php

namespace App\Enums;

enum Species: string
{
    // Animaux domestiques
    case DOG = 'dog';
    case CAT = 'cat';
    case RABBIT = 'rabbit';
    case HAMSTER = 'hamster';
    case GUINEA_PIG = 'guinea_pig';
    case FERRET = 'ferret';

    // Animaux de ferme
    case HORSE = 'horse';
    case COW = 'cow';
    case SHEEP = 'sheep';
    case GOAT = 'goat';
    case PIG = 'pig';
    case DONKEY = 'donkey';
    case CHICKEN = 'chicken';
    case DUCK = 'duck';

    // Oiseaux & NAC
    case BIRD = 'bird';
    case PARROT = 'parrot';
    case CANARY = 'canary';

    // Reptiles & amphibiens
    case SNAKE = 'snake';
    case LIZARD = 'lizard';
    case TURTLE = 'turtle';
    case FROG = 'frog';

    // Faune sauvage
    case DEER = 'deer';
    case FOX = 'fox';
    case HEDGEHOG = 'hedgehog';
}
