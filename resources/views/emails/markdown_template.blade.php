@component('mail::message')
# New Deposit Request

**Date:** {{ $date }}  
**Name:** {{ $name }}  
**Account ID:** AW200{{ $account_id }}  
**Amount:** {{ $amount }}  
**Email:** {{ $email }}  
**Receipt Url:** [View Receipt]({{ $receipt_url }})  

You have a new request, please check the admin panel for more info.

Thanks,
{{ config('app.name') }}
@endcomponent
