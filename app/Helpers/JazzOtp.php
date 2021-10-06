<?php
namespace App\Helpers;

class JazzOtp{

    public static function sendOtp($phone,$otp)
    {
        $input_xml = '<SMSRequest>
        <Username>03028510615</Username>
        <Password>Jazz@123</Password>
        <From>MASST RIDES</From>
        <To>' . $phone . '</To>
        <Message>Your Secret OTP is '.$otp.'</Message>
        <urdu>0</urdu>
        <statuscode>0</statuscode>
        </SMSRequest>';
        $url = "https://connect.jazzcmt.com/sendsms_xml.html";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "xmldoc=" . $input_xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 1 );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        //convert the XML result into array
        // $array_data = json_decode(json_encode(simplexml_load_string($data)), true);
        $array_data = json_encode(simplexml_load_string($data));
        // $array_data = json_encode($data);
        return $array_data;
    }
}
