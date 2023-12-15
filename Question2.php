<?php

class Question2
{
    public static function checkDiscount($purchaseValue)
    {
        
        if ($purchaseValue > 500) 
        {
            $discount = 10;
        }
        else if ($purchaseValue <= 500 && $purchaseValue > 100) 
        {
            $discount = 5;
        }
        else
        {
            $discount = 0;
        }

        if ($discount > 0) 
        {
            echo 'Purchase Value is '.$purchaseValue.', discount is '.$discount.'%';
        }
        else
        {
            echo 'Purchase Value is '.$purchaseValue.', there are no discount.';
        }

    }

    
}

Question2::checkDiscount(600);
