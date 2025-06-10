<?php
if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); }

/**
 * Pick a random item based on weights.
 *
 * @param array $values Assoc. Array of elements, each with a weight
 * @return string Selected element.
 */
function weightedRandom($values) { 
    // Calculate the total weight of all options.
    $totalWeight = 0;
    foreach ($values as $key => $weight) {
        $totalWeight += $weight;
    }

    $selectedKey = null;
    if ($totalWeight > 0) {
        // Now randomly select one based on the weight.
        $n = 0; 
        $num = mt_rand(0, $totalWeight); 
        foreach ($values as $key => $weight) {
            $n += $values[$key];
            if($n >= $num) {
                $selectedKey = $key;
                break;
            }
        }
    }
    return $selectedKey;
}

function bosABTest($cookieName, $values, $debugMode = false) {
    $cookieLifetime = time() + (86400 * 30);

    // Build a set of debug messages
    $debugMsg = [];

    $abCookie = isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : false;
    array_push($debugMsg, "Landing page abCookie is: {$abCookie}");

    if ($abCookie) {
        // If we found a cookie, make sure that selection is still valid.
        $currentSetting = isset($values[$abCookie]) ? $values[$abCookie] : 0;
        if ($currentSetting === 0) {
            array_push($debugMsg, "Re-assign visitor! Variation {$abCookie} doesn't exist or has been retired.");
            $abCookie = false;
        } else {
            array_push($debugMsg, "Returning visitor on variation: {$abCookie}");
        }
    } else {
        // There was no cookie, it's a new visitor.
        array_push($debugMsg, "New visitor!");
    }

    // We need to choose a variation for this visitor!
    if(!$abCookie) {
        // Choose a 'variation' randomly based on weights.
        $abCookie = weightedRandom($values);
        // Record the selected variation, so the user always gets the same one.
        setcookie($cookieName, $abCookie, $cookieLifetime, "/");
    }

    array_push($debugMsg, "Using {$cookieName} variation {$abCookie}");

    // Log the number of times this variation has been visited.
    $visitCounter = (int)isset($_COOKIE["{$cookieName}-{$abCookie}"]) ? $_COOKIE["{$cookieName}-{$abCookie}"] : 0;
    $visitCounter++;
    setcookie("{$cookieName}-{$abCookie}", $visitCounter, $cookieLifetime, "/");
    array_push($debugMsg, "Updated counter '{$cookieName}}-{$abCookie}': {$visitCounter}");

    define("BINARYOPS_AB_TEST", "{$cookieName}-{$abCookie}");
    define("BINARYOPS_AB_COUNTER", $visitCounter);

    // Toggle debug mode
    if ($debugMode) {
        echo '<pre>' . implode("\n", $debugMsg) . '</pre>';
        die;
    }
}

// // Define the AB test variations and assign a weight to each.
// $values['A'] = 3;
// $values['B'] = 7;
// $values['C'] = 10;
// $values['D'] = 0;
// $values['Z'] = 0;  // Zero weight is NEVER selected 

// bosABTest('lp', $values);