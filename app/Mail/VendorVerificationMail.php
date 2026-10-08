<?php

namespace App\Mail;

use App\Models\Vendors;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vendor;

    public function __construct(Vendors $vendor)
    {
        $this->vendor = $vendor;
    }

    public function build()
    {
        return $this
            ->from(
                config('mail.from.address'),
                config('mail.from.name')
            )
            ->subject('Your Partner Registration is Under Verification')
            ->view('emails.vendor-verification');
    }
}