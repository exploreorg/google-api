<?php

namespace TomShaw\GoogleApi;

use TomShaw\GoogleApi\Resources\GoogleBooks;
use TomShaw\GoogleApi\Resources\GoogleCalendar;
use TomShaw\GoogleApi\Resources\GoogleDrive;
use TomShaw\GoogleApi\Resources\GoogleMail;
use TomShaw\GoogleApi\Resources\Youtube;

class GoogleApiManager
{
    public function books(): GoogleBooks
    {
        return new GoogleBooks(app(GoogleClient::class));
    }

    public function drive(): GoogleDrive
    {
        return new GoogleDrive(app(GoogleClient::class));
    }

    public function gmail(): GoogleMail
    {
        return new GoogleMail(app(GoogleClient::class));
    }

    public function calendar(): GoogleCalendar
    {
        return new GoogleCalendar(app(GoogleClient::class));
    }

    public function youtube(): Youtube
    {
        return new Youtube(app(GoogleClient::class));
    }
}
