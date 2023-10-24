<?php

class CalculateService{

    public static function calculateTheValue(float $younger, float $older, string $operator)
    {
        switch($operator)
	    {
		    case '+': 
			    return $older + $younger;
		    case '-': 
			    return $older - $younger;
		    case '*': 
			    return $older * $younger;
		    case '/': 
			{
				if($younger == 0) throw new Exception("Division by zero");
				return $older / $younger;
			}
			    
            case '^':
                return $older ** $younger;
	    }
	    return 0;
    }
}

?>