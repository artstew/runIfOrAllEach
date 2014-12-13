Modx Snippet for comparing values and creating output based on result. Unlimited “case”s to check against. Commands fall under:

runIf (optional) - checks a single “case” - if false the snippet will not run.

andOr (settings: or, all, each) -

“or” (default) will check if true starting at the first “case” - if true will output “then” variable - if false will check the next “case” and so on - if no “case”s are true will output “default” variable (optional).

“all” will check each statement and will include each “case”s “then” variable (optional) if true or it’s “else” variable (optional) if false.

“each” will check each “case” - if true it will continue to check the next “case” - if false it will output that “case”s “else” variable (optional) - if there is not a “else” variable it will continue to check the next “case” - if all “case”s are true it will output the “thenTotal” variable.

“eachFalse” will check each “case” - if false it will continue to check the next “case” - if true it will output that “case”s “then” variable (optional) - if there is not a “then” variable it will continue to check the next “case” - if all “case”s are false it will output the “elseTotal” variable.

Example Snippet Call:
[[!runIfOrAllEach? &andOr=`each` 
  &case1=`[[*tv1]]` &caseEquals1=`yes` /* There no &else1 so if Case 1 is false it will check the next case */
  &case2=`[[*tv2]]` &caseEquals2=`yes` 
  &else2=`Do this thing if Case 2 (tv2) is false` 
  &case3=`[[*tv1]]` &caseEquals3=`yes` 
  &else3=`Do this thing if Case 1 (tv1) is false` 
  &case4=`[[*tv3]]` &caseEquals4=`` 
  &else4=`Do this thing if Case 4` 
  &thenTotal=`Do this thing if all Cases are true`
]]
