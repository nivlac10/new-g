@component('mail::message')
# Withdrawal Request

**Date:** {{ $data['date'] }}  
**Name:** {{ $data['name'] }}  
**Account ID:** {{ $data['account_id'] }}  
**Bank Name:** {{ $data['bank_name'] }}  
**Account No:** {{ $data['account_number'] }}  
**Amount:** {{ $data['amount'] }}  
**Email:** {{ $data['email'] }}  

A user has requested a withdrawal. Please check the admin panel for more details.

Thanks,
{{ config('app.name') }}
@endcomponent
