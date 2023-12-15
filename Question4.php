<?php

class Question4
{
    public static function getresult($item,$vip)
    {
        $result=[];
        foreach ($vip as $v) 
        {
            foreach ($item as $i) 
            {
                $current_level = substr($v, 3);

                $top_level = count($vip);
                $top_item = count($item);

                $between_level = ($current_level + $top_level) - $top_level;
                
                if ($i <= $between_level) 
                {
                    $number = rand(11,100);
                }
                else
                {
                    $number = rand(0,10);
                }

                $result[$v][$i] = $number;   
                
            }

        }

        print_r($result); 
    }

    
}

Question4::getresult([1,2,3,4,5],['vip1','vip2','vip3','vip4','vip5']);
