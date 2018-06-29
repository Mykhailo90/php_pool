<?php
function ft_is_sort($str)
{
    $i = 0;
    asort($str);
    foreach ($str as $key => $val)
    {
        if ($i != $key)
        {
            arsort($str);
            $i = 0;
            foreach ($str as $key => $val)
            {
                if ($i != $key)
                  return (FALSE);
                $i++;
            }
            return (TRUE);
        }
        $i++;
    }
    return (TRUE);
}
?>
