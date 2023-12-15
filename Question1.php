<?php

class Question1
{
    public static function checkDownload($memberType)
    {
        $message = '';
        //select member from DB for validate is member or non-member
        $member = DB::SELECT('SELECT * FROM member WHERE member_id = ?',[$memberType]);

        //current datetime
        $current_datetime = date("Y-m-d H:i:s");

        if (sizeof($member) > 0)
        {
            //get last download time and count from DB
            $last_download_time = $member[0]->d_datetime;
            $count = $member[0]->count;

            //after 5 second from last download time
            $after_datetime = date("Y-m-d H:i:s", strtotime('+30 seconds',strtotime($last_download_time)));


            if($after_datetime > $current_datetime) 
            {
                if($count >= 1)
                {
                    $message = "Too many downloads";
                }
                else
                {

                    if ($count == 0) 
                    {
                        DB::UPDATE('UPDATE member SET d_date_time = ?, count = ? WHERE member_id = ?',[$current_datetime, $count + 1, $memberType]);
                    }
                    else
                    {
                        DB::UPDATE('UPDATE member SET d_date_time = ?, count = 0 WHERE member_id = ?',[$current_datetime, $memberType]);

                    }

                    $message = "Your download is starting..";

                }
            }
            else
            {
                DB::UPDATE('UPDATE member SET d_date_time = ?, count = 0 WHERE member_id = ?',[$current_datetime, $memberType]);

                $message = "Your download is starting..";
            }
        }
        else
        {
            // set cookies for non member 5 second
            $cookie_name = "guest";
            $cookie_value = "download-image";

            if (!isset($_COOKIE[$cookie_name])) 
            {
                setcookie($cookie_name, $cookie_value, time() + 5, '/');
                $message = "Your download is starting..";
            }
            else
            {
                $message = "Too many downloads";
            }
            
        }

        return $message;
    }
}
