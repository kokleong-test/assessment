<?php

class Question3
{
    public static function checkDateDay()
    {
        //get today date day and yesterday date day
        $today = date('d');
        $yesterday = date('d',strtotime("-1 days"));

        if ($today % 2 == 0) 
        {
            echo "Today date's day is even\n";
        }
        else
        {
            echo "Today date's day is odd\n";
        }

        if ($yesterday % 2 == 0) 
        {
            echo "Yesterday date's day is even";
        }
        else
        {
            echo "Yesterday date's day is odd";
        }
    }

    
}
Question3::checkDateDay();

