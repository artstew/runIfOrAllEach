Modx Snippet for comparing values and creating output based on result. Unlimited “case”s to check against. Commands fall under:

runIf (optional) - checks a single “case” - if false the snippet will not run.

andOr (settings: or, all, each) -

“or” (default) will check check if true starting at the first “case” - if true will output “then” variable - if false will check the next “case” and so on - if no “case”s are true will output “default” variable (optional).

“all” will check each statement and will include each “case”s “then” variable (optional) if true or it’s “else” variable (optional) if false.

“each” will check each “case” - if true it will continue to check the next “case” - if false it will output that “case”s “else” variable (optional) - if there is not a “else” variable it will continue to check the next “case” - if all “case”s are true it will output the “thenTotal” variable.

“eachFalse” will check each “case” - if false it will continue to check the next “case” - if true it will output that “case”s “then” variable (optional) - if there is not a “then” variable it will continue to check the next “case” - if all “case”s are false it will output the “elseTotal” variable.
