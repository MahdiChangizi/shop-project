<?php
use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Ghasedak\GhasedakApi;

class GhasedakChannel
{
    public function send($notifiable, $notification)
    {
        $data = $notification->toGhasedakSms($notifiable);
        $message = $data['text'];
        $receptor = $data['mobile'];

            try {
                $lineNumber = "30005088";
                $api = new GhasedakApi(config('services.ghasedak.key'));
                $api->SendSimple($receptor,$message,$lineNumber);
            }
            catch(ApiException $e){
                throw $e->errorMessage();
            }
            catch(HttpException $e){
                throw $e->errorMessage();
            }
    }
}
