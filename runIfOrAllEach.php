<?php
/*
  * runIfOrAllEach
  *
  * Created by Scott Stewart
  * http://artstew.org
  *
  */
  
$runIfMessage = 'Error: runIfSource did not equal runIf';

$output = '';

if(!isset($default) && isset($runIfSource) && isset($runIf) && $runIfSource != $runIf && $debug == 'yes') {
    return $runIfMessage;
} elseif(!isset($default) && isset($runIfSource) && isset($runIf) && $runIfSource != $runIf) {
    return;
} elseif (isset($default) && $runIfSource != $runIf) {
    return $default;
} elseif (!isset($runIfSource) || !isset($runIf) || $runIfSource == $runIf) {
    
    $i = 1;
    while(isset(${'case'.$i}) && $andOr == 'each') {
        $case[$i] = ${'case'.$i};
        $caseEquals[$i] = ${'caseEquals'.$i};
        $then[$i] = ${'then'.$i};
        $else[$i] = ${'else'.$i};
        if ($case[$i] == $caseEquals[$i]) {
            $i++;
            continue;
        } elseif ($case[$i] != $caseEquals[$i] && empty($else[$i])) {
            $i++;
            continue;
        } elseif ($case[$i] != $caseEquals[$i] && !empty($else[$i])) {
            $output = $else[$i];
            return $output;
        }
        $i++;
    }
    if (!isset(${'case'.$i}) && $andOr == 'each') {
        return $thenTotal;
    }
    
    $i = 1;
    while(isset(${'case'.$i}) && $andOr == 'eachFalse') {
        $case[$i] = ${'case'.$i};
        $caseEquals[$i] = ${'caseEquals'.$i};
        $then[$i] = ${'then'.$i};
        $else[$i] = ${'else'.$i};
        if ($case[$i] != $caseEquals[$i]) {
            $i++;
            continue;
        } elseif ($case[$i] == $caseEquals[$i] && empty($then[$i])) {
            $i++;
            continue;
        } elseif ($case[$i] == $caseEquals[$i] && !empty($then[$i])) {
            $output = $then[$i];
            return $output;
        }
        $i++;
    }
    if (!isset(${'case'.$i}) && $andOr == 'each') {
        return $elseTotal;
    }
    
    $i = 1;
    while(isset(${'case'.$i}) && !isset($andOr) || isset(${'case'.$i}) && $andOr == 'or'){
        $case[$i] = ${'case'.$i};
        $caseEquals[$i] = ${'caseEquals'.$i};
        $then[$i] = ${'then'.$i};
        $else[$i] = ${'else'.$i};
        if ($case[$i] == $caseEquals[$i] && !empty($then[$i])) {
            $output = $then[$i];
            return $output;
        } elseif ($case[$i] != $caseEquals[$i]) {
            $i++;
            continue;
        } elseif (isset($default)) {
            return $default;
        }
        $i++;
    }
    
    $i = 1;
    while(isset(${'case'.$i}) && isset($andOr) && $andOr == 'all'){
        $case[$i] = ${'case'.$i};
        $caseEquals[$i] = ${'caseEquals'.$i};
        $then[$i] = ${'then'.$i};
        $else[$i] = ${'else'.$i};
        if ($case[$i] == $caseEquals[$i] && !empty($then[$i])) {
            $output .= $then[$i];
        } elseif ($case[$i] != $caseEquals[$i] && !empty($else[$i])) {
            $output .= $else[$i];
        }
        $i++;
    }
}
    
return $output;