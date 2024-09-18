<?php

namespace App\Library;

interface LibraryInterface {
    public function errors(): array;
    public function message(): string;
}